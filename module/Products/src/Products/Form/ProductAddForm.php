<?php
namespace Products\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class ProductAddForm extends Form
{
    /**
     * @param string $name
     */
    public function __construct($name = 'product')
    {
        parent::__construct($name);
        $this->setAttribute('method', 'post');

        $this->add(array(
                'name' => 'id',
                'attributes' => array(
                    'type'  => 'text',
                    'maxlength' => '12',
                    'class' => 'form-control',
                ),
                'options' => array(
                    'label' => 'Phone Number: ',
                ),
            ));

        $this->add(array(
                'name' => 'address',
                'attributes' => array(
                    'type'  => 'text',
                    'class' => 'form-control',
                ),
                'options' => array(
                    'label' => 'Address 1: ',
                ),
            ));

        $this->add(array(
                'name' => 'city',
                'attributes' => array(
                    'type'  => 'text',
                    'class' => 'form-control',
                ),
                'options' => array(
                    'label' => 'City: ',
                ),
            ));

        $this->add(array(
                'name' => 'state',
                'attributes' => array(
                    'type'  => 'text',
                    'maxlength' => '2',
                    'size' => '2',
                    'class' => 'form-control',
                ),
                'options' => array(
                    'label' => 'State (2 digit): ',
                ),
            ));

        $this->add(array(
                'name' => 'zip',
                'attributes' => array(
                    'type'  => 'text',
                    'class' => 'form-control',
                ),
                'options' => array(
                    'label' => 'Zip Code: ',
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