<x-shared::layouts.app>
    @push('scripts')
        @php($script = sprintf('js/character/create/%s.js', $method))
        <script type="text/javascript" src="{{ mix($script) }}" defer></script>
    @endpush
</x-shared::layouts.app>

