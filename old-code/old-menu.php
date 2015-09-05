
	<div  class="wrapper-menu text-center">
			 <div class="navMenu-menu">
			 	   <ul> 
			 	   	          <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'signin'));?>"><?php echo $this->translate('Sign in') ?> </a></li>
			 	   	          <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'signup'));?>"><?php echo $this->translate('Sign up') ?></a></li>
							  <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'forgetpassword'));?>"><?php echo $this->translate('Forget my password') ?></a></li>
							  <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'changepaswword'));?>"><?php echo $this->translate('Change my password') ?></a></li>
							  <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'forgetusername'));?>"><?php echo $this->translate('Forget my account') ?></a></li>
							  <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'update'));?>"><?php echo $this->translate('Update my information') ?></a></li>
			    	   
			    	   
			    	   <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'mydata'));?>"><?php echo $this->translate('My booking space') ?></a>
			    	   	      <ul>
							      <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'list'));?>"><?php echo $this->translate('List of Users') ?></a></li>
							      <li><a href="<?php echo $this->url('cuser',array('controller'=>'cuser','action'=>'adding'));?>"><?php echo $this->translate('Adding Users') ?></a></li>
			    	    	  </ul>  
			    	   </li>  
			    	   
		      </ul>  
		           
			 </div>  
	</div> 
   