<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bochito - Pedidos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            color: #333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background: #eee;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            color: white;
        }

        .btn-primary { background: #0879d1; }
        .btn-warning { background: #e5a000; }
        .btn-danger { background: #dc3545; }
        .btn-sm { font-size: 13px; }
        .mb-3 { margin-bottom: 15px; }
        .mb-4 { margin-bottom: 20px; }
        .d-inline { display: inline; }
        .text-center { text-align: center; }

        .alert {
            padding: 12px;
            background: #d4edda;
            color: #155724;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
