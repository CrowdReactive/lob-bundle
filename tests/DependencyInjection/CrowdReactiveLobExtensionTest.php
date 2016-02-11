<?php

namespace CrowdReactive\LobBundle\tests\DependencyInjection;

use CrowdReactive\LobBundle\DependencyInjection\CrowdReactiveLobExtension;
use Lob\Lob;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CrowdReactiveLobExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var ContainerBuilder */
    private $container;

    /** @var CrowdReactiveLobExtension */
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new CrowdReactiveLobExtension();
    }

    public function tearDown()
    {
        unset($this->container, $this->extension);
    }

    public function testWithDefaults()
    {
        $configs = [
            'lob' => [
                'api_key' => 'abc123',
            ],
        ];

        $this->extension->load($configs, $this->container);

        $this->assertInstanceOf(Lob::class, $this->container->get('lob'));

        /** @var Lob $lob */
        $lob = $this->container->get('lob');
        $this->assertEquals('abc123', $lob->getApiKey());
        $this->assertNull($lob->getVersion());
    }

    public function testWithoutApiKey()
    {
        $configs = [
            'lob' => [],
        ];

        $this->setExpectedException(InvalidConfigurationException::class);

        $this->extension->load($configs, $this->container);
    }

    public function testWithVersion()
    {
        $configs = [
            'lob' => [
                'api_key' => 'abc123',
                'version' => '1.6.0',
            ],
        ];

        $this->extension->load($configs, $this->container);

        /** @var Lob $lob */
        $lob = $this->container->get('lob');
        $this->assertEquals('1.6.0', $lob->getVersion());
    }
}
