<?php 

return array(
     'controllers' => array(
         'invokables' => array(
             'Cuser\Controller\Cuser' => 'Cuser\Controller\CuserController',
         ),
     ),

 
	  // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'cuser' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/cuser[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Cuser\Controller\Cuser',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
     	 
     'view_manager' => array(
         'template_path_stack' => array(
             'cuser' => __DIR__ . '/../view',
         ),
     ),
 );

?>