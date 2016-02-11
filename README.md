# Lob.com Symfony Bundle

Encapsulates [Lob.com][lob.com]'s [PHP SDK][lob/lob-php] in a Symfony bundle for configuration.

Bundled at CrowdReactive, makers of [EventsTag](https://eventstag.com/).

[![Build Status](https://travis-ci.org/CrowdReactive/lob-bundle.svg?branch=master)](https://travis-ci.org/CrowdReactive/lob-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/CrowdReactive/lob-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/CrowdReactive/lob-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/CrowdReactive/lob-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/CrowdReactive/lob-bundle/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/CrowdReactive/lob-bundle/v/stable.svg)](https://packagist.org/packages/CrowdReactive/lob-bundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3a7ed444-dbd0-48cd-8b33-a383bf30c6b2/mini.png)](https://insight.sensiolabs.com/projects/3a7ed444-dbd0-48cd-8b33-a383bf30c6b2)

## Usage

1.  Install the bundle

```
composer require crowdreactive/lob-bundle
```

2.  Add it to AppKernel

```php
class AppKernel {
    public function registerBundles() {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            // ...
            new CrowdReactive\LobBundle\CrowdReactiveLobBundle(),
        ];
    }
}
```

3.  Configuration

```yml
lob:
    # Required
    api_key: abc123

    # Optional
    version: 1.5.0      # A specific version of the API
```

4.  Access the Lob service

The `Lob\Lob` instance is named `lob` in the dependency container. Access it with:

```php
$this->container->get('lob');
```

```yml
my_postal_service:
    class: My\PostalService
    arguments:
        -   "@lob"
```

## Contributing

PRs welcomed! Make sure to run the tests with `composer run tests`.

## License

This bundle is under the MIT license. [See the complete license][license].

[lob.com]: https://lob.com/
[lob/lob-php]: https://github.com/lob/lob-php
[license]: LICENSE

