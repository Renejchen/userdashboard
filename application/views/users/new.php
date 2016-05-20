<?php
  $this->load->view('partials/header.php');
?>
	<div class="container">
		<div class="col-md-offset-10 col-md-2">
		    <a class="btn btn-primary" href="/dashboards">Return to Dashboard</a>
		</div>
		<div class="panel">
		  <div class="panel-body"><h2>::: Add New User :::</h2></div>
		</div>
		<div class="row">
			<div role='form' class="col-md-6">		
				<form action="/users/create_user" method="post">
					<div class="form-group">
					  <label for="email">Email Address:</label>
					  <input type="email" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
					  <label for="firstname">First Name:</label>
					  <input type="text" class="form-control" name="firstname" id="firstname">
					</div>
					<div class="form-group">
					  <label for="lastname">Last Name:</label>
					  <input type="text" class="form-control" name="lastname" id="lastname">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" class="form-control" name="password" id="pwd">
					</div>			
					<div class="form-group">
					  <label for="pwd_conf">Password Confirmation:</label>
					  <input type="password" class="form-control" name="password_confirmation" id="pwd_conf">
					</div>
					<br>
			 		<div class="form-group">
						<button type="submit" class="btn btn-success pull-right">Create</button>
			 		</div>
				</form>
				<br><br>
			</div>
<?php 
		$errors = $this->session->flashdata('errors');
		if($errors)
		{
?>			<div class="error col-md-6">
				<p><?= $errors[0];?></p>
			</div>
<?php   
		}
 ?>
		</div>
	</div>
<?php
  $this->load->view('partials/footer.php');
?>
    </body>
</html>
