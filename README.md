# Laravel Breadcrumbs Test App

## Installing

This will only work on systems that support symlinks - i.e. not Windows!

```bash
git clone git@github.com:davejamesmiller/laravel-breadcrumbs-test.git
scripts/setup.sh
```

Point the document root at the `public/` directory and open up a web browser. There is a separate folder for each supported version of Laravel, each containing a test application.

Laravel Breadcrumbs itself will be installed in `breadcrumbs/`.

## Adding a new Laravel version

```bash
version=<X.X>
cd laravel-template
git checkout master  # Or another branch (master = stable, develop = unstable, or a version number)
git pull
cd ..
cp -r laravel-template laravel-$version-project
rm -rf laravel-$version-project/.git
cd public
ln -s ../laravel-$version-project/public laravel-$version
```

- Copy files from previous version:
    - `app/Category.php`
    - `app/Post.php`
    - `breadcrumbs/`
    - `config/breadcrumbs.php`
    - `resources/views/_breadcrumbs/`
    - `resources/views/errors/`
    - `resources/views/layouts/`
    - `resources/views/_menu.blade.php`
    - `resources/views/_samples.blade.php`
    - `resources/views/blog.blade.php`
    - `resources/views/bootstrap2.blade.php`
    - `resources/views/bootstrap3.blade.php`
    - `resources/views/bulma.blade.php`
    - `resources/views/category.blade.php`
    - `resources/views/foundation6.blade.php`
    - `resources/views/home.blade.php`
    - `resources/views/materialize.blade.php`
    - `resources/views/post.blade.php`
    - `resources/views/print_r.blade.php`
    - `resources/views/section.blade.php`
    - `resources/views/unnamed.blade.php`
    - `routes/web.php`
- Compare the old and new versions for things that need to be updated:
    - `repositories` and `require` sections in `composer.json`
    - `debug`, `key` in `config/app.php`
    - `path` in `config/session.php`
- Update `scripts/setup.sh` to include the new version (if required)
- Update `breadcrumbs/composer.json` to support the new version
- Run `scripts/setup.sh`
- Test it and update as needed
- Commit and push changes

## Removing an old Laravel version

- `rm -rf laravel-<version>-project`
- `rm -f public/laravel-<version>`
- Commit and push changes
