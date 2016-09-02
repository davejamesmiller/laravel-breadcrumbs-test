# Laravel Breadcrumbs Test App

## Installing

**Note:** Laravel 5.3+ requires PHP 5.6+.

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

- Copy files from previous version:
    - `app/Category.php`
    - `app/Post.php`
    - `config/breadcrumbs.php`
    - `resources/views/_breadcrumbs/`
    - `resources/views/errors/404.blade.php`
    - `resources/views/layouts/`
    - `resources/views/_menu.blade.php`
    - `resources/views/_samples.blade.php`
    - `resources/views/blog.blade.php`
    - `resources/views/bootstrap2.blade.php`
    - `resources/views/category.blade.php`
    - `resources/views/home.blade.php`
    - `resources/views/post.blade.php`
    - `resources/views/print_r.blade.php`
    - `routes/breadcrumbs.php` (TODO: Is this the right place to put it??)
    - `routes/web.php`
- Update `repositories` and `require` sections in `composer.json`
- Update `debug`, `key`, `providers` and `aliases` in `config/app.php`
- Update `path` in `config/session.php`
- Update `scripts/setup.sh` to include the new version
- Run `scripts/setup.sh`
- Test it and update as needed
- Commit and push changes
