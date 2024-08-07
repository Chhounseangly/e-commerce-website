<style>
    .side-bar {
        width: 200px;
        height: 100vh;
        padding: 5px;
        background: rgb(199, 204, 209);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .view-property-type,
    .add-product {
        border: none;
        width: 100%;
        background: transparent;
        font-size: 16px;
    }

    .view-property-type a,
    .add-product a {
        width: 100% color: black;
    }

    .view-property-type a:hover,
    .add-product a:hover {
        color: rgb(38, 139, 7);
    }

    .active {
        color: blue;
    }

    .menu-lists {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
</style>

<div class="side-bar">
    <div class="menu-lists">
        <h1><a href="{{ url('/') }}">Dashboard</a></h1>
        <button class="view-property-type">
            <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('index') }}">
                Home
            </a>
        </button>
        <button class="add-product">
            <a class="{{ request()->is('add/new/product') ? 'active' : '' }}" href="{{ route('add_new_product') }}">Add
                Product +</a>
        </button>
        <button class="view-property-type">
            <a class="{{ request()->is('add/product/type') ? 'active' : '' }}" href="{{ route('add_product_types') }}">View Product
                Types</a>
        </button>   
    </div>
    @include('Includes.user_profile')
</div>
