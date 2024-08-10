@extends('layouts.app')
@section('title', 'Admin - Home')

@section('content')
    <h2 class="text-2xl font-bold py-4">Product Table</h2>
    <div class="w-full inline-flex gap-4">
        <button class="p-2 bg-blue-700 text-white rounded-md">
            <a href="{{ route('admin.product.create') }}">Product +</a>
        </button>
        {{-- alert message  --}}
        @if ($message = Session::get('message'))
            <!-- Alert Done -->
            @component('components.success_toast')
                @slot('message')
                    {{ $message }}
                @endslot
            @endcomponent
        @endif
    </div>
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
                <th class="cursor-pointer border-y border-gray-950 p-4 ">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Name
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4 ">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Price
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4">
                    <p
                        class="antialiased font-bold font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Type
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
        @foreach ($products as $product)
            <tr class="column">
                @component('components.table_data')
                    @slot('id')
                        {{ $product->id }}
                    @endslot
                    @slot('name')
                        {{ $product->name }}
                    @endslot
                    @slot('price')
                        {{ $product->price }}
                    @endslot
                    @slot('type')
                        {{ $product->productType->name }}
                    @endslot
                    @slot('actions')
                        <form action="{{ route('admin.delete.product', $product->id) }}" method="POST">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <button type="submit" class="btn-delete deletebutton">
                                @include('Includes.delete_icon')
                            </button>
                        </form>
                        <button>
                            <a href="{{ route('admin.product.edit', $product->id) }}">
                                @include('Includes.edit_icon')
                            </a>
                        </button>
                    @endslot
                @endcomponent
            </tr>
        @endforeach
    </table>
@endsection
