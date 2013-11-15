<?php
namespace Products\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    protected $tableGateway;

    /**
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->tableGateway = new TableGateway('products', $adapter);
    }

    /**
     * @param $id
     * @return array
     */
    public function find($id)
    {
        $resultSet = $this->tableGateway->select(array('id' => $id));

        return $resultSet->toArray();
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $resultSet = $this->tableGateway->select();
        
        return $resultSet->toArray();
    }
}
