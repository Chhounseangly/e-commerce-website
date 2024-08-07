@extends('layouts.app')

@section('title', 'Edit Product Type')

@section('content')
    <h1 class="title">Edit Product Type of {{ $product_type->name }}</h1>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        @component('components.success_toast')
            @slot('message')
                {{ $message }}
            @endslot
            <button class="btn-hide" type="button" onclick="">X</button>
        @endcomponent
    @endif
    <form class="form" action="{{ route('update_product_type', $product_type->id) }}" method="POST"
        enctype="multipart/form-data">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div style="display: flex; flex-direction: column; width: fit-content; gap: 5px;" class="mb-3">
            <label for="name" class="form-label">Product type name *</label>
            <input value="{{ $product_type->name }}" type="text" class="input" name="name" required>
        </div>
        <div>
            <button type="submit" class="btn-create">Save</button>
        </div>
    </form>
@endsection
