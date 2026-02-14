<div style="display: none;"></div>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/tailwindcss-colors.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/toast.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('js/components/toast.js') }}"></script>
    @endpush
@endonce
