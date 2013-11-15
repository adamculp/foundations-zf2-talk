<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ProductsRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ProductsController extends AbstractRestfulController
{
    protected $productTable;

    /**
     * @return mixed|JsonModel
     */
    public function getList()
    {
        $result = new JsonModel(array(
                'data' => $this->getProductTable()->findAll(),
                'success' => true,
            ));
        
        return $result;
    }

    /**
     * @param mixed $id
     * @return mixed|JsonModel
     */
    public function get($id)
    {
        $result = new JsonModel(array(
                'data' => $this->getProductTable()->find($this->params()->fromQuery('id')),
                'success' => true,
            ));
        
        return $result;
    }

    /**
     * @param mixed $data
     * @return mixed|void
     */
    public function create($data)
    {
        // code
    }

    /**
     * @param mixed $id
     * @param mixed $data
     * @return mixed|void
     */
    public function update($id, $data)
    {
        // code
    }

    /**
     * @return array|object
     */
    public function getProductTable()
    {
        if (!$this->productTable) {
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Products\Model\ProductTable');
        }
        
        return $this->productTable;
    }
}
