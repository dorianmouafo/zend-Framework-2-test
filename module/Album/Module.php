<?php 
namespace Album;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
class  Module implements AutoloaderProviderInterface, ConfigProviderInterface{
	
	//find the configurarion of the module
	public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    //strating up the StandardAutoloader use to load the class of my module
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