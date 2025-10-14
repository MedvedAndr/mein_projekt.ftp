<?php

namespace App\Services;

class AssetsRepository {
    protected array $styles         = [];
    protected array $scripts        = [];
    protected array $bundles        = [];
    protected array $global_options = [];
    protected int   $order          = 0;

    public function setGlobalOptions(array $options): void {
        $this->global_options = array_merge($this->global_options, $options);
    }

    public function setStyle(array $options = []): void {
        $options = $this->normalizeStyleOptions($options);
        if ($options === null) {
            return;
        }

        $original_href      = $options['href'];
        $is_preserve        = $options['preserve_query'];

        $found_index        = null;
        foreach ($this->styles as $i => $style) {
            if ($style['id'] === $options['id']) { $found_index = $i; break; }
        }

        $final_href         = $is_preserve ? $original_href : preg_replace('/\?.*/', '', $original_href);
        if (!$is_preserve && !in_array($options['version'], [null, false], true)) {
            $sep = str_contains($final_href, '?') ? '&' : $options['version_format'];
            $final_href .= $sep . ltrim((string)$options['version'], '?&=');
        }
        $options['href']    = $final_href;
        
        if ($found_index !== null) {
            if (!$options['override']) {
                return;
            }
            $options['order'] = $this->styles[$found_index]['order'] ?? $this->order++;
            $this->styles[$found_index] = $options;
            return;
        }

        $options['order']   = $this->order++;
        $this->styles[]     = $options;
    }

    public function unsetStyle(string $id): void {
        $this->styles = array_values(
            array_filter($this->styles, function($style) use ($id) {
                return $style['id'] !== $id;
            })
        );
    }

    public function setScript(array $options): void {
        $options        = $this->normalizeScriptOptions($options);
        if ($options === null) return;

        $original_src   = $options['src'];
        $is_preserve    = $options['preserve_query'];

        $found_index    = null;
        foreach ($this->scripts as $i => $script) {
            if ($script['id'] === $options['id']) { $found_index = $i; break; }
        }

        $final_src      = $is_preserve
            ? $original_src
            : preg_replace('/\?.*/', '', $original_src);
        if (!$is_preserve && !in_array($options['version'], [null, false], true)) {
            $sep = str_contains($final_src, '?') ? '&' : $options['version_format'];
            $final_src .= $sep . ltrim((string)$options['version'], '?&=');
        }
        $options['src'] = $final_src;

        if ($found_index !== null) {
            if (!$options['override']) {
                return;
            }
            $options['order'] = $this->scripts[$found_index]['order'] ?? $this->order++;
            $this->scripts[$found_index] = $options;
            return;
        }

        $options['order']   = $this->order++;
        $this->scripts[]    = $options;
    }

    public function unsetScript(string $id): void {
        $this->scripts = array_values(
            array_filter($this->scripts, function($style) use ($id) {
                return $style['id'] !== $id;
            })
        );
    }

    public function setBundle(string $name, array $styles = [], array $scripts = []): void {
        $this->bundles[$name] = [
            'styles' => $styles,
            'scripts' => $scripts
        ];
    }

    public function useBundle(string $name): void {
        if (!isset($this->bundles[$name])) {
            return;
        }
        foreach ($this->bundles[$name]['styles'] as $style) {
            $this->setStyle($style);
        }
        foreach ($this->bundles[$name]['scripts'] as $script) {
            $this->setScript($script);
        }
    }

    public function get(): array {
        $styles_sorted  = $this->sortByPriority($this->styles);
        $scripts_sorted = $this->sortByPriority($this->scripts);

        return [
            'styles'    => $styles_sorted,
            'scripts'   => [
                'head'      => array_values(array_filter($scripts_sorted, function ($s) {
                    return $s['position'] === 'head';
                })),
                'body'      => array_values(array_filter($scripts_sorted, function ($s) {

                    return $s['position'] === 'body';
                })),
            ],
        ];
    }

    public function hasStyle(string $id): bool
    {
        foreach ($this->styles as $style) {
            if ($style['id'] === $id) {
                return true;
            }
        }
        return false;
    }

    public function hasScript(string $id): bool
    {
        foreach ($this->scripts as $script) {
            if ($script['id'] === $id) {
                return true;
            }
        }
        return false;
    }

