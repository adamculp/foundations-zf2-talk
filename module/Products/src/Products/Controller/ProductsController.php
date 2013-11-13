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
use Products\Form\ProductSearchForm;
use Products\Form\ProductSearchFilter;
use Products\Form\ProductAddForm;
use Products\Form\ProductAddFilter;

class ProductsController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }
    
    public function searchAction()
    {
        $form = new ProductSearchForm();
        $form->setAttribute('action', $this->url()->fromRoute('product-rest'));
        $form->get('submit')->setValue('Search');

        return array('form' => $form);
    }
    
    public function addAction()
    {
        $form = new ProductAddForm();
        $form->setAttribute('action', $this->url()->fromRoute('product-rest'));
        $form->get('submit')->setValue('Add');

        return array('form' => $form);
    }
}
