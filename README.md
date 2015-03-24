# Flipkey API Wrapper

############
This class does nothing useful yet.
############

This is a simple FlipKey data API wrapper written in PHP.

## Install

Via Composer

``` bash
$ composer require gueststream/flipkey
```

## Usage

In order to use this Library you'll need to know your FlipKey API Key, Remote ID and the Property Code 
(or flipkey ID for the given property)

``` php
$apiKey = "FlipKey API Key Goes Here";
$remoteId = "Remote ID Goes Here";
$propertyCode = "Property Code Goes Here";
$flipkey = new FlipKey\FlipKey($apiKey,$remoteId);
$property = $flipkey->getProperty($propertyCode);
print_r($property);
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Josh Houghtelin](https://github.com/JHoughtelin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
