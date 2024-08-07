@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div>
        <h1>Login</h1>
        <form class="form" action="{{ route('login.store') }}" method="POST" enctype="multipart/form-data">
            {{ method_field('post') }}
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="username" class="form-label">Username *</label>
                <input type="text" class="input" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password *</label>
                <input type="password" class="input" name="password" required>
            </div>
            <div>
                <button type="submit" class="btn-create">Login</button>
            </div>
        </form>
    </div>
@endsection
