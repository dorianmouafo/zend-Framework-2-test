<?php
namespace User;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class  Module{
	
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