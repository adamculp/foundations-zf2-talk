<?php
namespace Products\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        return new ProductTable(
            $services->get('Zend\Db\Adapter\Adapter')
        );
    }
}
