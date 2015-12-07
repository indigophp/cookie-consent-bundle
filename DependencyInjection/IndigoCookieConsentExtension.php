<?php

namespace Indigo\Bundle\CookieConsentBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class IndigoCookieConsentExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $twigExtension = new Definition('Indigo\Bundle\CookieConsentBundle\Twig\Extension\CookieConsentExtension');

        $twigExtension
            ->addArgument(new Reference('translator'))
            ->addMethodCall('setConfig', [$config])
        ;

        $twigExtension->addTag('twig.extension');

        $container->setDefinition('twig.extension.indigo_cookie_consent', $twigExtension);
    }
}
