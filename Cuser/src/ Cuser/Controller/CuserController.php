<?php
namespace Cuser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use Zend\Db\ResultSet\ResultSet;


//Table Gateway
use Zend\Db\TableGateway\TableGateway;


class CuserController extends AbstractActionController{
	
	
	public function indexAction(){
		return new ViewModel();
	}
	public function updateAction(){
		return new ViewModel();
	}
	public function deleteAction(){
		return new ViewModel();
	}
	public function registerAction(){
		return new ViewModel();
	}
	public function forgetpasswordAction(){
		return new ViewModel();
	}
	public function forgetusernameAction(){
		return new ViewModel();
	}
	
	public function mydataAction(){
		return new ViewModel();
	}
}
?>