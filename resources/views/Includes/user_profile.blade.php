<div class="w-fit mx-auto py-4 text-sm">
    @if (auth()->check())
        <div class="flex space-y-1 flex-col">
            <div>Username: {{ auth()->user()->username }}</div>
            <div>Email: {{ auth()->user()->email }}</div>
            <form action="{{ route('signout') }}" method="POST">
                {{ method_field('get') }}
                {{ csrf_field() }}
                <button type="submit"
                    class="flex  justify-center 
                rounded-md bg-indigo-600 px-3 py-1.5 text-xs lg:text-sm font-semibold">Logout</button>
            </form>
        </div>
    @else
        <div class="flex items-center gap-2">
            <button class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm">
                <a href="{{ route('login.index') }}">Login</a>
            </button>
            <span>|</span>
            <button class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm">
                <a href="{{ route('register.index') }}">Register</a>
            </button>
        </div>
    @endif
</div>
