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
     * Default render related configuration.
     *
     * @var array
     */
    private $defaultConfig = [
        'script' => '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js',
    ];

    /**
     * List of label options and trans keys.
     *
     * @var array
     */
    private $labelTransKeys = [
        'message'   => 'message',
        'dismiss'   => 'dismiss',
        'learnMore' => 'learn_more',
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
     * Render cookie consent.
     *
     * @param \Twig_Environment $twigEnvironment
     * @param array             $options
     * @param array             $config
     *
     * @return string
     */
    public function renderCookieConsent(\Twig_Environment $twigEnvironment, array $options = [], array $config = [])
    {
        $config = array_merge($this->defaultConfig, $config);

        $config['options'] = $this->translateMissingLabelOptions($options);

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
    private function translateMissingLabelOptions(array $options)
    {
        foreach ($this->labelTransKeys as $label => $transKey) {
            if (empty($options[$label])) {
                $options[$label] = $this->translator->trans($transKey, [], 'IndigoCookieConsentBundle');
            }
        }

        return $options;
    }
}
