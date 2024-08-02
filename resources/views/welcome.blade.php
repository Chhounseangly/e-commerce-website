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
            color: black;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        table {
            gap: 5px;
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            align-items: center;
            margin: auto;
        }

        .btn-add {
            background-color: green;
            color: white;
            padding: 10px 20px 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr class="">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Product Type</th>
            {{-- <th><button onclick="{{route('')}}" class="btn-add">Add Product +</button></th> --}}
        </tr>
        <tr class="column">
            @foreach ($products as $product)
                <td> {{ $product->id }}</td>
                <td> {{ $product->name }}</td>
                <td> {{ $product->price }}</td>
                <td>{{ $product->productType->name }}</td>
            @endforeach
        </tr>
    </table>

</body>

</html>
