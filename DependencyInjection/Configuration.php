<?php
namespace VPX\SeoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Vitalii Piskovyi <vitalii.piskovyi@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('vpx_seo');

        $rootNode->children()
            ->scalarNode('default_title')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('additional_title')->defaultValue(null)->cannotBeEmpty()->end()
            ->scalarNode('delimiter')->defaultValue('|')->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
