<?php

namespace Indigo\Bundle\CookieConsentBundle\Twig\Extension;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class CookieConsentExtension extends \Twig_Extension
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Configuration values and options passed to the template.
     *
     * @var array
     */
    private $config = [];

    /**
     * List of label options and trans keys.
     *
     * @var array
     */
    private $labels = [
        'message',
        'dismiss',
        'learnMore',
    ];

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'cookie_consent_render',
                [
                    $this,
                    'renderCookieConsent',
                ],
                [
                    'is_safe' => ['html'],
                    'needs_environment' => true,
                ]
            ),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'cookie_consent';
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * Render cookie consent.
     *
     * @param \Twig_Environment $twigEnvironment
     *
     * @return string
     */
    public function renderCookieConsent(\Twig_Environment $twigEnvironment)
    {
        $config = $this->config;

        if($config['translation']) {
            $config['options'] = $this->translateLabels($config['options']);
        }

        return $twigEnvironment->render(
            'IndigoCookieConsentBundle::cookie_consent.html.twig',
            $config
        );
    }

    /**
     * Translate undefined label options.
     *
     * @param array $options
     *
     * @return array
     */
    private function translateLabels(array $options)
    {
        foreach ($this->labels as $label) {
            $options[$label] = $this->translator->trans($options[$label], [], 'IndigoCookieConsentBundle');
        }

        return $options;
    }
}
