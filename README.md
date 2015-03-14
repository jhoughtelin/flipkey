# Flipkey API Wrapper

############
This class does nothing useful yet.
############

This is a simple FlipKey data API wrapper written in PHP.

## Install

Via Composer

``` bash
$ composer require flipkey/flipkey
```

## Usage

``` php
$flipkey = new FlipKey\FlipKey($apiKey,$remoteId);
$property = $flipkey->getProperty($propertyCode);
print_r($property);
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email josh@findsomehelp.com instead of using the issue tracker.

## Credits

- [Josh Houghtelin](https://github.com/JHoughtelin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
