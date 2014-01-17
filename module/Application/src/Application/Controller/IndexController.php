<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * @return array|ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function fooAction()
    {
        return new ViewModel();
    }
}
