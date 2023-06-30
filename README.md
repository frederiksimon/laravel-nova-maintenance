# Maintenance Mode in Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/davidpiesse/nova-maintenance-mode.svg?style=flat-square)](https://packagist.org/packages/davidpiesse/nova-maintenance-mode)
[![Build Status](https://img.shields.io/travis/davidpiesse/nova-maintenance-mode/master.svg?style=flat-square)](https://travis-ci.org/davidpiesse/nova-maintenance-mode)
[![Quality Score](https://img.shields.io/scrutinizer/g/davidpiesse/nova-maintenance-mode.svg?style=flat-square)](https://scrutinizer-ci.com/g/davidpiesse/nova-maintenance-mode)
[![Total Downloads](https://img.shields.io/packagist/dt/davidpiesse/nova-maintenance-mode.svg?style=flat-square)](https://packagist.org/packages/davidpiesse/nova-maintenance-mode)

This package allows you to manage the Maintenance Mode for your application in Nova

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require davidpiesse/nova-maintenance-mode
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...

public function tools()
{
    return [
        // ...
        new \Davidpiesse\NovaMaintenanceMode\Tool(),
    ];
}
```

## Usage

Click on the "Maintenance Mode" menu item in your Nova app to see the tool provided by this package.

![Maintenance Mode Screenshot](https://res.cloudinary.com/davidpiesse/image/upload/v1534973628/Screen_Shot_2018-08-22_at_22.31.08_a6oeuf.png)

## Credits

-   [All contributors](https://github.com/marshmallow-packages/laravel-nova-maintenance/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
