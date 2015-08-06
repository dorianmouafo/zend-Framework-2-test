<?php


namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Db\ResultSet\ResultSet;


//Table Gateway
use Zend\Db\TableGateway\TableGateway;

use User\Form\User;
use User\Form\UserFrom; 

class UserController extends  AbstractActionController{
	
	 private $usersTAble;
	   ///CRUD
	 
	 public function indexAction(){
	 	//$this->getUserTable()->select();
		return new ViewModel(array('rowset' =>$this->getUserTable()->select()));
	 }
	 
	 public function createAction(){
	 	//intance of new object from UserFrom
	 	$form=new UserFrom();
		$form->get('submit')->setValue('Validate');
		$request = $this->getRequest();
		
		if ($request->isPost()) {
			$user=new User();
			$form->setInputFilter($user->getInputFilter());
			$form->setData($request->getPost());
			
			if ($form->isValid()) {
                 $album->exchangeArray($form->getData());
                 $this->getAlbumTable()->saveAlbum($user);
                 // Redirect to list of u
                 return $this->redirect()->toRoute('user');
             }
		}
		return array('form' => $form);
	 }
	 
	 public function updateAction(){
	 	
		return new ViewModel();
	 }
	 
	 public function deleteAction(){
	 	
		return new  ViewModel();
	 }
	 
	 //1-with row data Gateway right from the box with zend\db
	 public function  getUserTable(){
	 	 if(!$this->usersTAble){
	 	 	 $this->usersTAble=new TableGateway('users',$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter'));
	 	 }
	 	return $this->usersTAble;
	 }
}
?>