<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <div class="app">
        <div class="content">
            <div class="header">
                <h1 class="header__title">PiGLy</h1>
            </div>
            <div class="input_form">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>