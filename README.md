# Laravel Packages Test App

This is a small application to test my [Laravel](https://laravel.com/) packages:

- [Laravel Breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs)
- [Laravel Migrations UI](https://github.com/davejamesmiller/laravel-migrations-ui)
- [Laravel Route Browser](https://github.com/davejamesmiller/laravel-route-browser)

This is in addition to the unit & integration tests (not an alternative to them).

## Requirements

- PHP
- Composer (`composer` executable in $PATH)
- MySQL (for Laravel Migrations UI only)

## Installing

This will only work on systems that support symlinks - i.e. not Windows!

```bash
git clone git@github.com:davejamesmiller/laravel-packages-test.git
scripts/setup.sh
```

Point the document root at the `public/` directory and open up a web browser. There is a separate folder for each supported version of Laravel, each containing a test application.

## Adding/removing a Laravel versions

- Edit `scripts/generate-projects.php`
- Run it
- Commit and push changes
