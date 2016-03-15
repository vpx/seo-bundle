<?php
namespace VPX\SeoBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Vitalii Piskovyi <vitalii.piskovyi@gmail.com>
 */
class VPXSeoExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $configs       = $this->processConfiguration($configuration, $config);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('vpx_seo.default_title', $configs['default_title']);
        $container->setParameter('vpx_seo.additional_title', $configs['additional_title']);
        $container->setParameter('vpx_seo.delimiter', $configs['delimiter']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'vpx_seo';
    }
}
