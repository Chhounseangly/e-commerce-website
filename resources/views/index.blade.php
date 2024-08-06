<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        html,
        body {
            height: 100vh;
            margin: 0;
        }

        .title {
            width: 100%;
            text-align: center;
        }

        .form {
            padding: 5px;
            display: flex;
            flex-direction: row;
            gap: 5px;
        }

        .form-label {
            font-size: 24px;
        }

        .input {
            font-size: 16px;
            padding: 5px;
            box-sizing: border-box;
        }


        .btn-create {
            font-size: 16px;
            height: fit-content;
            background-color: rgb(34, 197, 34);
            color: white;
            padding: 5px 5px;
            border-radius: 4px;
        }

        .btn-edit {
            background: #22bb33;
        }

        .btn-delete {
            background: red;
            color: white;
        }

        .alert-success {
            width: fit-content;
            padding: 4px;
            background-color: #22bb33;
            display: flex;
            justify-items: center;
            align-items: center;
            gap: 4px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            height: fit-content;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        a {
            text-decoration: none;
        }

        .btn-view,
        .btn-add {
            background: rgb(56, 179, 18);
            padding: 5px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>


<body>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        <!-- Edit Alert Done -->
        <div class="alert-success">
            <strong style="color: white">{{ $message }}</strong>
            <button class="btn-hide" type="button" onclick="">X</button>
        </div>
    @endif
    <button class="btn-view">
        <a href="{{ route('create') }}">View Product Types</a>
    </button>
    <button class="btn-add">
        <a href="{{ route('add_new_product') }}">Add Product +</a>
    </button>
    <table class="table text-red-400">
        <tr class="">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Product Type</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr class="column">
                <td> {{ $product->id }}</td>
                <td> {{ $product->name }}</td>
                <td> {{ $product->price }}</td>
                <td>{{ $product->productType->name }}</td>
                <td style="display:flex; gap: 2px;">
                    <form action="{{ route('delete_product', $product->id) }}" method="POST">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                    <button><a href="{{ route('edit_product', $product->id) }}">Edit</a></button>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
