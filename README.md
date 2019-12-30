# Laravel Packages Test App

This is a small application to test my [Laravel](https://laravel.com/) packages:

- [Laravel Breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs)
- More to come...

This is in addition to the unit & integration tests (not an alternative to them).

## Installing

This will only work on systems that support symlinks - i.e. not Windows!

```bash
git clone git@github.com:davejamesmiller/laravel-packages-test.git
scripts/setup.sh
```

Point the document root at the `public/` directory and open up a web browser. There is a separate folder for each supported version of Laravel, each containing a test application.

## Adding a new Laravel version

```bash
version=<X.X>
cd laravel-template
git checkout master  # Or another branch (master = stable, develop = unstable, or a version number)
git pull
cd ..
cp -r laravel-template project-$version
rm -rf project-$version/.git
scripts/update-links.sh
```

- Copy files from previous version:
    - `app/Category.php`
    - `app/Post.php`
    - `app/Http/Controllers/UnnamedExceptionController.php`
    - `breadcrumbs/*`
    - `config/breadcrumbs.php`
    - `resources/views/*` except `welcome.blade.php`
    - `routes/web.php`
- Compare the old and new versions for things that need to be updated:
    - `repositories` and `require` sections in `composer.json`
    - `debug`, `key` in `config/app.php`
    - `path` in `config/session.php`
- Update `breadcrumbs/composer.json` to support the new version
- Run `scripts/setup.sh`
- Test it and update as needed
- Commit and push changes

## Removing an old Laravel version

- `rm -rf laravel-<version>-project`
- `scripts/update-links.sh`
- Commit and push changes
