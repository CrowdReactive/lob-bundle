<?php

namespace CrowdReactive\LobBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root('crowd_reactive_lob', 'array');

        $root
            ->children()
                ->scalarNode('api_key')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->info('Lob.com API key')
                    ->end()
                ->scalarNode('version')
                    ->defaultNull()
                    ->info('Version of the Lob.com API to use (default is latest)')
                    ->end();

        return $treeBuilder;
    }
}
