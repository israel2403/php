<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/home">Home</a> </li>
            <li><a href="/contact">Contact</a> </li>
            <li><a href="/portfolio">Portfolio</a> </li>
            <li><a href="/contact">Contact</a> </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>
