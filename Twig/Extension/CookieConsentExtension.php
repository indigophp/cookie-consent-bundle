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
     * @var array
     */
    private $options;

    /**
     * Default render related configuration.
     *
     * @var array
     */
    private $defaultConfig = [
        'script' => [
            'enabled' => true,
            'version' => '1.0.10',
        ],
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
    public function __construct(TranslatorInterface $translator, array $options)
    {
        $this->translator = $translator;
        $this->options = $options;
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
     * @param array             $config
     *
     * @return string
     */
    public function renderCookieConsent(\Twig_Environment $twigEnvironment, array $config = [])
    {
        $config = array_merge(['options' => []], $config);

        $config['options'] = array_merge(
            $this->options,
            $config['options']
        );

        $config['options'] = $this->translateMissingLabelOptions($config['options']);

        $config = array_merge($this->defaultConfig, $config);

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
