<?php
return array(
	'service_manager' => array(
		'factories' => array(
			'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
		),
	),

    'doctrine' => array(
        'driver' => array(
            'playgroundcore_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => __DIR__ . '/../src/PlaygroundCore/Entity'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'PlaygroundCore\Entity'  => 'playgroundcore_entity'
                )
            )
        )
    ),

    'session' => array(
        'remember_me_seconds' => 2419200,
        'use_cookies' => true,
        'cookie_httponly' => true,
    ),

    'assetic_configuration' => array(
        'modules' => array(
            'core_lib' => array(
                # module root path for your css and js files
                'root_path' => array(
                    __DIR__ . '/../view/images',
                ),
                # collection of assets
                'collections' => array(    
                    'flags' => array(
                        'assets' => array(
                            'flag/*.png',
                        ),
                        'options' => array(
                            'move_raw' => true,
                            'output' => 'lib/images',
                        )
                    ),
                ),
            ),
        ),
    ),

    'router' => array(
        'routes' => array(
            'frontend' => array(
                'child_routes' => array(
                    'locale' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'switch/[:locale]/[:context]/[:referer]',
                            'defaults' => array(
                                'controller' => 'PlaygroundCore\Controller\Frontend\SwitchLocale',
                                'action'     => 'switch',
                            ),
                        ),
                    ),
		            'elfinder' => array(
		                'type' => 'Literal',
		                'options' => array(
		                    'route' => 'elfinder',
		                    'defaults' => array(
		                        'controller' => 'elfinder',
		                        'action'     => 'index',
		                    ),
		                ),
		                'may_terminate' => true,
		                'child_routes' => array(
		                    'connector' => array(
		                        'type' => 'Literal',
		                        'options' => array(
		                            'route' => '/connector',
		                            'defaults' => array(
		                                'controller' => 'elfinder',
		                                'action'     => 'connector',
		                            ),
		                        ),
		                    ),
		                    'ckeditor' => array(
		                        'type' => 'Literal',
		                        'options' => array(
		                            'route' => '/ckeditor',
		                            'defaults' => array(
		                                'controller' => 'elfinder',
		                                'action'     => 'ckeditor',
		                            ),
		                        ),
		                    ),
		                ),
		            ),
		            // Give the possibility to call Cron from browser
		            'cron' => array(
		                'type' => 'Literal',
		                'options' => array(
		                    'route' => 'cron',
		                    'defaults' => array(
		                        'controller' => 'playgroundcore_console',
		                        'action' => 'cron'
		                    ),
		                ),
		            ),
        		),
        	),
            'admin' => array(
                'child_routes' => array(
                    'formgen' => array(
                        'type'    => 'Literal',
                        'options' => array(
                                'route'    => '/formgen',
                                'defaults' => array(
                                        'controller'    => 'PlaygroundCore\Controller\Formgen',
                                        'action'        => 'index',
                                ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'create' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/create',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'create',
                                    ),
                                ),
                            ),
                            'view' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/view[/:form]',
                                    'constraints' => array(
                                        'form' => '[a-zA-Z0-9_-]+'
                                    ),
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'view',
                                    ),
                                ),
                            ),
                            'input' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/input',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'input',
                                    ),
                                ),
                            ),
                            'paragraph' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/paragraph',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'paragraph',
                                    ),
                                ),
                            ),
                            'number' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/number',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'number',
                                    ),
                                ),
                            ),
                            'phone' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/phone',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'phone',
                                    ),
                                ),
                            ),
                            'checkbox' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/checkbox',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'checkbox',
                                    ),
                                ),
                            ),
                            'radio' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/radio',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'radio',
                                    ),
                                ),
                            ),
                            'dropdown' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/dropdown',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'dropdown',
                                    ),
                                ),
                            ),
                            'password' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/password',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'password',
                                    ),
                                ),
                            ),
                            'passwordverify' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/passwordverify',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'passwordverify',
                                    ),
                                ),
                            ),
                            'email' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/email',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'email',
                                    ),
                                ),
                            ),
                            'date' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/date',
                                    'defaults' => array(
                                        'controller' => 'Index',
                                        'action'     => 'date',
                                    ),
                                ),
                            ),
                            'upload' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/upload',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'upload',
                                    ),
                                ),
                            ),
                            'creditcard' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/creditcard',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'creditcard',
                                    ),
                                ),
                            ),
                            'url' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/url',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'url',
                                    ),
                                ),
                            ),
                            'hidden' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/hidden',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'hidden',
                                    ),
                                ),
                            ),
                            'test' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/test',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Formgen',
                                        'action'     => 'test',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'website' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/sitecountry',
                            'defaults' => array(
                                'controller' => 'PlaygroundCore\Controller\Admin\WebsiteAdmin',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'list' => array(
                                'type' => 'Segment',
                                'options' => array(
                                     'route' => '/list',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Admin\WebsiteAdmin',
                                        'action'     => 'list',
                                    ),
                                ),
                            ),
                            'edit-active' => array(
                                'type' => 'Segment',
                                'options' => array(
                                     'route' => '/edit-active/[:websiteId]',
                                    'defaults' => array(
                                        'controller' => 'PlaygroundCore\Controller\Admin\WebsiteAdmin',
                                        'action'     => 'editactive',
                                    ),
                                    'constraints' => array(
                                        'websiteId' => '[0-9]*',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'console' => array(
        'router' => array(
            'routes' => array(
                'cron' => array(
                    'options' => array(
                        'route' => 'cron',
                        'defaults' => array(
                            'controller' => 'playgroundcore_console',
                            'action' => 'cron'
                        ),
                    ),
                ),
            )
        )
    ),

    'controllers' => array(
        'invokables' => array(
            'PlaygroundCore\Controller\Formgen'   => 'PlaygroundCore\Controller\FormgenController',
            'playgroundcore_console'              => 'PlaygroundCore\Controller\ConsoleController',
            'elfinder'                       => 'PlaygroundCore\Controller\ElfinderController',
            'PlaygroundCore\Controller\Frontend\SwitchLocale' => 'PlaygroundCore\Controller\Frontend\SwitchLocaleController',
            'PlaygroundCore\Controller\Admin\WebsiteAdmin'    => 'PlaygroundCore\Controller\Admin\WebsiteAdminController',
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'shortenUrl' => 'PlaygroundCore\Controller\Plugin\ShortenUrl',
        ),
    ),
    'translator' => array(
        'locale' => 'fr_FR',
        'translation_file_patterns' => array(
            array(
                'type'         => 'phpArray',
                'base_dir'     => __DIR__ . '/../language',
                'pattern'      => '%s.php',
                'text_domain'  => 'playgroundcore'
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view/admin',
            __DIR__ . '/../view/frontend',
        ),
    ),
);
