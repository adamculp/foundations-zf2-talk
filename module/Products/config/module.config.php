<?php

return array(
    'router' => array(
        'routes' => array(
            'product-index' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/products',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller'    => 'Products\Controller\Products',
                        'action'        => 'index',
                    ),
                ),
            ),
            'product-search' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/product/search',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller'    => 'Products\Controller\Products',
                        'action'        => 'search',
                    ),
                ),
            ),
            'product-rest-search' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/product/rest-search',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller'    => 'Products\Controller\Products',
                        'action'        => 'restsearch',
                    ),
                ),
            ),
            'product-add' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/product/add',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller'    => 'Products\Controller\Products',
                        'action'        => 'add',
                    ),
                ),
            ),
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Products',
                'route' => 'product-index',
            ),
            array(
                'label' => 'Product Search',
                'route' => 'product-search',
            ),
            array(
                'label' => 'Product Add',
                'route' => 'product-add',
            ),
            array(
                'label' => 'Product REST Search',
                'route' => 'product-rest-search',
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Products\Controller\Products' => 'Products\Factory\ProductFactory',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Products\Model\ProductTable' => 'Products\Model\ProductTableFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Products' => __DIR__ . '/../view',
        ),
    ),
);
