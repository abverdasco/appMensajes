<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('estilos/estilos.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}?v={{ rand(0, 10000) }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">

    <script>
        var baseUrl = '{{ url("") }}';

        @php
            $sesion = Session();
        @endphp
       
        var usuario = '{{ $sesion->get("nombre") }}';
        var colorR = '{{ $sesion->get("colorR") }}';
        var colorG = '{{ $sesion->get("colorG") }}';
        var colorB = '{{ $sesion->get("colorB") }}';
    </script>

    <title>App de mensajería</title>
</head>
<body>

    
