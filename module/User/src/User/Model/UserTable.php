<?php
namespace User\Model;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Db\TableGateway\TableGateway;

Class UserTable{
	
	
	 private $usersTAble;
	 
	 /*public function __construct()
     {
         $this->usersTAble = $usersTAble;
     }
	 */
	 //1-with row data Gateway right from the box with zend\db
	 public function  getUserTable(){
	 	 /*$resultSet = $this->usersTAble->select();
         return $resultSet;
		 
		 */
		 if(!$this->usersTAble){
	 	 	 $this->usersTAble=new TableGateway('users',$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter'));
	 	 }
	 	return $this->usersTAble;
	 }
}

?>