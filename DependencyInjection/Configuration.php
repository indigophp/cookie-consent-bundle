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
                        ->scalarNode('message')->defaultValue('message')->end()
                        ->scalarNode('dismiss')->defaultValue('dismiss')->end()
                        ->scalarNode('learnMore')->defaultValue('learn_more')->end()
                        ->scalarNode('link')->end()
                        ->scalarNode('container')->end()
                        ->scalarNode('theme')->end()
                        ->scalarNode('path')->end()
                        ->scalarNode('domain')->end()
                        ->integerNode('expiryDays')->end()
                        ->scalarNode('target')->end()
                    ->end()
                ->end()
                ->booleanNode('translation')
                    ->treatNullLike(true)
                    ->defaultTrue()
                ->end()
                ->scalarNode('script')
                    ->defaultValue('//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js')
                    ->info('Set this to false to disable script (eg. when you compiled it into yours)')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
