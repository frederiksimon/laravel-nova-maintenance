# Maintenance Mode in Nova

This package allows you to manage the Maintenance Mode for your application in Nova

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require composer require marshmallow/maintenance
```

Then you'll need to publish the config and view to give you more control and visibility. Run this command:

```bash
php artisan mm-maintenance:install
```

Two files have been added to your project:

Maintenance page:
`resources/views/vendor/marshmallow/maintenance`

Config file:
`config/maintenance.php`

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.**php**

// ...
use Marshmallow\Maintenance\Maintenance as MaintenanceTool;

public function tools()
{
    return [
            //
            new MaintenanceTool
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
