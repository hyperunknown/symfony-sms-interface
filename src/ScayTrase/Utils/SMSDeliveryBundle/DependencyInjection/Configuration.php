<?php

namespace ScayTrase\Utils\SMSDeliveryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\BooleanNode;
use Symfony\Component\Config\Definition\Builder\BooleanNodeDefinition;
use Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sms_delivery');

        $rootNode
            ->children()
                ->append((new BooleanNodeDefinition('disable_delivery'))->defaultFalse()->info('Disables actual delivery for testing purposes'))
                ->append((new ScalarNodeDefinition('delivery_recipient'))->defaultNull()->info('Recipient for messages for testing purposes'))
            ->end()
            ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
