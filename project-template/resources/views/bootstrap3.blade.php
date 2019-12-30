<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Packages Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container">

            <p>
                @include('_menu')
            </p>

            <h1>Bootstrap 3</h1>

            <?php Config::set('breadcrumbs.view', 'breadcrumbs::bootstrap3') ?>
            @include('_samples')

        </div>

    </body>
</html>
