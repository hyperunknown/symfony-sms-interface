<?php

namespace ScayTrase\SmsDeliveryBundle\DependencyInjection;

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

        $disable_delivery = (new BooleanNodeDefinition('disable_delivery'));
        $delivery_recipient = (new ScalarNodeDefinition('delivery_recipient'));
        $sender = (new ScalarNodeDefinition('sender'));

        $rootNode
            ->children()
                ->append($sender->defaultValue('@sms_delivery.dummy_sender')->info('Sender transport service'))
                ->append($disable_delivery->defaultFalse()->info('Disables actual delivery for testing purposes'))
                ->append($delivery_recipient->defaultNull()->info('Recipient for messages for testing purposes'))
            ->end();

        return $treeBuilder;
    }
}