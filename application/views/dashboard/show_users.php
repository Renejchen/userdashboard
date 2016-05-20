<?php
	  $this->load->view('partials/header.php'); 
 ?>		
 		<div class="row">
			<div class="panel">
			  	<div class="panel-body col-md-offset-1 col-md-8">
			  		<h2>::: Users List :::</h2>
			  	</div>
<?php  
	  if($this->session->userdata('loggin')==TRUE && $this->session->userdata('user_level')=='admin')    
	  {
?>				<div class="col-md-3">
		   			 <a class="btn btn-primary" href="/users/add_new">Add new</a>
		   			 <a class="btn btn-primary" href="/dashboards/message/<?=$this->session->userdata('user_id')?>">Return to Dashboard</a>
				</div>
<?php }
?>	
			</div>		
		</div>

			<div class="container table-responsive">
				<table class="table table-bordered table-striped table-hover">
				    <thead>
				      <tr>
				        <th>Name</th>
				        <th>Email</th>
				        <th>Created_at</th>
				        <th>User_level</th>
<?php  
		if($this->session->userdata('loggin')==TRUE && $this->session->userdata('user_level')=='admin')    
		{
?>						<th>Actions</th>
<?php   }
?>		
				      </tr>
				    </thead>
				    <tbody>
<?php 
		foreach($users as $user){
 ?>				      <tr>
				        <td><b><a href="/dashboards/message/<?=$user['id']?>"><?= strtoupper($user['first_name']." ".$user['last_name']) ?></a></b></td>
				        <td><?=strtolower($user['email'])?></td>
				        <td><?=$user['created_at']?></td>
				        <td><?=$user['user_level']?></td>
<?php  
			if($this->session->userdata('loggin')==TRUE && $this->session->userdata('user_level')=='admin')    
			{
?>					    <td>
				        	<a class="btn btn-info btn-sm" href="/users/edit/<?=$user['id']?>">Edit</a> 
				        	<a class="btn btn-danger btn-sm" onClick="return confirm('are you sure?')" href='/users/destroy/<?=$user['id']?>'>Remove</a>
				        </td>	
<?php  		}
?>	
					   <tr>
<?php   }
?>	
				    </tbody>
				</table>
				
			</div>

	</div>

    </body>
    <br><br>
<?php
  $this->load->view('partials/footer.php');
?>
</html>


