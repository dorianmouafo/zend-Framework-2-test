<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use Zend\Db\ResultSet\ResultSet;


//Table Gateway
use Zend\Db\TableGateway\TableGateway;


class AlbumController extends AbstractActionController
{
	
	 
	 
     public function indexAction()
     {
     	return new ViewModel();
     }
     public function addAction()
     {
     	return new ViewModel();
     }
     public function editAction()
     {
     	return new ViewModel();
     }
     public function deleteAction()
     {
     	return new ViewModel();
     }
	 
}
?>