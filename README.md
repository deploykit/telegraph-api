# Telegra.ph API for PHP

[![Packagist](https://img.shields.io/packagist/v/symfony/symfony.svg)](https://packagist.org/packages/deploykit/telegraph-api)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](LICENSE.md)
[![StyleCI](https://styleci.io/repos/76974544/shield?branch=master&style=flat)](https://styleci.io/repos/76974544)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/filp/whoops.svg)](https://scrutinizer-ci.com/g/deploykit/telegraph-api)

This package lets you work with [telegra.ph](http://telegra.ph) API.

## Contents

- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)

## Installation

To get the latest version of Telegra.ph API client simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require deploykit/telegraph-api
```

Or you can manually update your require block and run `composer update` if you choose so:

```json
{
    "require": {
        "deploykit/telegraph-api": "~0.1.0"
    }
}
```

## Usage
All methods in Telegraph Client class correspond to API methods that are described in [Telegraph API documentation](http://telegra.ph/api).

```php
$telegraph = new \Deploykit\Telegraph\Client();

$telegraph->createAccount('Author', 'Author name', 'http://example.com');
```

All entities' classes implement ArrayAccess, so any property of any class can be accessed either in object style or in array style.
For all methods that require `access_token`, you can either provide a string with your token or provide instance of `\Deploykit\Telegraph\Entities\Account` class.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Alexey Plekhanov](https://github.com/alexsoft)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
