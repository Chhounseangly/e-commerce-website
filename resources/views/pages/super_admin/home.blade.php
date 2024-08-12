@extends('layouts.app')
@section('title', 'SuperAdmin - User')

@section('content')
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        <!-- Edit Alert Done -->
        <div class="alert-success">
            <strong class="text-green-700">{{ $message }}</strong>
            <button class="btn-hide" type="button" onclick="">X</button>
        </div>
    @endif
    <h2 class="text-2xl font-bold py-4">User Table</h2>
    {{-- <button class="p-2 bg-blue-700 text-white rounded-md">
        <a href="{{ route('admin.product.create') }}">User +</a>
    </button> --}}
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
                        Usename
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4 ">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Email
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4 ">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Role
                    </p>
                </th>
                <th class="cursor-pointer border-y border-gray-950 p-4 ">
                    <p
                        class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 leading-none opacity-70">
                        Actions
                    </p>
                </th>
            </tr>
        </thead>
        @foreach ($users as $user)
            <tr class="column">
                @component('components.table_data')
                    @slot('id')
                        {{ $user->id }}
                    @endslot
                    @slot('name')
                        {{ $user->username }}
                    @endslot
                    @slot('price')
                        {{ $user->email }}
                    @endslot
                    @slot('type')
                        {{ $user->role_id }}
                    @endslot
                    @slot('actions')
                        <form action="{{ route('superadmin.destroy', $user->id) }}" method="POST">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <button type="submit" class="btn-delete deletebutton">
                                @include('Includes.delete_icon')
                            </button>
                        </form>
                        {{-- <button>
                            <a href="{{ '' }}">
                                @include('Includes.edit_icon')
                            </a>
                        </button> --}}
                    @endslot
                @endcomponent
            </tr>
        @endforeach
    </table>
@endsection
