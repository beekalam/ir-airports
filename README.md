# Getting Airport data from IATA code for Iran Airports.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beekalam/ir-airports.svg?style=flat-square)](https://packagist.org/packages/beekalam/ir-airports)
[![Build Status](https://travis-ci.com/beekalam/ir-airports.svg?branch=main)](https://travis-ci.com/beekalam/ir-airports)
[![Quality Score](https://img.shields.io/scrutinizer/g/beekalam/ir-airports.svg?style=flat-square)](https://scrutinizer-ci.com/g/beekalam/ir-airports)
[![Total Downloads](https://img.shields.io/packagist/dt/beekalam/ir-airports.svg?style=flat-square)](https://packagist.org/packages/beekalam/ir-airports)

A simple class to get Airport data using IATA code for Iran Airports.

## Installation

You can install the package via composer:

```bash
composer require beekalam/ir-airports
```

## Usage

``` php
$airport = Airport::fromCode('SYZ');
$airport->getType();
$airport->getEnglishName();
$airport->getPersianName();
$airport->getCoordinates();

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email beekalam@gmail.com instead of using the issue tracker.

## Credits

- [Mohammadreza Mansouri](https://github.com/beekalam)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
