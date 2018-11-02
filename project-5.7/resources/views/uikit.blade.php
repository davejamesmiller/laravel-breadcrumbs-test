<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UIKit Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css">
    </head>
    <body>

        <div class="uk-section">
            <div class="uk-container">

                <p>
                    @include('_menu')
                </p>

                <h1>UIkit</h1>

                <?php Config::set('breadcrumbs.view', 'breadcrumbs::uikit') ?>
                @include('_samples')

            </div>
        </div>

    </body>
</html>
