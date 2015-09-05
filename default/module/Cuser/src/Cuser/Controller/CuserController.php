<?php
namespace Cuser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\ResultSet\ResultSet;

use Cuser\Model\Cuser;
use Cuser\Model\CuserTable;
use Cuser\Form\CuserForm;


//Table Gateway
use Zend\Db\TableGateway\TableGateway;


class CuserController extends AbstractActionController
{
	private $CuserTAble;
	
	
    public function indexAction(){
		return new ViewModel(array('rowset'=>$this->getCuserTable()->fetchAllCuser(),
		));
	}
	
	public function signupAction(){
		$request = $this->getRequest();
		$cuse= new Cuser();
		
		if($request->isPost()){
			$data=array(
		       'USER_IDENTITY_TYPT'=>$this->getRequest()->getPost('USER_IDENTITY_TYPT'),
		       'USER_IDENTIFY_NUMBER'=>$this->getRequest()->getPost('USER_IDENTIFY_NUMBER'),
		       'USER_NAME'=>$this->getRequest()->getPost('USER_NAME'),
		       'USER_SURNAME'=>$this->getRequest()->getPost('USER_SURNAME'),
		       'USER_PHONE_NUMBER'=>$this->getRequest()->getPost('USER_PHONE_NUMBER'),
		       'USER_EMAIL'=>$this->getRequest()->getPost('USER_EMAIL'),
		       'USER_USERNAME'=> md5($this->getRequest()->getPost('USER_USERNAME')) , 
		       'USER_PASSWORD'=>$this->getRequest()->getPost('USER_PASSWORD'), 
		       'USER_TYPE_USER'=>$this->getRequest()->getPost('USER_TYPE_USER'),
		       
		);
		
		$cuse->exchangeArray($data);
		$this->getCuserTable()->saveCuSer($cuse);
		    // return $this->redirect()->toRoute('list');
		}else{
		   return new ViewModel();
		}
	}
	
	
	
	public function signinAction(){
		$request = $this->getRequest();
		if($request->isPost()){
			echo $this->getRequest()->getPost('user_name');
			echo $this->getRequest()->getPost('user_password');
			echo $this->getRequest()->getPost('phone_number');
			echo $this->getRequest()->getPost('identifynumber');
	  }else{
	  	return new ViewModel();
	  }
	}
	
	
	
	public function updateAction(){
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
	
	public function changepaswwordAction(){
		return new ViewModel();
	}
	
	
	public function listAction(){
		return new ViewModel(array('rowset'=>$this->getCuserTable()->fetchAllCuser(),));
	}
	
	public function deleteAction(){
		return new ViewModel();
	}
	
	public function editAction(){
		
		return new ViewModel();
	}
	
	public function addingAction(){
		$form= new CuserForm();
		$form->get('submit')->setValue('Validate');
		$request = $this->getRequest();
		
		if($request->isPost()){
			$cuser=new Cuser();
			$form->setInputFilter($cuser->getInputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
                 $cuser->exchangeArray($form->getData());
                 $this->getCuserTable()->saveCuSer($cuser);
                 return $this->redirect()->toRoute('list');
             }
		}
		return array('form' => $form);
	}
	
	public function  getCuserTable(){
	 	if(!$this->CuserTAble){
	 	 	$sm=$this->getServiceLocator();
			$this->CuserTAble=$sm->get('Cuser\Model\CuserTable'); 
	 	}
	    return $this->CuserTAble;
	}
	 
}
?>