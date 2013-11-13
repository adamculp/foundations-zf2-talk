<?php
namespace Products\Form;

use Zend\Form\Form;

class ProductSearchForm extends Form
{
    public function __construct($name = 'product')
    {
        parent::__construct($name);
        $this->setAttribute('method', 'get');

        // ID
        $this->add(array(
                'name' => 'id',
                'attributes' => array(
                    'type'  => 'text',
                    'maxlength' => '12',
                ),
                'options' => array(
                    'label' => 'Product ID: ',
                ),
            ));
        $this->add(array(
                'name' => 'submit',
                'attributes' => array(
                    'type'  => 'submit',
                    'value' => 'Go',
                    'id' => 'submitbutton',
                    'class' => 'btn btn-default',
                ),
            ));
    }
}
