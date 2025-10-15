@php
$assets = app('assets')->get();
@endphp

@foreach ($assets['styles'] as $style)
<link id="style__{{ $style['id'] }}" rel="stylesheet" href="{{ asset($style['href']) }}"
    @foreach ($style['attributes'] as $key => $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    data-priority="{{ $style['priority'] }}"
/>
@endforeach

@foreach ($assets['scripts']['head'] as $script)
<script id="script__{{ $script['id'] }}" src="{{ asset($script['src']) }}"
    @foreach ($script['attributes'] as $key => $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    data-priority="{{ $script['priority'] }}"
></script>
@endforeach