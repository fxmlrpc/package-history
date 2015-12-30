# FXMLRPC Zend Framework 1 Serialization

[![Latest Version](https://img.shields.io/github/release/fxmlrpc/zend1-serialization.svg?style=flat-square)](https://github.com/fxmlrpc/zend1-serialization/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/fxmlrpc/zend1-serialization.svg?style=flat-square)](https://travis-ci.org/fxmlrpc/zend1-serialization)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/fxmlrpc/zend1-serialization.svg?style=flat-square)](https://scrutinizer-ci.com/g/fxmlrpc/zend1-serialization)
[![Quality Score](https://img.shields.io/scrutinizer/g/fxmlrpc/zend1-serialization.svg?style=flat-square)](https://scrutinizer-ci.com/g/fxmlrpc/zend1-serialization)
[![Total Downloads](https://img.shields.io/packagist/dt/fxmlrpc/zend1-serialization.svg?style=flat-square)](https://packagist.org/packages/fxmlrpc/zend1-serialization)

**FXMLRPC serialization wrapper around Zend XML-RPC 1.**


## Install

Via Composer

``` bash
$ composer require fxmlrpc/zend1-serialization
```


## Incompatibility list

Zend 1 is not fully compatible with the rest of the serializers and parsers.


### Parser incompatibility

- Automatically decodes Base64 encoded values
- Does not return DateTime objects
- Cannot return empty DateTime values
- Does not support Apache Nil
- Incorrectly detects invalid multiple parameters
- Cannot parse response containing an [XXE Attack](https://en.wikipedia.org/wiki/XML_external_entity_attack)


### Serializer incompatibility

- If no params are passed, no empty params tag is generated
- Unlike the xmlrpc extension, Zend 1 does not add [newlines](http://php.net/manual/en/function.xmlrpc-encode-request.php#27992)


## Testing

``` bash
$ composer test
```


## Security

If you discover any security related issues, please contact us at [security@fxmlrpc.org](mailto:security@fxmlrpc.org).


## Credits

- [Lars Strojny](https://github.com/lstrojny)
- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/fxmlrpc/zend1-serialization/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
