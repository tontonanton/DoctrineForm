<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'dev_entities'=>array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    =>'/entities',
                    'defaults' => array(
                        'controller' => 'DoctrineForm\Controller\Index',
                        'action'     => 'entities',
                    ),
                ),          
            ),
            'dev_metadata'=>array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    =>'/metadata[/:entity]',
                    'defaults' => array(
                        'controller' => 'DoctrineForm\Controller\Index',
                        'action'     => 'metadata',
                        'entity'    => 'produit'
                    ),
                ),
            ),
            'dev_form'=>array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    =>'/form[/:entity]',
                    'defaults' => array(
                        'controller' => 'DoctrineForm\Controller\Index',
                        'action'     => 'form',
                        'entity'    =>  'produit'
                    ),
                ),            
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
	'controllers'=>array(
            'invokables'=>array(
                'DoctrineForm\Controller\Index'=>'DoctrineForm\Controller\IndexController',
            )
	),
    'view_manager' => array(
        'template_map' => array(
            'doctrineform/index/index' => __DIR__ . '/../view/index/index.phtml',
        ),	
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
	'doctrine'=>array(
		'driver'=>array(
			'doctrineform_driver'=>array(
				'class'=>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache'=>'array',
				'paths'=>array(
					__DIR__ . '/../src/DoctrineForm/Entity'
				)
			),
			'orm_default'=>array(
				'drivers'=>array(
					'DoctrineForm\Entity' => 'doctrineform_driver'
				)
			)
		),
	),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
