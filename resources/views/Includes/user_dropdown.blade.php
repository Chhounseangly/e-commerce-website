<div class="inline-flex justify-start w-full p-10">
    @if (auth()->check())
        <div class="dropdown relative inline-flex z-50">
            <button type="button" data-target="dropdown-default-main"
                class="dropdown-toggle inline-flex justify-center items-center gap-2 p-2 shadow-md text-sm bg-indigo-600 text-white rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-indigo-700 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user-round">
                    <circle cx="12" cy="8" r="5" />
                    <path d="M20 21a8 8 0 0 0-16 0" />
                </svg>
            </button>
            <div id="dropdown-default-main"
                class="dropdown-menu rounded-xl shadow-lg bg-white absolute top-full w-72 mt-2 open hidden"
                aria-labelledby="dropdown-default-main">
                <ul class="py-2">

                    <li>
                        <a class="flex items-center justify-between px-6 py-2 hover:bg-gray-100 text-gray-900 font-medium dropdown-toggle"
                            href="javascript:void(0)" data-target="dropdown-default-sub">
                            Username: {{ auth()->user()->username }}
                        </a>
                        <a class="flex items-center justify-between px-6 py-2 hover:bg-gray-100 text-gray-900 font-medium dropdown-toggle"
                            href="javascript:void(0)" data-target="dropdown-default-sub">
                            Email: {{ auth()->user()->email }}
                        </a>
                        <ul class="open hidden absolute translate-x-44 right-0 -translate-y-7 bg-white shadow-lg rounded-xl w-44 dropdown-toggle "
                            data-target="dropdown-default-main" id="dropdown-default-sub">
                        </ul>
                    </li>
                    <li>
                        <a class="block px-6 py-2 hover:bg-gray-100 text-red-500 font-medium" href="javascript:;">
                            <form action="{{ route('signout') }}" method="POST">
                                {{ method_field('get') }}
                                {{ csrf_field() }}
                                <button type="submit"
                                    class="w-full bg-red-500 p-2 text-white rounded-md font-medium">Log Out</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @else
        <div class="flex items-center gap-2">
            <button class="rounded-md text-white bg-indigo-600 px-3 py-1.5 text-sm">
                <a href="{{ route('login.index') }}">Login</a>
            </button>
            <span>|</span>
            <button class="rounded-md text-white bg-indigo-600 px-3 py-1.5 text-sm">
                <a href="{{ route('register.index') }}">Register</a>
            </button>
        </div>
    @endif

</div>
