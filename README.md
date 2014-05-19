# Laravel Breadcrumbs Test App

## Installing

```
git clone git@github.com:davejamesmiller/laravel-breadcrumbs-test.git
git checkout 4.0
composer update --prefer-source
```

## Switching branch

```
git checkout 4.1
composer update --prefer-source
```

## Making changes to the test app

Make the changes to the earliest possible version then merge them

```
git checkout 4.0
composer update --prefer-source
# Make & commit changes

git checkout 4.1
git merge 4.0
composer update --prefer-source
# Test & make any further changes required

git checkout 4.2
git merge 4.1
composer update --prefer-source
# Test & make any further changes required
```
