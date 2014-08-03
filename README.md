# Laravel Breadcrumbs Test App

## Installing

```bash
git clone git@github.com:davejamesmiller/laravel-breadcrumbs-test.git
git remote add upstream git@github.com:laravel/laravel.git
git checkout 4.0
composer update --prefer-source
```

## Testing different Laravel versions

```bash
git checkout 4.1
composer update --prefer-source
```

**Note:** You may need to delete the session cookie when moving backwards.

## Making changes to the test app

Make the changes to the earliest possible version then merge them

```bash
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

## Adding a new Laravel version

```bash
git checkout 4.2
git checkout -b 4.3
git fetch upstream
git merge upstream/develop # Or upstream/master if it has been released
composer update --prefer-source
```
