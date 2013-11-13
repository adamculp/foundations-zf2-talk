<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ProductsRest\Controller\Products' => 'ProductsRest\Controller\ProductsController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'product-rest' => array(
                'type'    => 'Segment',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/product-rest[/:id]',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller'    => 'ProductsRest\Controller\Products',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
    ),
);
