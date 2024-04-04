# Openpanel for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bleckert/openpanel-laravel.svg?style=flat-square)](https://packagist.org/packages/bleckert/openpanel-laravel)

Simple Laravel provider for [Openpanel](https://openpanel.dev/) event tracking.

## Installation

You can install the package via composer:

```bash
composer require tbleckert/openpanel-laravel
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

// Identify user
$openpanel->setProfileId(1);

// Update user profile
$openpanel->setProfile(
    id: 1,
    firstName: 'John Doe',
    // ...
);

// Track event
$openpanel->event(
    name: 'User registered',
);
```

## Run in background

By default, Openpanel requests are sent synchronously. If you want to send the requests in the background, you can set `OPENPANEL_QUEUE_CONNECTION` in your env file.

```bash
OPENPANEL_QUEUE_CONNECTION=redis
```

Optionally, you can set the queue name:

```bash
OPENPANEL_QUEUE_NAME=your-queue-name
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