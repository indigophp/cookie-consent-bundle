<?php

namespace Indigo\Bundle\CookieConsentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('indigo_cookie_consent');

        $rootNode
            ->children()
                ->arrayNode('options')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('message')->end()
                        ->scalarNode('dismiss')->end()
                        ->scalarNode('learnMore')->end()
                        ->scalarNode('link')->end()
                        ->scalarNode('container')->end()
                        ->scalarNode('theme')->end()
                        ->scalarNode('path')->end()
                        ->scalarNode('domain')->end()
                        ->integerNode('expiryDays')->end()
                        ->scalarNode('target')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
