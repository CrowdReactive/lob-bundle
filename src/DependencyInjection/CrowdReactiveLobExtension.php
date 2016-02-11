<?php

namespace CrowdReactive\LobBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CrowdReactiveLobExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $lobConfig = $this->processConfiguration($configuration, $configs);

        $container->setParameter('crowd_reactive_lob.api_key', $lobConfig['api_key']);
        $container->setParameter('crowd_reactive_lob.version', $lobConfig['version']);

        $yamlLoader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $yamlLoader->load('services.yml');
    }
}
