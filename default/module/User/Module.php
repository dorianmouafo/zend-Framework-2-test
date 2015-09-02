<?php
namespace User;

/**
 * 
 * Import for data base link and connection to the model part
 */
use User\Model\User;
use User\Model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;



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
	
	public function getServiceConfig(){
		
		return array(
		     'factories'=>array(
			       'User\Model\UserTable'=>function($sm){
			       	$tableuser=$sm->get('UserTableGateway');
					$table=new UserTable($tableuser);
					return $table;
			       },
			 'UserTableGateway'=> function($sm){
			       	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new User());
					return new TableGateway('users',$dbAdapter,null,$resultSetPrototype);
			 },
		   ),
		);
	}
}
?>