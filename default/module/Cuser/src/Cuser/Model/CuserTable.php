<?php
namespace Cuser\Model;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Db\TableGateway\TableGateway;


class CuserTable{
	
	protected $tablecuser;
	
	public function __construct(TableGateway $tablecuser)
    {
         $this->tablecuser = $tablecuser;
    }
	
	public function fetchAllCuser(){	 	
		$resultSet=$this->tablecuser->select();
		return $resultSet;
	}
	
	public function getCuser($id){
	 	$id=(int) $id;
		$rowset=$this->tablecuser->select(array('id'=>$ID_USER));
		$row=$rowset->current();
		if(!$row){
			throw new \Exception("Could not find the value of +$row");
		}
		return $row;
    }
	
	
	public function saveCuSer(Cuser $cuser){
	 	//mapping with my entity class and the data base
		$data=array(
		       'USER_IDENTITY_TYPT'=>$cuser->USER_IDENTITY_TYPT,
		       'USER_IDENTIFY_NUMBER'=>$cuser->USER_IDENTIFY_NUMBER,
		       'USER_NAME'=>$cuser->USER_NAME,
		       'USER_SURNAME'=>$cuser->USER_SURNAME,
		       'USER_PHONE_NUMBER'=>$cuser->USER_PHONE_NUMBER,
		       'USER_EMAIL'=>$cuser->USER_EMAIL,
		       'USER_USERNAME'=>$cuser->USER_USERNAME, 
		       'USER_PASSWORD'=>$cuser->USER_PASSWORD, 
		       'USER_TYPE_USER'=>$cuser->USER_TYPE_USER,
		       'USER_TYPE_AGENCY'=>$cuser->USER_TYPE_AGENCY,
		);
		$ID_USER=(int) $cuser->ID_USER;
		if($ID_USER==0){
			  $this->tablecuser->insert($data);
		}else{
			 if($this->getUser($ID_USER)){
			 	  $this->tablecuser->update($data,array('id'=>$ID_USER));
			 }else{
				  throw new \Exception('User id does not exist');
			 }
		}
	}
	 
	 
	public function deletCuSer($ID_USER){
	 	$this->tablecuser->delete(array('id'=>(int) $ID_USER));
	}
}


?>
