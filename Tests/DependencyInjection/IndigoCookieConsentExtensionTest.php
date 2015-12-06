<?php

namespace Tests\Indigo\Bundle\CookieConsentBundle\DependencyInjection;

use Indigo\Bundle\CookieConsentBundle\DependencyInjection\IndigoCookieConsentExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

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
    public function it_has_options_as_parameters()
    {
        $this->load();

        $this->assertContainerBuilderHasParameter('indigo_cookie_consent.options');
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
    }
}
