@extends('layouts.app')

@section('title', 'Edit Property Type')

@section('sidebar')

@section('content')
    <h1 class="title">Edit Product {{ $product->name }}</h1>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        @component('success_toast')
            @slot('message')
                {{ $message }}
            @endslot
            <button class="btn-hide" type="button" onclick="">X</button>
        @endcomponent
    @endif
    <form class="form" action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input value="{{ $product->name }}" type="text" class="input" name="name" required>
        </div>
        {{-- select product type --}}
        <div class="mb-3">
            <label for="product_type_id">Choose a new type of product:</label>
            <select name="product_type_id" id="product_type_id">
                @foreach ($product_types as $product_type)
                    <option value={{ $product_type->id }}>
                        {{ $product_type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price *</label>
            <input value="{{ $product->price }}" type="text" class="input" name="price" required>
        </div>
        <div>
            <button type="submit" class="btn-create">Save</button>
        </div>
    </form>
@endsection
