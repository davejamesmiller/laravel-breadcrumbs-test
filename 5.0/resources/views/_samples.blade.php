<h2>Site home</h2>
{!! Breadcrumbs::render('home') !!}

<h2>Blog home</h2>
{!! Breadcrumbs::render('blog') !!}

<h2>Blog category 1</h2>
{!! Breadcrumbs::render('category', new App\Category(1)) !!}

<h2>Blog category 2</h2>
{!! Breadcrumbs::render('category', new App\Category(2)) !!}

<h2>Blog post 1</h2>
{!! Breadcrumbs::render('post', new App\Post(1)) !!}

<h2>Blog post 2</h2>
{!! Breadcrumbs::render('post', new App\Post(2)) !!}

<h2>Text</h2>
{!! Breadcrumbs::render('text') !!}
