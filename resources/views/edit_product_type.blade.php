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
    <h1 class="title">Edit Product Type of {{ $product_type->name }}</h1>
    {{-- alert message  --}}
    @if ($message = Session::get('message'))
        <!-- Edit Alert Done -->
        <div class="alert-success">
            <strong>Success!</strong> {{ $message }}
            <button class="btn-hide" type="button" onclick="">X</button>
        </div>
    @endif
    <form class="form" action="{{ route('update_product_type', $product_type->id) }}" method="POST"
        enctype="multipart/form-data">
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div style="display: flex; flex-direction: column; width: fit-content; gap: 5px;" class="mb-3">
            <label for="name" class="form-label">Product type name *</label>
            <input value="{{ $product_type->name }}" type="text" class="input" name="name" required>
        </div>
        <div>
            <button type="submit" class="btn-create">Save</button>
        </div>
    </form>
</body>

</html>
