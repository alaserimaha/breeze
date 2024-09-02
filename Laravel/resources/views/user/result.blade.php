<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
        <div class="arrow">
           <a href=""> <span class="material-symbols-outlined">
                arrow_right_alt
                </span></a>
        </div>
        <div class="result-img">
            <img src="{{ asset('assets/img/result.png') }}" class="logo"/>

        </div>
        
        <p>trash type :  <span class="trash-type">plastic</span></p>
      
        <img src="{{ asset('assets/img/home-img.png') }}" class="home-img" alt="">
        
    </div>
</body>

</html>