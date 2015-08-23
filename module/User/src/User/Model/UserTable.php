<?php
namespace User\Model;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Db\TableGateway\TableGateway;

Class UserTable{
	
	
	protected $tableuser;
	
    public function __construct(TableGateway $tableuser)
    {
         $this->tableuser = $tableuser;
    }
	 
	 //retrieSve all user
	 public function fetchAll(){
	 	
		$resultSet=$this->tableuser->select();
		return $resultSet;
	 }
	 
	 //retrieve a specifique user
	 
	 public function getUser($id){
	 	$id=(int) $id;
		$rowset=$this->tableuser->select(array('id'=>$id));
		$row=$rowset->current();
		if(!$row){
			throw new \Exception("Could not find the value of "+$row);
		}
		return $row;
	 }
	 public function saveUSer(User $user){
	 	//mapping with my entity class and the data base
		$data=array(
		       'name'=>$user->name,
		       'email'=>$user->email,
		       'number'=>$user->number,
		);
		$id=(int) $user->id;
		if($id==0){
			  $this->tableuser->insert($data);
		}else{
			 if($this->getUser($id)){
			 	  $this->tableuser->update($data,array('id'=>$id));
			 }else{
				  throw new \Exception('Album id does not exist');
			 }
		}
	 }
	 public function deletUSer($id){
	 	$this->tableuser->delete(array('id'=>(int) $id));
	 }
}

?>