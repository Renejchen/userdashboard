<?php
  $this->load->view('partials/header.php');
?>
	<div class="container">
		<div class="jumbotron">
		  <h1>Welcome to Message Board!</h1>
		  <p>"This will be my first build application using a MVC framework!"</p>
<?php 
		if($this->session->userdata('loggin') != TRUE)
		{ 
?>			<p><a class="btn btn-primary btn-lg" href="/users/signin" >Learn more</a></p>
<?php   }
		else
		{
?>			<p><a class="btn btn-primary btn-lg" href="/dashboards/message/<?=$this->session->userdata('user_id')?>" >Let's start</a></p>	
<?php	}
?>	    
		</div>
		<div class="row">
		  <div class="col-sm-4 col-md-4">
		    <div class="thumbnail">
		      <div class="caption">
		        <h3>Manage User</h3>
		        <p>She wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk not down. For request general express unknown are. He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it. </p>
		      </div>
		    </div>
		  </div>		  
		  <div class="col-sm-4 col-md-4">
		    <div class="thumbnail">
		      <div class="caption">
		        <h3>Leave Message</h3>
		        <p>Far curiosity incommode now led smallness allowance. Favour bed assure son things yet. She consisted consulted elsewhere happiness disposing household any old the. Widow downs you new shade drift hopes small. So otherwise commanded sweetness we improving. Instantly by daughters resembled unwilling principle so middleton. Fail most room even gone her end like. Comparison dissimilar unpleasant six compliment two unpleasing any add. Ashamed my company thought wishing colonel it prevent he in. Pretended residence are something far engrossed old off. </p>
		      </div>
		    </div>
		  </div>		  
		  <div class="col-sm-4 col-md-4">
		    <div class="thumbnail">
		      <div class="caption">
		        <h3>Edit User Information</h3>
		        <p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<br><br>
<?php
  $this->load->view('partials/footer.php');
?>
    </body>
</html>
