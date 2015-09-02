<?php 
namespace Cuser;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;


use Cuser\Model\Cuser;
use Cuser\Model\CuserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;



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
			       'Cuser\Model\CuserTable'=>function($sm){
			       	$tablecuser=$sm->get('CuserTableGateway');
					$table=new CuserTable($tablecuser);
					return $table;
			       },
			 'CuserTableGateway'=> function($sm){
			       	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Cuser());
					return new TableGateway('user',$dbAdapter,null,$resultSetPrototype);
			 },
		   ),
		);
	}
}
?>