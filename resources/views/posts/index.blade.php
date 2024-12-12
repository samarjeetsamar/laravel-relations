<x-master-layout>
    <x-slot:title> All Posts </x-slot:title>
    @section('header')
    @endsection

    All posts are listed here!
    @push('scripts')
    <script src="/example.js"></script>
    @endpush
</x-master-layout>