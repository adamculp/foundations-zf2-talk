<?php
namespace Products\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    protected $tableGateway;

    public function __construct(Adapter $adapter)
    {
        $this->tableGateway = new TableGateway('products', $adapter);
    }
    
    public function find($id)
    {
        $resultSet = $this->tableGateway->select(array('id' => $id));

        return $resultSet->toArray();
    }

    public function findAll()
    {
        $resultSet = $this->tableGateway->select();
        
        return $resultSet->toArray();
    }
}
