# fXmlRpc Benchmarks

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

**Benchmarks for fXmlRpc components.**


## How fast is it really?

IO performance is out of reach from a userspace perspective, but parsing and serialization speed is what matters. How fast can we generate the XML payload from PHP data structures and how fast can we parse the servers response? fXmlRpc uses stream based XML writers/readers to achieve it’s performance and heavily optimizes (read uglifies) for it. As as result the userland version is only around 2x slower than the native C implementation (ext/xmlrpc).


```
fXmlRpc\Benchmark\Parser
    Method Name      Iterations    Average Time      Ops/second
    --------------  ------------  --------------    -------------
    zendFramework2: [40        ] [0.2124617695808] [4.70673]
    zendFramework1: [40        ] [0.2296484649181] [4.35448]
    native        : [40        ] [0.0936997652054] [10.67239]
    xmlReader     : [40        ] [0.1725538551807] [5.79529]


fXmlRpc\Benchmark\Serializer
    Method Name      Iterations    Average Time      Ops/second
    --------------  ------------  --------------    -------------
    zendFramework2: [40        ] [0.4969589293003] [2.01224]
    zendFramework1: [40        ] [0.5728678703308] [1.74560]
    native        : [40        ] [0.0665354609489] [15.02958]
    xmlWriter     : [40        ] [0.1777280807495] [5.62657]
```


## Usage

1. Clone the repository
2. Run `composer install`
3. Run `./vendor/bin/athletic -p ./benchmarks/`


## Security

If you discover any security related issues, please contact us at [security@fxmlrpc.org](mailto:security@fxmlrpc.org).


## Credits

- [Lars Strojny](https://github.com/lstrojny)
- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/fxmlrpc/serialization/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
