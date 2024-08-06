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
            flex-direction: column;
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
            width: 100%;
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
    </style>
</head>

<body>
    <h1 class="title">Edit Product {{ $product->name }}</h1>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        <!-- Edit Alert Done -->
        <div class="alert-success">
            <strong>Success!</strong> {{ $message }}
            <button class="btn-hide" type="button" onclick="">X</button>
        </div>
    @endif
    <form class="form" action="{{ route('update_product', $product->id) }}" method="POST"
        enctype="multipart/form-data">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input value="{{ $product->name }}" type="text" class="input" name="name" required>
        </div>
        {{-- select product type --}}
        <div class="mb-3">
            <label for="product_type_id">Choose a new type of product:</label>
            <select name="product_type_id" id="product_type_id">
                @foreach ($product_types as $product_type)
                    <option value={{ $product_type->id }}>
                        {{ $product_type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price *</label>
            <input value="{{ $product->price }}" type="text" class="input" name="price" required>
        </div>
        <div>
            <button type="submit" class="btn-create">Save</button>
        </div>
    </form>
</body>

</html>
