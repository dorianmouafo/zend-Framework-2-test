<?php
namespace Cuser\Form;
use Zend\Form\Form;


class CuserForm extends  Form {
	
	 public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('cuser');
         $this->setAttribute('method', 'post');
		 
         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
		 
		 
		  $this->add(array(
             'name' => 'USER_IDENTITY_TYPT',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Identity Type:',
             ),
         ));
		 
		 
		 $this->add(array(
             'name' => 'USER_IDENTIFY_NUMBER',
             'type' => 'Text',
             'options' => array(
                 
             ),
         ));
		 
		 
		 $this->add(array(
             'name' => 'USER_NAME',
             'type' => 'Text',
             'options' => array(
                 'label' => 'User Name:',
             ),
         ));
		 
		 
		 $this->add(array(
             'name' => 'USER_PHONE_NUMBER',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Phone Number:',
             ),
         ));
		 
		 
		 $this->add(array(
             'name' => 'USER_EMAIL',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Email:',
             ),
         ));
		 
		  $this->add(array(
             'name' => 'USER_USERNAME',
             'type' => 'Text',
             'options' => array(
                 'label' => 'UserName:',
             ),
         ));
		 
		 
		 $this->add(array(
             'name' => 'USER_PASSWORD',
             'type' => 'password',
             'options' => array(
                 'label' => 'Password:',
             ),
         ));
		 
		 
		 $this->add(array(
             'name' => 'USER_TYPE_USER',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Name:',
             ),
         ));
		 
		 $this->add(array(
             'name' => 'USER_TYPE_AGENCY',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Name:',
             ),
         ));
		 
		 
		  $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Validate',
                 'id' => 'submitbutton',
             ),
         ));
		 
	 }
}


?>