# Lang Publisher

Publisher lang files for the Laravel Framework from [caouecs/Laravel-lang][link_source] package.

![lang publisher](https://user-images.githubusercontent.com/10347617/40197727-f26e0aac-5a1c-11e8-81fa-077ad71915d7.png)


[![StyleCI Status][badge_styleci]][link_styleci]
[![Github Workflow Status][badge_build]][link_build]
[![Coverage Status][badge_coverage]][link_scrutinizer]
[![Scrutinizer Code Quality][badge_quality]][link_scrutinizer]
[![For Laravel][badge_laravel]][link_packagist]

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]


## Table of contents

* [Installation](#installation)
  * [For Lumen](#for-lumen)
  * [Compatibility table](#compatibility-table)
* [How to use](#how-to-use)
  * [Important](#important)
  * [Install locales](#install-locales)
  * [Update locales](#update-locales)
  * [Uninstall locales](#uninstall-locales)
* [Features](#features)
  * [Alignment](#alignment)
  * [Facades](#facades)
      * [Config](#config)
      * [Locale](#locale)
      * [Path](#path)
* [Security](#security)
* [Credits](#credits)


## Installation

To get the latest version of Laravel Lang Publisher, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require andrey-helldar/laravel-lang-publisher --dev
```

Or manually update `require-dev` block of `composer.json` and run `composer update`.

```json
{
    "require-dev": {
        "andrey-helldar/laravel-lang-publisher": "^4.0"
    }
}
```

You can also publish the config file to change implementations (ie. interface to specific class):
```
php artisan vendor:publish --provider="Helldar\LaravelLangPublisher\ServiceProvider"
```

#### For Lumen

This package is focused on Laravel development, but it can also be used in Lumen with some workarounds. Because Lumen works a little different, as it is like a barebone version of Laravel and the main configuration parameters are instead located in `bootstrap/app.php`, some alterations must be made.

##### Adding the Service Provider

You can install Laravel IDE Helper in `app/Providers/AppServiceProvider.php`, and uncommenting this line that registers the App Service Providers so it can properly load.

```
// $app->register(App\Providers\AppServiceProvider::class);
```

If you are not using that line, that is usually handy to manage gracefully multiple Laravel/Lumen installations, you will have to add this line of code under the `Register Service Providers` section of your `bootstrap/app.php`.

```php
if ($app->environment() !== 'production') {
    $app->register(\Helldar\LaravelLangPublisher\ServiceProvider::class);
}
```

After that, Laravel Lang Publisher should work correctly.


### Compatibility table

|Laravel version|PHP min version|PHP tested version|Tag|Package min version|Package max version|Comment|
|---|---|---|---|---|---|---|
|5.3|^5.6.4|5.6|^1.0|1.1.2|1.1.4| ![Not Supported][badge_not_supported] |
|5.4|^5.6.4|5.6|^1.0|1.0.0|1.1.4| ![Not Supported][badge_not_supported] |
|5.5|^7.0.0|7.1, 7.2, 7.3|^1.0|1.0.0|1.6.0| ![Not Supported][badge_not_supported] |
|5.6|^7.1.3|7.2, 7.3|^1.0|1.0.0|1.6.0| ![Not Supported][badge_not_supported] |
|5.7, 5.8|^7.1.3|7.2, 7.3|^1.0|1.0.0|1.6.0| ![Not Supported][badge_not_supported] You can install package `^1.0` version on the Laravel 5.8, but there are two nuances: translation files from version 5.7 will be copied, and there will be no support for [saving validator keys](https://github.com/andrey-helldar/laravel-lang-publisher#features). |
|5.8, 6.x, 7.x|^7.1.3|7.2, 7.3, 7.4|^2.0|2.0.0|2.3.1| ![Not Supported][badge_not_supported] |
|6.x, 7.x|^7.2.5|7.2, 7.3, 7.4|^3.0|3.0.0|3.1.0| ![Not Supported][badge_not_supported] |
|7.x, 8.x|^7.2.5|7.2, 7.3, 7.4|^4.0|4.0.0|^4.0| ![Supported][badge_supported] If you installed the package before the release of version 4.0.1, To fix config cache errors on production, update the `case` key value in [config/lang-publisher.php](config/lang-publisher.php#L43) file.|


## How to use

### Important

The package replaces only certain files in your lang directories:

```
auth.php
pagination.php
passwords.php
validation.php
```

**If you made changes to the files, they will be saved.**

He does not touch any other files.


### Install locales

When executing the `php artisan lang:install` command, the list of localizations. Example:

```bash
php artisan lang:install en de ro zh-CN lv
php artisan lang:install de
```

If files do not exist in the destination folder, they will be created. And if the files exist, the console will ask you for a replacement.

Also, if the files exist, and you do not want to agree each time, you can pass the attribute `--force` or its alias `-f` for forced replacement.

```bash
php artisan lang:install de en ro zh-CN --force
php artisan lang:install de --force
php artisan lang:install de -f
```

You can also use the `*` symbol to install all localizations:

```bash
php artisan lang:install * -f
php artisan lang:install * --force
php artisan lang:install * -f
```


### Update locales

When executing the `php artisan lang:update` command, the package learns which localizations installed in your application and will replace the matching files.

Command `php artisan lang:update` is an alias of `php artisan lang:install --force <locales>`.


### Uninstall locales

> **ATTENTION**
>
> When this command is executed, the entire locale folder with all files is deleted.

To delete localizations, you must use `lang:uninstall` command, passing the letter abbreviations into it:
```bash
php artisan lang:uninstall de ro zh-CN
```

You can also specify the `*` symbol to delete all localizations:
```bash
php artisan lang:uninstall *
```

In this case, everything will be deleted, except the default and fallback application locales.


## Features

### Alignment

**Attention!**  This feature works only in Laravel 5.5 and higher with php 7.1.3 and higher.

When updating files, all comments from the final files are automatically deleted. Unfortunately, [var_export](https://www.php.net/manual/en/function.var-export.php) does not know how to work with comments.

Your file example:
```php
// auth.php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'failed'   => 'These credentials do not match our records 123456.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'foo'      => 'bar',
];
```

An updated file:
```php
// auth.php
<?php

return [
    'failed'   => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'foo'      => 'bar',
];
```

and example of `validation.php` file:
Your file:
```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    
    // many rules
    
    'uuid'                 => 'The :attribute must be a valid UUID.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [
        'name' => [
            'required' => 'Custom message 1',
            'string'   => 'Custom message 2',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */
    'attributes' => [
        'name' => 'Foo',
        'bar'  => 'Bar',
        'baz'  => 'Baz',
    ],
];
```

Updated:
```php
<?php

return [
    'accepted'   => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    
    // many rules
    
    'uuid'       => 'The :attribute must be a valid UUID.',
    'custom'     => [
        'name' => [
            'required' => 'Custom message 1',
            'string'   => 'Custom message 2',
        ],
    ],
    'attributes' => [
        'name'       => 'Name',
        'username'   => 'Nickname',
        'email'      => 'E-Mail address',
        'first_name' => 'First Name',
        'last_name'  => 'Last Name',
        'bar'        => 'Bar',
        'baz'        => 'Baz',
    ],
];
```

### Facades

Perhaps the facades will be useful to you:

#### Config
```php
use Helldar\LaravelLangPublisher\Facades\Config;


// Getting a link to the folder with the source localization files.
// Will return the value set to `config/lang-publisher.php`.
Config::getVendorPath(): string


// Getting the default localization name.
Config::getLocale(): string


// Getting the fallback localization name.
Config::getFallbackLocale(): string


// Will array alignment be applied
Config::isAlignment(): bool


// Returns an array of exceptions set by the developer
// when installing and updating localizations.
Config::getExclude(string $key, array $default = []): array


// Returns the key mapping label.
// Available:
//
// Helldar\PrettyArray\Contracts\Caseable::NO_CASE      - Case does not change
// Helldar\PrettyArray\Contracts\Caseable::CAMEL_CASE   - camelCase
// Helldar\PrettyArray\Contracts\Caseable::KEBAB_CASE   - kebab-case
// Helldar\PrettyArray\Contracts\Caseable::PASCAL_CASE  - PascalCase
// Helldar\PrettyArray\Contracts\Caseable::SNAKE_CASE   - snake_case
Config::getCase(): int
```


#### Locale
```php
use Helldar\LaravelLangPublisher\Facades\Locale;

// List of available locations.
Locale::available(): array

// List of installed locations.
Locale::installed(): array

// Retrieving a list of protected locales.
Locale::protects(): array

// Checks if a language pack is installed.
Locale::isAvailable(string $locale): bool

// Checks whether it is possible to install the language pack.
Locale::isInstalled(string $locale): bool

// The checked locale protecting.
Locale::isProtected(string $locale): bool

// Getting the default localization name.
Locale::getDefault(): string

// Getting the fallback localization name.
Locale::getFallback(): string
```


#### Path
```php
use Helldar\LaravelLangPublisher\Facades\Path;

// Returns a direct link to the folder with the source localization files.
// 
// If the file name is specified, a full link to the file will be returned,
// otherwise a direct link to the folder.
Path::source(string $locale = null, string $filename = null): string


// Returns the direct link to the localization folder or,
// if the file name is specified, a link to the localization file.
//
// If the file name or localization is not specified,
// the link to the shared folder of all localizations will be returned.
Path::target(string $locale = null, string $filename = null): string
```


## Security

If you discover any security related issues, please email helldar@ai-rus.com instead of using the [issue](https://github.com/andrey-helldar/laravel-lang-publisher/issues) tracker.


## Credits

- [Andrey Helldar][link_author]
- [![All contributors][badge_contributors]][link_contributors]


[badge_build]:          https://img.shields.io/github/workflow/status/andrey-helldar/laravel-lang-publisher/phpunit?style=flat-square
[badge_contributors]:   https://img.shields.io/github/contributors/andrey-helldar/laravel-lang-publisher?style=flat-square
[badge_coverage]:       https://img.shields.io/scrutinizer/coverage/g/andrey-helldar/laravel-lang-publisher.svg?style=flat-square
[badge_downloads]:      https://img.shields.io/packagist/dt/andrey-helldar/laravel-lang-publisher.svg?style=flat-square
[badge_laravel]:        https://img.shields.io/badge/Laravel-5.3+%20|%206.x%20%7C%207.x%20%7C%208.x-orange.svg?style=flat-square
[badge_license]:        https://img.shields.io/packagist/l/andrey-helldar/laravel-lang-publisher.svg?style=flat-square
[badge_not_supported]:  https://img.shields.io/badge/not--supported-lightgrey?style=flat-square
[badge_quality]:        https://img.shields.io/scrutinizer/g/andrey-helldar/laravel-lang-publisher.svg?style=flat-square
[badge_stable]:         https://img.shields.io/github/v/release/andrey-helldar/laravel-lang-publisher?label=stable&style=flat-square
[badge_styleci]:        https://styleci.io/repos/119022335/shield
[badge_supported]:      https://img.shields.io/badge/supported-green?style=flat-square
[badge_unstable]:       https://img.shields.io/badge/unstable-dev--master-orange?style=flat-square

[link_author]:          https://github.com/andrey-helldar
[link_build]:           https://github.com/andrey-helldar/laravel-lang-publisher/actions
[link_contributors]:    https://github.com/andrey-helldar/laravel-lang-publisher/graphs/contributors
[link_license]:         LICENSE
[link_packagist]:       https://packagist.org/packages/andrey-helldar/laravel-lang-publisher
[link_scrutinizer]:     https://scrutinizer-ci.com/g/andrey-helldar/laravel-lang-publisher/?branch=master
[link_source]:          https://github.com/caouecs/Laravel-lang
[link_styleci]:         https://github.styleci.io/repos/119022335
