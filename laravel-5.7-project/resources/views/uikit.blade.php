<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UIKit Test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/css/uikit.min.css">

    </head>
    <body>

        <div class="container">
            <div class="row">

                <p>
                    @include('_menu')
                </p>

                <h1>UIKit</h1>

                <?php Config::set('breadcrumbs.view', 'breadcrumbs::uikit') ?>
                @include('_samples')

            </div>
        </div>
	<!-- JS FILES -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.6/js/uikit-icons.min.js"></script>
    </body>
</html>