    public function all(): array
    {
        return [
            'styles'            => $this->styles,
            'scripts'           => $this->scripts,
            'bundles'           => $this->bundles,
            'global_options'    => $this->global_options,
        ];
    }





    protected function applyGlobalOptions(array $options): array {
        return array_merge($this->global_options, $options);
    }

    protected function sortByPriority(array $items): array {
        usort($items, fn($a, $b) =>
            ($a['priority'] <=> $b['priority']) ?: ($a['order'] <=> $b['order'])
        );
        return $items;
    }

    private function normalizeStyleOptions(array $options): ?array {
        $options = array_merge([
            'id'                => null,
            'href'              => null,
            'version'           => null,
            'version_format'    => '?v=',
            'attributes'        => [],
            'priority'          => 100,
            'preserve_query'    => false,
            'override'          => false,
        ], $this->applyGlobalOptions($options));

        // обязательные поля
        $options['id']      = is_string($options['id'])
            ? trim($options['id'])
            : null;
        $options['href']    = is_string($options['href'])
            ? trim($options['href'])
            : null;
        if (
            $options['id'] === null ||
            $options['id'] === '' ||
            $options['href'] === null ||
            $options['href'] === ''
        ) {
            return null;
        }

        $options['priority']        = (int) $options['priority'];
        $options['preserve_query']  = (bool) $options['preserve_query'];
        $options['override']        = (bool) $options['override'];

        if (
            !is_string($options['version']) && 
            !is_int($options['version']) && 
            $options['version'] !== null && 
            $options['version'] !== false
        ) {
            $options['version'] = null;
        }

        $version_format = trim((string) $options['version_format']);
        if ($version_format === '') {
            $version_format = '?v=';
        }
        if ($version_format[0] !== '?' && $version_format[0] !== '&') {
            $version_format = '?' . ltrim($version_format, '?&');
        }
        if (!str_contains($version_format, '=')) {
            $version_format .= '=';
        }
        $options['version_format'] = $version_format;

        $attrs = [];
        foreach ((array) $options['attributes'] as $k => $v) {
            if ($v === false || $v === null) {
                continue;
            }
            if (is_scalar($v) || $v === true) {
                $attrs[$k] = $v;
            }
        }
        $options['attributes'] = $attrs;

        return $options;
    }

    private function normalizeScriptOptions(array $options): ?array {
        $options = array_merge([
            'id'                => null,
            'src'               => null,
            'version'           => null,
            'version_format'    => '?v=',
            'attributes'        => [],
            'position'          => 'head',
            'priority'          => 100,
            'preserve_query'    => false,
            'override'          => false,
        ], $this->applyGlobalOptions($options));

        // обязательные поля
        $options['id']  = is_string($options['id'])
            ? trim($options['id'])
            : null;
        $options['src'] = is_string($options['src'])
            ? trim($options['src'])
            : null;
        if (
            $options['id'] === null ||
            $options['id'] === '' ||
            $options['src'] === null ||
            $options['src'] === ''
        ) {
            return null;
        }

        // базовая нормализация
        $options['priority']        = (int) $options['priority'];
        $options['preserve_query']  = (bool) $options['preserve_query'];
        $options['override']        = (bool) $options['override'];

        // position → 'head' | 'body'
        $position               = strtolower((string) $options['position']);
        $options['position']    = in_array($position, ['head', 'body'], true)
            ? $position
            : 'head';

        // версия
        if (
            !is_string($options['version']) &&
            !is_int($options['version']) &&
            $options['version'] !== null &&
            $options['version'] !== false
        ) {
            $options['version'] = null;
        }

        // version_format
        $version_format = trim((string)$options['version_format']);
        if ($version_format === '') {
            $version_format = '?v=';
        }
        if ($version_format[0] !== '?' && $version_format[0] !== '&') {
            $version_format = '?' . ltrim($version_format, '?&');
        }
        if (!str_contains($version_format, '=')) {
            $version_format .= '=';
        }
        $options['version_format'] = $version_format;

        // attributes
        $attrs = [];
        foreach ((array) $options['attributes'] as $k => $v) {
            if ($v === false || $v === null) {
                continue;
            }
            if (is_scalar($v) || $v === true) {
                $attrs[$k] = $v;
            }
        }
        $options['attributes'] = $attrs;

        return $options;
    }
}