@extends('layouts.app')

@section('title', 'Property Type')

@section('sidebar')

@section('content')
    <h1 class="title">Add New Product Type</h1>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        @component('success_toast')
            @slot('message')
                {{ $message }}
            @endslot
            <button class="btn-hide" type="button" onclick="">X</button>
        @endcomponent
    @endif
    <form class="form" action="{{ route('store_product_type') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="input" name="name_property_type" required>
        </div>
        <div>
            <button type="submit" class="btn-create">CREATE</button>
        </div>
    </form>

    <table class="table">
        <tr class="">
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @if (count($data) > 0)
            @foreach ($data as $property_type)
                <tr class="column">
                    <td> {{ $property_type->id }}</td>
                    <td> {{ $property_type->name }}</td>
                    <td style="display:flex; gap: 2px;">
                        <form action="{{ route('delete_product_type', $property_type->id) }}" method="POST">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                        <form action="{{ route('edit_product_type', $property_type->id) }}" method="POST">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn-edit">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Property Types is empty !!</td>
            </tr>
        @endif
    </table>

@endsection
