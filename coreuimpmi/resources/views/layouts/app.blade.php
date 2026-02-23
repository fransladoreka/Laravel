<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper d-flex">

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar sidebar-dark sidebar-fixed">
            <div class="sidebar-brand p-3 text-white fw-bold">
                MyApp
            </div>

            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main -->
        <div class="flex-grow-1">

            <header class="header header-sticky p-3 border-bottom bg-white">
                <button class="header-toggler"
                    type="button"
                    data-coreui-toggle="sidebar">
                    ☰
                </button>
            </header>

            <div class="p-4">
                @yield('content')
            </div>

        </div>
    </div>
</body>


</html>
