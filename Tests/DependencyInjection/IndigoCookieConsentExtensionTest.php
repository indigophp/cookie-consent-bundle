<?php

namespace Tests\Indigo\Bundle\CookieConsentBundle\DependencyInjection;

use Indigo\Bundle\CookieConsentBundle\DependencyInjection\IndigoCookieConsentExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\DependencyInjection\Reference;

class IndigoCookieConsentExtensionTest extends AbstractExtensionTestCase
{
    protected function getContainerExtensions()
    {
        return [
            new IndigoCookieConsentExtension()
        ];
    }

    /**
     * @test
     */
    public function it_has_a_twig_extension()
    {
        $this->load();

        $this->assertContainerBuilderHasService(
            'twig.extension.indigo_cookie_consent',
            'Indigo\\Bundle\\CookieConsentBundle\\Twig\\Extension\\CookieConsentExtension'
        );

        $this->assertContainerBuilderHasServiceDefinitionWithTag(
            'twig.extension.indigo_cookie_consent',
            'twig.extension'
        );

        $this->assertContainerBuilderHasServiceDefinitionWithArgument(
            'twig.extension.indigo_cookie_consent',
            0,
            new Reference('translator')
        );

        $this->assertContainerBuilderHasServiceDefinitionWithMethodCall(
            'twig.extension.indigo_cookie_consent',
            'setConfig',
            [
                [
                    'options' => [
                        'message'   => 'message',
                        'dismiss'   => 'dismiss',
                        'learnMore' => 'learn_more',
                    ],
                    'translation' => true,
                    'script' => '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js',
                ]
            ]
        );
    }
}
