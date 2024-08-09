@extends('layouts.app')

@section('title', 'Create Product')

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
    <h2 class="font-bold text-2xl py-4">Add Product</h2>
    <form class="w-1/2 flex flex-col gap-2" action="{{ route('admin.product.store') }}" method="POST">
        {{ csrf_field() }}

        {{-- input product name --}}
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
            <div class="my-2">
                <input required placeholder="Enter the product name" id="name" name="name" type="text"
                    autocomplete="name"
                    class="pl-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @if ($errors->first('name_product'))
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $errors->first('name_product') }}</strong>
                </span>
            @endif
        </div>
        {{-- select product type --}}
        <div class="flex flex-col gap-2">
            <label for="product_type_id">Choose a type of product:</label>
            <select class="py-2 border border-gray-950 rounded-sm" name="product_type_id" id="product_type_id">
                <option value="">Select</option>
                @foreach ($product_types as $product_type)
                    <option value={{ $product_type->id }}>{{ $product_type->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- input price --}}
        <div>
            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
            <div class="my-2">
                <input placeholder="Enter the price" id="name_product" name="price" type="text" autocomplete="price"
                    class="pl-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @if ($errors->first('price'))
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="mt-5">
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
        </div>
    </form>
@endsection
