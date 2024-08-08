<div class="w-[20%] bg-gray-900 h-screen flex flex-col text-white">
    <h1 class="py-3 text-center border-b border-b-white text-xl"><a href="{{ url('/') }}">Dashboard</a></h1>
    <div class="flex text-start flex-col gap-2 flex-1 p-4">
        <a class="py-2 {{ request()->is('/') ? 'border-b border-blue-500' : 'hover:border-b ' }}"
            href="{{ route('index') }}">
            Home
        </a>
        <a class="py-2 {{ request()->is('add/new/product') ? 'border-b border-blue-500' : 'hover:border-b' }}"
            href="{{ route('add_new_product') }}">Add
            Product +</a>
        <a class="py-2 {{ request()->is('add/product/type') ? 'border-b border-blue-500' : 'hover:border-b' }}"
            href="{{ route('add_product_types') }}">Product Types</a>
    </div>
    <div>
        @include('Includes.user_profile')
    </div>
</div>
