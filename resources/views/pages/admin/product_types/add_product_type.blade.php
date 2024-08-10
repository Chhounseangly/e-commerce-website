@extends('layouts.app')

@section('title', 'Property Type')

@section('content')
  
    <h2 class="font-bold text-2xl py-4">Add New Product Type</h2>
    <form class="flex flex-col gap-2 w-1/2" action="{{ route('admin.product-type.store') }}" method="POST">
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

    

@endsection
