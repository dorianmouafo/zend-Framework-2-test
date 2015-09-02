<?php

namespace Cuser\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


use Zend\Db\TableGateway\AbstractTableGateway;


class Cuser implements  InputFilterAwareInterface{
	
	public $ID_USER; 
	public $USER_IDENTITY_TYPT ;
	public $USER_IDENTIFY_NUMBER ;
	public $USER_NAME;
	public $USER_SURNAME ;
	public $USER_PHONE_NUMBER ;
	public $USER_EMAIL ;
	public $USER_USERNAME ;
	public $USER_PASSWORD ;
	public $USER_TYPE_USER ;
	public $USER_TYPE_AGENCY;
	
	
	public function exchangeArray($data)
    {     	
		 $this->ID_USER=(isset($data['ID_USER'])) ?$data['ID_USER'] :null;
		 $this->USER_IDENTITY_TYPT=(isset($data['USER_IDENTITY_TYPT'])) ?$data['USER_IDENTITY_TYPT'] :null;
		 $this->USER_IDENTIFY_NUMBER=(isset($data['USER_IDENTIFY_NUMBER'])) ?$data['USER_IDENTIFY_NUMBER'] :null;
		 $this->USER_NAME=(isset($data['USER_NAME'])) ?$data['USER_NAME'] :null;
		 $this->USER_SURNAME=(isset($data['USER_SURNAME'])) ?$data['USER_SURNAME'] :null;
		 $this->USER_PHONE_NUMBER=(isset($data['USER_PHONE_NUMBER'])) ?$data['USER_PHONE_NUMBER'] :null;
		 $this->USER_EMAIL=(isset($data['USER_EMAIL'])) ?$data['USER_EMAIL'] :null;
		 $this->USER_USERNAME=(isset($data['USER_USERNAME'])) ?$data['USER_USERNAME'] :null;
		 $this->USER_PASSWORD=(isset($data['USER_PASSWORD'])) ?$data['USER_PASSWORD'] :null;
		 $this->USER_TYPE_USER=(isset($data['USER_TYPE_USER'])) ?$data['USER_TYPE_USER'] :null;
		 $this->USER_TYPE_AGENCY=(isset($data['USER_TYPE_AGENCY'])) ?$data['USER_TYPE_AGENCY'] :null;		
     }

     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }
	 public function getArrayCopy()
	 {
	    return get_object_vars($this);
	 }
	 
	 public function getInputFilter()
     {
		 $this->inputFilter = $inputFilter;
		 return $this->inputFilter;
     }
}

?>