<?php
namespace Cuser;



/**
 * 
 * load libraries for Module  the ModuleManager
 */

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;



class  Module implements AutoloaderProviderInterface, ConfigProviderInterface{
    /*
	 * 
	 * The module manager will call the two functions getConfig() and getAutoloaderConfig () for US
	 */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
	public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
		
	
}

?>