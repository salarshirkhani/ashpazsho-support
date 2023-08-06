<?php

use Helldar\PrettyArray\Contracts\Caseable;

return [
    /*
     * Path to source translation files.
     */

    'vendor' => base_path('vendor/caouecs/laravel-lang/src'),

    /*
     * Do arrays need to be aligned by keys before processing arrays?
     *
     * By default, true
     */

    'alignment' => true,

    /*
     * Key exclusion when combining.
     */

    'exclude' => [
        // 'auth' => ['throttle'],
        // 'pagination' => ['previous'],
        // 'passwords' => ['reset', 'throttled', 'user'],
    ],

    /*
     * Change key case.
     *
     * Available values:
     *
     *   Helldar\PrettyArray\Contracts\Caseable::NO_CASE      - Case does not change
     *   Helldar\PrettyArray\Contracts\Caseable::CAMEL_CASE   - camelCase
     *   Helldar\PrettyArray\Contracts\Caseable::KEBAB_CASE   - kebab-case
     *   Helldar\PrettyArray\Contracts\Caseable::PASCAL_CASE  - PascalCase
     *   Helldar\PrettyArray\Contracts\Caseable::SNAKE_CASE   - snake_case
     *
     * By default, Caseable::NO_CASE
     */
    'case'    => class_exists(Caseable::class) ? Caseable::NO_CASE : 0,
];
