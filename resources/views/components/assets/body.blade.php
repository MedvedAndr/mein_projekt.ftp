@php
$assets = app('assets')->get();
@endphp

@foreach ($assets['scripts']['body'] as $script)
<script id="script__{{ $script['id'] }}" src="{{ asset($script['src']) }}"
    @foreach ($script['attributes'] as $key => $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    data-priority="{{ $script['priority'] }}"
></script>
@endforeach