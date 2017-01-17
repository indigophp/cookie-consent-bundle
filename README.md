# Indigo Cookie Consent Bundle

[![Latest Version](https://img.shields.io/github/release/indigophp/cookie-consent-bundle.svg?style=flat-square)](https://github.com/indigophp/cookie-consent-bundle/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/indigophp/cookie-consent-bundle.svg?style=flat-square)](https://travis-ci.org/indigophp/cookie-consent-bundle)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/indigophp/cookie-consent-bundle.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/cookie-consent-bundle)
[![Quality Score](https://img.shields.io/scrutinizer/g/indigophp/cookie-consent-bundle.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/cookie-consent-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/indigophp/cookie-consent-bundle.svg?style=flat-square)](https://packagist.org/packages/indigophp/cookie-consent-bundle)

**Symfony Bundle for the popular [Cookie Consent plugin](https://silktide.com/tools/cookie-consent/).**


## Install

Via Composer

``` bash
$ composer require indigophp/cookie-consent-bundle
```

Enable the bundle in your kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Indigo\Bundle\CookieConsentBundle\IndigoCookieConsentBundle(),
    );
}
```


## Usage

Add [Cookie Consent](https://silktide.com/tools/cookie-consent/) to your website.

Configure the bundle:

``` yaml
indigo_cookie_consent:
    options:
        # any options you would pass to the plugins (except labels: message, dismiss, learnMore)
        # see https://silktide.com/tools/cookie-consent/docs/installation
    script: false # You can turn script off or pass a script location (eg. to use a specific version)
```

**Note:** labels are automatically translated. Translations are in `IndigoCookieConsentBundle` domain (PRs welcome).


Use the `cookie_consent_render` method in your Twig template:
`{{ cookie_consent_render() }}`


## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## Security

If you discover any security related issues,
please contact us at [security@indigophp.com](mailto:security@indigophp.com).


## Credits

Many thanks to [David Buchmann](https://github.com/dbu) for helping me with my First Symfony Bundle (tm).

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/cookie-consent-bundle/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
