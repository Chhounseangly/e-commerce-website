<!-- Stored in resources/views/index.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        <!-- Edit Alert Done -->
        <div class="alert-success">
            <strong style="color: white">{{ $message }}</strong>
            <button class="btn-hide" type="button" onclick="">X</button>
        </div>
    @endif
    <h2>Product Table</h2>
    <table class="table text-red-400">
        <tr class="">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Product Type</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr class="column">
                <td> {{ $product->id }}</td>
                <td> {{ $product->name }}</td>
                <td> {{ $product->price }}</td>
                <td>{{ $product->productType->name }}</td>
                <td style="display:flex; gap: 2px;">
                    <form action="{{ route('delete_product', $product->id) }}" method="POST">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                    <button><a href="{{ route('edit_product', $product->id) }}">Edit</a></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
