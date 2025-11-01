# Openpanel for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bleckert/openpanel-laravel.svg?style=flat-square)](https://packagist.org/packages/bleckert/openpanel-laravel)

Simple Laravel provider for [Openpanel](https://openpanel.dev/) event tracking.

## Installation

You can install the package via composer:

```bash
composer require bleckert/openpanel-laravel
```

## Setup

Grab your Openpanel ID and secret by navigating to Settings -> Projects and create a client using typ "Other". You'll then recieve an ID and secret.

Add the following to your `.env` file:

```bash
OPENPANEL_CLIENT_ID=your-id
OPENPANEL_CLIENT_SECRET=your-secret
```

If you self-host Openpanel, you can set the `OPENPANEL_URL` variable to your Openpanel URL.

```bash
OPENPANEL_URL=https://your-openpanel-url.com
```

## Usage

```php
use Bleckert\OpenpanelLaravel\Openpanel;

$openpanel = app(Openpanel::class);

// Set profile ID that will be used for all events as the `profileId` property.
$openpanel->setProfileId(1);

// Update user profile
$openpanel->identify(
    profileId: 1,
    firstName: 'John Doe',
    lastName: 'Doe',
    email: 'joe@doe.com',
    // ...
);

// Track event
$openpanel->track(
    name: 'User registered',
);

// Increment property
$openpanel->increment('visits');

// Decrement property
$openpanel->decrement('visits');
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
