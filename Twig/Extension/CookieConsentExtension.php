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

        $config['options'] = $this->appendLabelTranslations($config['options']);

        return $twigEnvironment->render(
            'IndigoCookieConsentBundle::cookie_consent.html.twig',
            $config
        );
    }

    /**
     * Translate label options.
     *
     * @param array $options
     *
     * @return array
     */
    private function appendLabelTranslations(array $options)
    {
        foreach ($this->labels as $label => $transKey) {
            $options[$label] = $this->translator->trans($transKey, [], 'IndigoCookieConsentBundle');
        }

        return $options;
    }
}
