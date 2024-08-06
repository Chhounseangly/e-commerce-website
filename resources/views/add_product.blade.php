@extends('layouts.app')

@section('title', 'Edit Property Type')

@section('sidebar')

@section('content')
    <h1 class="title">Add New Product</h1>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        @component('success_toast')
            @slot('message')
                {{ $message }}
            @endslot
            <button class="btn-hide" type="button" onclick="">X</button>
        @endcomponent
    @endif
    <form class="form" style="display: flex; flex-direction: column; gap: 10px; width: 100%;"
        action="{{ route('store_new_product') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        {{-- input product name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="input" name="name_product" required>
        </div>
        {{-- select product type --}}
        <div class="mb-3">
            <label for="product_type_id">Choose a type of product:</label>
            <select name="product_type_id" id="product_type_id">
                @foreach ($product_types as $product_type)
                    <option value={{ $product_type->id }}>{{ $product_type->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- input price --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price *</label>
            <input type="text" class="input" name="price" required>
        </div>
        <div>
            <button type="submit" class="btn-create">CREATE</button>
        </div>
    </form>
@endsection
