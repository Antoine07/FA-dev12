<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student App</title>
</head>
<body>
<header>
    <nav>
        <a href="{{ url('') }}">Home</a>
        <a href="{{ url('category', [1]) }}">PHP</a>
        <a href="{{ url('category', [2]) }}">MySQL</a>
    </nav>
</header>
<div class="main">
    <div class="grid-2">
        <div class="content">
            @yield('content')
        </div>
        <div class="sidebar">
            @section('sidebar')
                <nav>
                    Sidebar
                </nav>
            @show
        </div>
    </div>
</div>
<footer></footer>
</body>
</html>