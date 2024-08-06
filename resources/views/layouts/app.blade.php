<!-- Stored in resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>
        html,
        body {
            margin: 0;
            box-sizing: border-box;
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
    <div style="display: flex; gap: 10px;">
        @include('Includes.side_bar')
        <div style="margin-top: 5px; width: 100%">
            @yield('content')
        </div>
    </div>
</body>

</html>
