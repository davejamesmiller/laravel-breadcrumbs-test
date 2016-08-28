# Laravel Breadcrumbs Test App

## Installing

This will only work on systems that support symlinks - i.e. not Windows!

```bash
git clone git@github.com:davejamesmiller/laravel-breadcrumbs-test.git
scripts/setup.sh
```

Point the document root at the `www/` directory and open up a web browser. There is a separate folder for each version of Laravel, each containing a test application.

Laravel Breadcrumbs itself will be installed in `breadcrumbs-2/` (2.x branch) and `breadcrumbs-3/` (master branch).

## Adding a new Laravel version

```bash
cd laravel
git checkout master  # Or another branch (master = stable, develop = unstable, or a version number)
git pull
cd ..
cp -r laravel <version>
rm -rf <version>/.git
cd www
ln -s ../<version>/public <version>
```

- Update `path` in `config/session.php`
- Copy files from previous version:
    - `app/Category.php`
    - `app/Post.php`
    - `app/Http/breadcrumbs.php`
    - `app/Http/routes.php`
    - `resources/views/_breadcrumbs/print_r.blade.php`
    - `resources/views/layouts/bootstrap2.blade.php`
    - `resources/views/layouts/bootstrap3.blade.php`
    - `resources/views/_menu.blade.php`
    - `resources/views/_samples.blade.php`
    - `resources/views/blog.blade.php`
    - `resources/views/bootstrap2.blade.php`
    - `resources/views/category.blade.php`
    - `resources/views/homepage.blade.php`
    - `resources/views/post.blade.php`
    - `resources/views/print_r.blade.php`
- Update as needed to make it work
- Commit and push
