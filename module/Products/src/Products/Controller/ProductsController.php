<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Products\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Products\Form\ProductSearchForm;
use Products\Form\ProductSearchFilter;
use Products\Form\ProductAddForm;
use Products\Form\ProductAddFilter;
use Products\Model\Product;

class ProductsController extends AbstractActionController
{
    protected $productTable;
    
    public function indexAction()
    {
        $products = $this->getProductTable()->findAll();
        
        return new ViewModel(array(
                'products' => $products,
            )
        );
    }
    
    public function searchAction()
    {
        $product = '';
        $form = new ProductSearchForm();
//        $form->setAttribute('action', $this->url()->fromRoute('product-rest'));
        $form->get('submit')->setValue('Search');

        $request = $this->getRequest();
        if ($request->isPost()) {
            
            $product = $this->getProductTable()->find($this->params()->fromPost('id'));
            
        }

        return array('form' => $form, 'product' => $product);
    }
    
    public function addAction()
    {
        $form = new ProductAddForm();
//        $form->setAttribute('action', $this->url()->fromRoute('product-rest'));
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $product = new Product();
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $product->exchangeArray($form->getData());
                $this->getProductTable()->saveProduct('product');
                
                return $this->redirect()->toRoute('product-index');
            }
        }

        return array('form' => $form);
    }
    
    public function getProductTable()
    {
        if (!$this->productTable) {
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('ProductTable');
        }
        
        return $this->productTable;
    }
}
