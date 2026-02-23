<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body id="page-top">

    <div id="wrapper">

        {{-- Sidebar --}}
        @include('layouts.sidebar')

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('layouts.navbar')

                <div class="container-fluid mt-4">
                    @yield('content')
                </div>
            </div>

            @include('layouts.footer')

        </div>
    </div>

</body>

</html>
