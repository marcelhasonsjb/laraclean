<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@auth
    <meta name="api-token" content="{{ auth()->user()->api_token }}">
@endauth
    <title>admin panel / {{ strtolower(config('app.name', 'Laravel')) }}</title>

    <script src="{{ asset('js/admin.js') }}" defer></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>

<div id="admin"></div>
</body>
</html>