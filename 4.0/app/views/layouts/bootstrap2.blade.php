<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Breadcrumbs Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav">
                        @include('_menu')
                    </ul>
                </div>
            </div>

            {{-- Breadcrumbs::render() --}}

            @yield('content')

        </div>

    </body>
</html>
