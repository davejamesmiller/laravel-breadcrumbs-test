# Laravel Breadcrumbs Test App

## Installing

```bash
git clone git@github.com:davejamesmiller/laravel-breadcrumbs-test.git -b 5.0
git remote add upstream git@github.com:laravel/laravel.git
composer update --prefer-source
```

## Testing different Laravel versions

```bash
git checkout <version> # 5.0 / 4.2 / 4.1 / 4.0
composer update --prefer-source
```

**Note:** You will need to delete the session cookie in your browser when moving backwards from 4.1 to 4.0 else `SessionHandler::read()` will throw an exception.

Sometimes I find Composer gets stuck updating `symfony/debug` - not sure why, but `rm -rf vendor/` usually fixes it.

## Making changes to the test app

Make the changes to the earliest possible version then merge them

### Laravel 5 (Breadcrumbs 3.x)

```bash
git checkout 5.0
composer update --prefer-source
# Make & commit changes for 5.0

git push --all origin
```

### Laravel 4 (Breadcrumbs 2.x)

```bash
git checkout 4.0
composer update --prefer-source
# Make & commit changes for 4.0

git checkout 4.1
git merge 4.0
composer update --prefer-source
# Test & make any further changes required for 4.1

git checkout 4.2
git merge 4.1
composer update --prefer-source
# Test & make any further changes required for 4.2

git push --all origin
```

## Adding a new Laravel version

```bash
git checkout 5.0
git checkout -b 5.1
git fetch upstream
git merge upstream/develop # Or upstream/master if it has been released
# Resolve any conflicts
composer update --prefer-source
# Test & make any further changes required

git push --all origin
```
