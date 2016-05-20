<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
	    <style type="text/css">
	    	*{
	    		font-family: 'Quicksand', sans-serif;
	    		/*background-color: #fff;*/
	    	}
	    	div.messages{
	    		color: red;
	    	}
	    	    /* Set black background color, white text and some padding */
		    footer {
		      background-color: #777;
		      color: white;
		      padding: 15px;
		      position: relative;
		      margin-bottom: -7.5em;
		    }
	    	.error{
	    		color: red;
	    	}
			.mydiv{
			    width: 200px;
			    height: 200px;
			}
	    	.mydiv img{
			    width: 100%;
			    height: 100%;
	    	}
	    </style>
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
    	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      	</button>
		      	<a class="navbar-brand" href="/">Test App </a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
<?php   if ($_SERVER['REQUEST_URI'] == "/")
		{
?>				<li><a href="/">Home</a></li>
<?php   }
		else
		{
			if($this->session->userdata('loggin') == TRUE)
			{ 
?>
		        <li <?php if ($_SERVER['REQUEST_URI'] == "/dashboards/message/".$this->session->userdata('user_id')) echo 'class="active"'?> ><a href="/dashboards/message/<?=$this->session->userdata('user_id')?>" >Dashboard</a></li>		        		        
		        <li <?php if ($_SERVER['REQUEST_URI'] == "/dashboards") echo 'class="active"'?> ><a href="/dashboards">Users</a></li>
<?php	    }
  		}
?>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
<?php 
		if($this->session->userdata('loggin') != TRUE)
		{ 
?>	            
				<li><a href="/users/signin">Sign In</a></li>
	            <li><a href="/users/register">Register</a></li>
<?php   
		}
		else
		{
?>				
				<li <?php if ($_SERVER['REQUEST_URI'] == "/users/edit/my") echo 'class="active"'?> ><a href="/users/edit/my">My Profile</a></li>
				<li><a href="/users/signoff">Log Off</a></li>
<?php	}
?>		   
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>