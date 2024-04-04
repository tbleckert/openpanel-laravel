# Openpanel for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tbleckert/openpanel-laravel.svg?style=flat-square)](https://packagist.org/packages/tbleckert/openpanel-laravel)

Simple Laravel provider for [Openpanel](https://openpanel.dev/) event tracking.

## Installation

You can install the package via composer:

```bash
composer require tbleckert/openpanel-laravel
```

## Usage

```php
use Bleckert\OpenpanelLaravel\Openpanel;

Openpanel::event(
    name: 'User registered',
    properties: ['user_id' => 1],
);
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

-   [Tobias Bleckert](https://github.com/tbleckert)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.