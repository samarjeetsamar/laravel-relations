<x-master-layout>
    <x-slot:title>  Orders </x-slot:title>

    @section('breadcrumb')
    <ol> Orders / Add New Order </ol>
    @endsection
    @section('relationshipMenu')
    @endsection
    
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="d-flex inline-flex">
                <div><a class="bg-teal-500 p-3 rounded border-2 border-black text-white mt-5 font-bold" href="{{ route('order.create') }}"> Add new Order </a></div>
            </div>
        </div>
    </div>
    @include('partials.response')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h3 class="mb-5 text-xl text-center font-bold"> Orders </h3>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Sr. No.
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Product Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Product Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Quantity
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!$products->isEmpty()) 
                                
                                    @foreach($products  as $key => $product)

                                    
                                    <tr class="hover:bg-slate-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap border-b border-slate-200"> {{ $key + 1 }} </th>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> <a class="underline underline-offset-8" href="{{ route('product', $product->slug)  }}"> {{ $product->name }} </a> </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> {{ $product->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> {{ $product->orderProduct->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> {{ $product->orderProduct->amount }}</td>
                                    </tr>
                                        
                                    @endforeach
                                @else 
                                <tr> <td colspan="5" class="text-center text-lg">Not Order Found</td> </tr>
                                @endif
                                    
                                </tbody>
                            </table>
                            <div class="mt-5">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-master-layout>