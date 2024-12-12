@extends('layouts.sidebar')
@section('content')
<div class="container mt-12 max-w-screen-lg mx-auto">
    
    <div class="row">
        <div class="col-md-12">
            @if(session('error')) 
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                    {{ session('error') }}
                </div>
                
            @endif
            @if(session('success')) 
            <div id="alert" class="flex items-center p-4 mb-5 text-green-800 rounded-lg bg-green-50 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-600 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close" onclick="closeAlert()">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                    </svg>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="row mb-10">
        <div class="col-md-8 offset-2">
            <h3 class="mb-10 text-4xl text-center font-bold"> Products </h3>
            <div class="">
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
                                             Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium  uppercase">
                                            Address
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!$users->isEmpty()) 
                                
                                    @foreach($users  as $key => $user)

                                    
                                    <tr class="hover:bg-slate-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap border-b border-slate-200"> {{ $key + 1 }} </th>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> <a class="underline underline-offset-8" href="{{ route('user', $user->name)  }}"> {{ $user->name  }} </a> </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> {{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 border-b border-slate-200"> {{ $user->address }}</td>
                                    </tr>
                                        
                                    @endforeach
                                @else 
                                <tr> <td colspan="5" class="text-center text-lg">Not Order Found</td> </tr>
                                @endif
                                </tbody>
                            </table>

                            <div class="mt-5">
                                {{ $users->links() }}
                            </div>
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection