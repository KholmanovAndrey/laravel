<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <header class="header">
        <nav class="nav">
            <ul class="menu">
                <li class="menu__list"><a href="/" class="menu__link">Главная</a></li>
                <li class="menu__list"><a href="/news" class="menu__link">Новости</a></li>
                <li class="menu__list"><a href="/contact" class="menu__link">Контакты</a></li>
            </ul>
        </nav>
    </header>

    @yield('content')

</body>
</html>