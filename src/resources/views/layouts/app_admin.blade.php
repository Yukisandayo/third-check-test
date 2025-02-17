<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common_admin.css')}}">
    @yield('css')
</head>

<body>
    <div class="app">
        <div class="content">
            <div class="header">
                <div class="header__inner">
                    <h2 class="header__title">PiGLy</h2>
                    <div class="header__navigation">
                        <a href="" class="header__link">目標体重設定</a>
                        <form action="{{ 'goal_setting' }}" method="post">
                        @csrf
                            <input class="header__link" type="submit" value="ログアウト">
                        </form>
                    </div>
                </div>
            </div>
            <div class="main">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>