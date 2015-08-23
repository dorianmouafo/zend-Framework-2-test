<?php


namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\ResultSet\ResultSet;

use User\Model\User;
use User\Model\UserTable;

//Table Gateway
use Zend\Db\TableGateway\TableGateway;


use User\Form\UserFrom; 

class UserController extends  AbstractActionController{
	
	 private $usersTAble;
	   ///CRUD
	 
	 public function indexAction(){
		return new ViewModel(array('rowset'=>$this->getUserTable()->fetchAll(),
		));
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
                 $user->exchangeArray($form->getData());
                 $this->getUserTable()->saveUSer($user);
                 // Redirect to list of u
                 return $this->redirect()->toRoute('user');
             }
		}
		return array('form' => $form);
	 }
	 
	 public function updateAction(){
	 	$id = (int) $this->params()->fromRoute('id', 0);
		if(!$id){
			return $this->redirect()->toRoute('user', array('action' => 'index'));
		}
			$user=$this->getUserTable()->getUser($id);
			$form = new UserFrom();
			$form->bind($user);
			$form->get('submit')->setAttribute('value', 'Edit Element');
			$request = $this->getRequest();
		if($request->isPost()){
			$form->setInputFilter($user->getInputFilter());
			$form->setData($request->getPost());
			if($form->isValid()){
				$this->getUserTable()->saveUSer($form->getData());
				return $this->redirect()->toRoute('user');
			}
		}
		return array('id' => $id,'form' => $form);
	 }
	 
	 
	 public function deleteAction(){
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
		return $this->redirect()->toRoute('user');
		}
		$request = $this->getRequest();
		
		
		if($request->isPost()){
			$del = $request->getPost('del', 'No');
			if($del=='Yes'){
				$id = (int) $request->getPost('id');
				$this->getUserTable()->deletUSer($id);
			}
			return $this->redirect()->toRoute('user');
		}
		return array(
		  'id'=>$id,
		  'user'=>$this->getUserTable()->getUser($id)
		);
		
	 }
	 
	 //1-with row data Gateway right from the box with zend\db
	 public function  getUserTable(){
	 	 if(!$this->usersTAble){
	 	 	$sm=$this->getServiceLocator();
			$this->usersTAble=$sm->get('User\Model\UserTable'); 
	 	 	 //$this->usersTAble=new TableGateway('users',$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter'));
	 	 }
	 	return $this->usersTAble;
	 }
	 
	 public function registerAction(){
	 	
		return new ViewModel();
	 }
	 
	 
	 public function signinAction(){
	 	return new ViewModel();
	 }
}
?>