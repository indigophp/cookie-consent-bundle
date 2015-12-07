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
        new Indigo\CookieConsentBundle\IndigoCookieConsentBundle(),
    );
}
```


## Usage

Add [Cookie Consent](https://silktide.com/tools/cookie-consent/) to your website.

Use the `cookie_consent_render` method in your Twig template:

`{{ cookie_consent_render({'link': 'http://example.com/privacy', 'theme': 'dark-bottom'}, {'script': false}) }}`

The first parameter is an array of options as defined in the Cookie Consent
[documentation](https://silktide.com/tools/cookie-consent/docs/installation/).

If you don't pass label options (currently: `message`, `dismiss`, `learnMore`), they are automatically translated
to your language (if available, PRs welcome) based on the original values (see the documentation).

If you pass them, no translation is done.

The second parameter is a config array, currently accepting one config: `script`.
Set it to `false` if you have the plugin compiled into your script.
Set it to any string value to include that as a script (defaults to the one defined in the documentation).


## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## Security

If you discover any security related issues,
please contact us at [security@indigophp.com](mailto:security@indigophp.com).


## Security

If you discover any security related issues, please contact us at [security@indigophp.com](mailto:security@indigophp.com).


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/cookie-consent-bundle/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
