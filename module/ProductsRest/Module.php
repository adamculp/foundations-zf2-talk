<?php

namespace ProductsRest;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Products\Model\ProductTable;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Products\Model\ProductTable' => function($sm) {
                        $db = $sm->get('Zend\Db\Adapter\Adapter');
                        $product = new ProductTable($db);
                        return $product;
                    },
            ),
        );
    }
}
