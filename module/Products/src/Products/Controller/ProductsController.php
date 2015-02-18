<?php

namespace Products\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Products\Model\ProductTable;
use Products\Form\ProductSearchForm;
//use Products\Form\ProductSearchFilter;
use Products\Form\ProductAddForm;
//use Products\Form\ProductAddFilter;

class ProductsController extends AbstractActionController
{
    /**
     * @var
     */
    private $productTable;
    
    public function __construct(ProductTable $table)
    {
        $this->productTable = $table;
    }
    
    /**
     * @return array|ViewModel
     */
    public function indexAction()
    {
        $products = $this->productTable->findAll();
        
        return new ViewModel(array(
                'products' => $products,
            )
        );
    }

    /**
     * @return array
     */
    public function searchAction()
    {
        $product = '';
        $form = new ProductSearchForm();
        $form->get('submit')->setValue('Search');

        $request = $this->getRequest();
        if ($request->isPost()) {
            
            $product = $this->productTable()->find($this->params()->fromPost('id'));
            
        }

        return array('form' => $form, 'product' => $product);
    }

    /**
     * @return array
     */
    public function restsearchAction()
    {
        $form = new ProductSearchForm();
        $form->get('submit')->setValue('Search');

        return array('form' => $form);
    }

    /**
     * @return array|\Zend\Http\Response
     */
    public function addAction()
    {
        $form = new ProductAddForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $product = new Product();
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $product->exchangeArray($form->getData());
                $this->productTable()->saveProduct('product');
                
                return $this->redirect()->toRoute('product-index');
            }
        }

        return array('form' => $form);
    }
}
