@extends('layouts.app')
@section('title', 'Login')


@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="w-full flex justify-center">
                @include('Includes.icon_auth')
            </div>
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account
            </h2>

        </div>

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
            @if ($errors->has('error'))
                <div class="w-full bg-red-500 text-sm text-white rounded-sm py-2 px-1">
                    {{ $errors->first('error') }}
                </div>
            @endif
            <form class="space-y-4" action="{{ route('login.store') }}" method="POST">
                {{ csrf_field() }}
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="my-2">
                        <input id="username" name="username" type="username" autocomplete="username"
                            class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if ($errors->first('username'))
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="my-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="pl-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if ($errors->first('password'))
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </form>
            <p class="mt-2 text-center text-sm text-gray-500">
                Don't have an account?
                <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
                    Register</a>
            </p>
        </div>
    </div>
@endsection
