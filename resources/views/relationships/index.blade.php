<x-master-layout>
    <x-slot:title>  Orders </x-slot:title>

    @section('breadcrumb')
    <ol> All Relationship Methods </ol>
    @endsection
    
    @section('relationshipMenu')
    @include('partials.relationshipsmenu')
    @endsection
    
    @include('partials.response')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h3 class="mb-5 text-xl text-center font-bold"> Orders </h3>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-master-layout>