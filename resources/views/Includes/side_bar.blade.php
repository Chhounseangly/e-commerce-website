<div class=" md:w-[20%] bg-gray-900 h-screen hidden md:flex flex-col text-white">
    <h1 class="py-3 text-center border-b border-b-white text-xl"><a href="{{ route('admin.page') }}">Dashboard</a></h1>
    <div class="flex text-start flex-col gap-2 flex-1 p-4">
        <a class="py-2 {{ request()->is('admin') ? 'border-b border-blue-500' : 'hover:border-b ' }}"
            href="{{ route('admin.page') }}">
            Home
        </a>
        @can('product_type')
            <a class="py-2 {{ request()->is('admin/product-type/home') ? 'border-b border-blue-500' : 'hover:border-b' }}"
                href="{{ route('admin.product-type.home') }}">Product Types</a>
        @endcan
    </div>
    <div>
        @include('Includes.user_profile')
    </div>
</div>
