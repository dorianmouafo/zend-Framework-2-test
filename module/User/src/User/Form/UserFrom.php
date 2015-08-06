<?php
namespace User\Form;
use Zend\Form\Form;

class UserFrom extends Form{
	      	
	 public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('user');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Name:',
             ),
         ));
         $this->add(array(
             'name' => 'email',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Email:',
             ),
         ));
		 
		 $this->add(array(
             'name' => 'number',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Phone Number:',
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