<?php
namespace User\Model;


use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


use Zend\Db\TableGateway\AbstractTableGateway;


class User implements InputFilterAwareInterface {
	
	 public $id;
     public $email;
     public $name;
	 public $number;
     protected $inputFilter; 
	
     public function exchangeArray($data)
     {
	     $this->id= (isset($data['id']))     ? $data['id']     : null;
         $this->name = (isset($data['name'])) ? $data['name'] : null;
         $this->email  = (isset($data['email']))  ? $data['email']  : null;
		 $this->number  = (isset($data['number']))  ? $data['number']  : null;
     }

     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();
			 $factory = new InputFactory();
			 
             $inputFilter->add($factory->createInput(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             )));
             $inputFilter->add($factory->createInput(array(
                 'name'     => 'name',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             )));
             $inputFilter->add($factory->createInput(array(
                 'name'     => 'email',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             )));
             $this->inputFilter = $inputFilter;
         }
         return $this->inputFilter;
     }
	public function getArrayCopy()
	{
	    return get_object_vars($this);
	}
// ...
}
?>