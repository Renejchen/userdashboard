<?php
  $this->load->view('partials/header.php');
?>
	<div class="container">
		<div class="panel">
		  <div class="panel-body"><h2>::: Login :::</h2></div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<form action="/users/signin_user" method="post">
					<div class="form-group">
					  <label for="email">Email Address:</label>
					  <input type="email" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" class="form-control" name="password" id="pwd">
					</div>			
					<div class="checkbox">
					    <label><input type="checkbox"> Remember me</label>
				 	</div>
			 		<div class="form-group">
						<button type="submit" class="btn btn-success pull-right">Sign In</button>
			 		</div>
				</form>
				<br>
				<a href="/users/register"><u>Don't have an account? Register.</u></a>
			</div>		
<?php 
		$errors = $this->session->flashdata('errors');
		if($errors)
		{
?>			<div class="error col-md-6">
				<p><?= $errors[0];?></p>
			</div>
<?php  	}
 ?>
		</div>
	</div>
    <br><br>
<?php
  $this->load->view('partials/footer.php');
?>
    </body>
</html>
