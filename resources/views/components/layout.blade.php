<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="contein-general">
        <x-head />
        <x-nav />
        {{ $slot }}

    </div>

</body>

</html>
