<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student App</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li> <a href="{{url('')}}">Accueil(retour)</a></li>
            <li><a href="{{url('admin', ['post'])}}">Admin des posts</a></li>
        </ul>
    </nav>
</header>
<div class="main">
    <div class="grid-2">
        <div class="content">
            @if(Session::has('message'))
                <p>{{ Session::get('message') }}</p>
            @endif
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