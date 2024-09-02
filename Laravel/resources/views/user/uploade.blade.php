<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="{{ asset('user/style.css') }}" href="style.css"> --}}
    <link rel="stylesheet" href="{{ asset('user/style.css') }}" />

    <title>Document</title>
</head>


<body>
    <div class="container">
        <div class="">
            <img src="{{ asset('assets/img/logo.png') }}" class="logo"/>

        </div>
        <h1>See the change <br> <span> Breathe the diffrence</span></h1>
        <div class="img">
            <img src="{{ asset('assets/img/line.svg') }}" alt="">

        </div>
        <button>uploade</button>
        <img src="{{ asset('assets/img/home-img.png') }}" class="home-img" alt="">
        <small>hint hint hint</small>
    </div>
</body>

</html>