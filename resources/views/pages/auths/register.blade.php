@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div>
        <h1>Register</h1>
        <form class="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="username" class="form-label">Username *</label>
                <input type="text" class="input" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="text" class="input" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password *</label>
                <input type="password" class="input" name="password" required>
            </div>
            <div>
                <button type="submit" class="btn-create">Register</button>
            </div>
        </form>
    </div>
@endsection
