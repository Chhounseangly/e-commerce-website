@extends('layouts.app')

@section('title', 'Admin - ProductTypes')

@section('content')
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        @component('components.success_toast')
            @slot('message')
                {{ $message }}
            @endslot
            <button class="btn-hide" onclick="() => {{ $message = '' }}" type="button" onclick="">X</button>
        @endcomponent
    @endif
    <h2 class="text-2xl font-bold py-4">Product Type Table</h2>
    <button class="p-2 bg-blue-700 text-white rounded-md">
        <a href="{{ route('admin.product-type.create') }}">Product Type +</a>
    </button>
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
                        <form action="{{ route('admin.product-type.delete', $property_type->id) }}" method="POST">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button type="submit">
                                @include('Includes.delete_icon')
                            </button>
                        </form>
                        <form action="{{ route('admin.product-type.edit', $property_type->id) }}" method="POST">
                            {{ method_field('GET') }}
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
