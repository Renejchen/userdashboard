<?php
  $this->load->view('partials/header.php');
?>
		<div class="row">
			<div class="panel">
			  	<div class="panel-body col-md-offset-1 col-md-8">
	<?php   if($edit_user === true)
			{ 
	?>			<h2>::: Edit User #<?=$user['id']?> :::</h2>
	<?php   }
			else
			{ 
	?>			<h2>:::  MY PROFILE  :::</h2>
	<?php 	} 
			if($this->session->flashdata('messages')){
				echo '<div class = "messages">'.$this->session->flashdata('messages').'</div>';
			}
	?>
			  	</div>
				<div class="col-md-2 text-center">
				    <a class="btn btn-primary" href="/dashboards">Return to Dashboard</a>
				</div>	
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="container-fluid">
					<div class="col-md-3 col-md-offset-1">
						<form method="post" action="/users/do_upload" enctype="multipart/form-data" />
							<fieldset>
								<legend><b>Edit Picture:</b></legend>
						        <div class="col-md-12  text-center">
						          	<img src="<?=$user['img']?>" class="img-rounded" height="180" width="180" alt="Avatar">
									<br>
<?php   if($edit_profile === true)
	    { ?>	
							        <div class="form-group">
										<input type="hidden" name="user_id" value="<?=$user['id']?>">
									</div>
									<div class="form-group">
										<input type="file" name="userfile" size="20" />
									</div>
							 		<div class="form-group">
										<button type="submit" class="btn btn-success">Upload</button>
							 		</div>
<?php   }?>
						        </div>
							</fieldset>
						</form>
			
					</div>
					<div class="col-md-3">
						<form action="/users/update_profile" method="post">
							<fieldset>
								<legend><b>Edit information:</b></legend>
								<div class="form-group">
								  <label for="email">Email Address:</label>
								  <input type="email" class="form-control" name="email" value="<?=$user['email']?> " id="email">
								</div>
								<div class="form-group">
								  <label for="firstname">First Name:</label>
								  <input type="text" class="form-control" name="firstname" id="firstname" value="<?=$user['first_name']?>">
								</div>							
								<div class="form-group">
								  <label for="lastname">Last Name:</label>
								  <input type="text" class="form-control" name="lastname" id="lastname" value="<?=$user['last_name']?>">
								</div>
<?php   if($edit_user === true)
		{ ?>					<div class="form-group">
								    <label for="userlevel">User Level:</label>
								    <select class="form-control" id="userlevel" name="user_level" value>
									    <option <?php if ($user['user_level'] == 'normal') echo "selected" ?>>normal</option>
									    <option <?php if ($user['user_level'] == 'admin') echo "selected" ?>>admin</option>
									</select>
								</div>
								<input type="hidden" name="edit_user" value="edit">
								<input type="hidden" name="user_id" value="<?=$user['id']?>"></input>	
<?php   } ?> 						
						 		<div class="form-group pull-right">
									<button type="submit" class="btn btn-success">Save</button>
						 		</div>
							</fieldset>		
						</form>
					</div>
					<div class="col-md-3">
						<form action="/users/update_profile" method="post">
							<fieldset>
								<legend><b>Change Password:</b></legend>
								<div class="form-group">
								  <label for="pwd">Password:</label>
								  <input type="password" class="form-control" name="password" id="pwd">
								</div>			
								<div class="form-group">
								  <label for="pwd_conf">Password Confirmation:</label>
								  <input type="password" class="form-control" name="password_confirmation" id="pwd_conf">
								</div>	
<?php   if($edit_user === true)
{ ?>							
								<input type="hidden" name="edit_user" value="edit">
								<input type="hidden" name="user_id" value="<?=$user['id']?>"></input>
<?php   } ?> 	
						 		<div class="form-group pull-right">
									<button type="submit" class="btn btn-success">Save</button>
						 		</div>
							</fieldset>
						</form>
					</div>	

				</div>		
			</div>	
			<br>
<?php   if($edit_profile === true)
		{ ?>					
			<div class="row">
				<div class="col-md-9 col-md-offset-1">					
					<div class="container-fluid">			
						<form action="/users/update_profile" method="post">
						  <fieldset>
						    <legend><b>Edit Description:</b></legend>
							<div class="form-group">
							  <textarea type="text" class="form-control" rows="3" name="description" placeholder=""><?=$user['description']?></textarea>
							</div>	
					 		<div class="form-group pull-right">
								<button type="submit" class="btn btn-success">Save</button>
					 		</div>
						  </fieldset>
						</form>
					</div>		
				</div>
			</div>
<?php   } ?> 		
		</div>
		<br><br>
<?php
  $this->load->view('partials/footer.php');
?>
    </body>
</html>
