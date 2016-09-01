<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student App</title>
    @include('partials.scripts')
</head>
<body>
<header>
   @include('partials.menu')
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