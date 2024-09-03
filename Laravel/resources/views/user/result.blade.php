<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('user/style.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
    <title>Results</title>
</head>

<body>
    <div class="container">
        <div class="">
            <img src="{{ asset('assets/img/logo.png') }}" class="logo" />
        </div>
        <div class="arrow">
            <a href=""><span class="material-symbols-outlined">arrow_right_alt</span></a>
        </div>
        <div class="result-img">
            <!-- Display base64-encoded image -->
            <img src="data:image/jpeg;base64,{{ $result_image }}" class="result-image" />
        </div>

        <p>Vehicle detected:</p>
        <ul>
            @foreach ($vehicle_detected as $item => $count)
                <li>{{ $item }}: {{ $count }}</li>
            @endforeach
        </ul>

        <p>Trash detected:</p>
        <ul>
            @foreach ($trash_detected as $item => $count)
                <li>{{ $item }}: {{ $count }}</li>
            @endforeach
        </ul>

        <p>Is there a violation?: <span class="proximity-status">{{ $proximity_found ? 'Yes' : 'No' }}</span></p>

        <img src="{{ asset('assets/img/home-img.png') }}" class="home-img" alt="">
    </div>
</body>

</html>
