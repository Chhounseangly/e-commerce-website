<style>
    .user-profile {
        display: flex;
        flex-direction: column;
        height: 20%;
    }
</style>
<div class="user-profile">
    @if (auth()->check())
        <div>Username: {{ auth()->user()->username }}</div>
        <div>Email: {{ auth()->user()->email }}</div>
        <form action="{{ route('signout') }}" method="POST">
            {{ method_field('get') }}
            {{ csrf_field() }}
            <button type="submit">
                Logout
            </button>
        </form>
    @else
        <div style="display: flex; flex-direction: column; gap:4px;">
            <button>
                <a href="{{ route('login.index') }}">Login</a>
            </button>
            <button>
                <a href="{{ route('register.index') }}">Register</a>
            </button>
        </div>
    @endif
</div>
