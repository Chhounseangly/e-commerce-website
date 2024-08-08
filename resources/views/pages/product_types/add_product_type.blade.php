@extends('layouts.app')

@section('title', 'Property Type')

@section('content')
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        @component('components.success_toast')
            @slot('message')
                {{ $message }}
            @endslot
            <button class="btn-hide" type="button" onclick="">X</button>
        @endcomponent
    @endif
    <h2 class="font-bold text-2xl py-4">Add New Product Type</h2>
    <form class="flex flex-col gap-2 w-1/2" action="{{ route('store_product_type') }}" method="POST">
        {{ csrf_field() }}
        <label for="name" class="text-sm">Name Product Type</label>
        <div class="flex gap-2">
            <input required placeholder="Enter the product type" id="name" name="name" type="text"
                autocomplete="name"
                class="pl-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <button type="submit"
                class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create</button>
        </div>
    </form>

    <table class="mt-4 w-full min-w-max table-auto text-left">
        <thead>
            {{-- header table --}}
            <tr>
                <th class="cursor-pointer border-y border-gray-950 p-4">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        ID
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Name
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Actions
                    </p>
                </th>
            </tr>
        </thead>
        @if (count($product_types) > 0)
            @foreach ($product_types as $property_type)
                @component('components.table_data')
                    @slot('id')
                        {{ $property_type->id }}
                    @endslot
                    @slot('name')
                        {{ $property_type->name }}
                    @endslot
                    @slot('actions')
                        <form action="{{ route('delete_product_type', $property_type->id) }}" method="POST">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button type="submit">
                                @include('Includes.delete_icon')
                            </button>
                        </form>
                        <form action="{{ route('edit_product_type', $property_type->id) }}" method="POST">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <button type="submit">
                                @include('Includes.edit_icon')
                            </button>
                        </form>
                    @endslot
                @endcomponent
            @endforeach
        @else
            <tr>
                <td>Property Types is empty !!</td>
            </tr>
        @endif
    </table>

@endsection
