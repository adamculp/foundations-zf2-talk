<?php
namespace Products\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Products\Controller\ProductsController;

class ProductFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllers)
    {
        $services = $controllers->getServiceLocator();
        return new ProductsController($services->get('Products/Model/ProductTable'));
    }
}
