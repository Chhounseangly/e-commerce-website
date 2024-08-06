<style>
    .side-bar {
        width: 200px;
        height: 100vh;
        padding: 5px;
        background: rgb(199, 204, 209);
        display: flex;
        flex-direction: column;
        align-items: center;
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
        color: blue;
    }

    .active {
        color: blue;
    }
</style>

<div class="side-bar">
    <h1>Dashboard</h1>
    <button class="view-property-type">
        <a class="{{ request()->is('/add/product/type') ? 'active' : '' }}" href="{{ route('create') }}">View Product
            Types</a>
    </button>
    <button class="add-product">
        <a class="{{ request()->is('/add/new/product') ? 'active' : '' }}" href="{{ route('add_new_product') }}">Add
            Product +</a>
    </button>
</div>
