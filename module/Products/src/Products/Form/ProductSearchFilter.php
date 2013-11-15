<?php

namespace Products\Form;

use Zend\InputFilter\InputFilter;
//use Zend\InputFilter\Input;
use Zend\Validator;

class ProductSearchFilter extends InputFilter
{
    /**
     * 
     */
    public function __construct()
    {
        // ID
        $this->add(
            array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 10,
                            'max' => 12,
                        ),
                    ),
                ),
            )
        );
    }
}