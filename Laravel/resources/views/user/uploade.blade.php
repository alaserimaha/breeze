<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="{{ asset('user/style.css') }}" href="style.css"> --}}
    <link rel="stylesheet" href="{{ asset('user/style.css') }}" />
    <title>Breeze</title>
    @livewireStyles
</head>

<body>
    @livewire('image-upload')
    @livewireScripts
</body>

</html>
