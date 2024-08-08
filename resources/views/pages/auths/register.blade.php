@extends('layouts.app')
@section('title', 'Register')
<style>
    .wrapper-form {
        margin: auto;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .form {
        padding: 24px;
        width: 50%;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
    }

    .wrapper-username,
    .wrapper-password,
    .wrapper-email {
        width: 50%;
        display: flex;
        gap: 5px;
        flex-direction: column;
    }

    .btn-submit {
        width: 50%;
        padding: 10px 0px;
        background: rgb(10, 187, 10);
        color: white;
    }

    .error {
        color: red;
    }
</style>
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="w-full flex justify-center">
                @include('Includes.icon_auth')
            </div>
            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up for new account
            </h2>

        </div>

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
            @if ($errors->has('error'))
                <div class="w-full bg-red-500 text-sm text-white rounded-sm py-2 px-1">
                    {{ $errors->first('error') }}
                </div>
            @endif
            <form class="space-y-4" action="{{ route('register.store') }}" method="POST">
                {{ csrf_field() }}
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="my-2">
                        <input required id="username" name="username" type="username" autocomplete="username"
                            class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if ($errors->first('username'))
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="my-2">
                        <input required id="email" name="email" type="email" autocomplete="email"
                            class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if ($errors->first('username'))
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="my-2">
                        <input required id="password" name="password" type="password" autocomplete="current-password"
                            class="pl-2  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if ($errors->first('password'))
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Sign up</button>
            </form>
            <p class="mt-2 text-center text-sm text-gray-500">
                Already have an account?
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
                    Login</a>
            </p>
        </div>
    </div>
@endsection
