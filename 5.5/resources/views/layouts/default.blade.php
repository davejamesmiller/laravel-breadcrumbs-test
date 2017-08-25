<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ Breadcrumbs::pageTitle() }}</title>
        {{--<title>
            {{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title –" : '' }}
            {{ ($page = (int) request('page')) > 1 ? "Page $page –" : '' }}
            Laravel Breadcrumbs Test
        </title>--}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        {{ Breadcrumbs::view('breadcrumbs::json-ld') }}
    </head>
    <body>

        <div class="container">

            <p>
                @include('_menu')
            </p>

            <h1>Breadcrumbs for this page:</h1>
            @hasSection('breadcrumbs')
                @yield('breadcrumbs')
                <p><em>Rendered with @@yield()</em></p>
            @else
                {{ Breadcrumbs::render() }}
                <p><em>Rendered with Breadcrumbs::render()</em></p>
            @endif

            @yield('content')

        </div>

    </body>
</html>
