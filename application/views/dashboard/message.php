<?php
  $this->load->view('partials/header.php');
?>
<div class="container-fluid">
  <div class="row">
    <div class="container">
      <div class="jumbotron">
        <div class="col-md-3 text-center">
          <div class="mydiv">
            <img src="<?=$user['img']?>" class="img-thumbnail" alt="Avatar">
          </div>
        </div>
        <div class="col-md-9">
          <h1><?=strtoupper($user['first_name']." ".$user['last_name'])?></h1>
          <span>Joined at <?=$user['created_at']?></span><br>
          <span>User ID: #<?=$user['id']?></span><br>
          <span>Email Address: <?=strtolower($user['email'])?></span><br>
          <span>Description: <?=$user['description']?></span>
        </div> 
      </dir><!-- /.row -->
    </div><!-- /.jumbotron -->
  </div><!-- /.row -->
  <br><br>
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <h4>Leave a message for <?=$user['first_name']?>:</h4>
      <form role="form" action="/dashboards/create_message" method="post">
        <div class="form-group">
            <input hidden name="user_id" value="<?=$user['id']?>">
            <textarea class="form-control" name="message" rows="3" required placeholder="write a message.."></textarea>
        </div>
          <button type="submit" class="btn btn-success pull-right">Post</button>
      </form>
      <br>   
    </div><!-- /.container -->
  </div><!-- /.row -->
  <div class="container">
    <h2><span class="badge"><?=count($messages)?></span> <small>Messages:</small></p></h2>
    <hr>
<?php 

  foreach($messages as $message){
?>
    <div class="row">
      <div class="col-md-2 text-center">
        <img src="<?=$message['img']?>" class="img-circle" height="65" width="65" alt="Avatar">
      </div><!-- /.class="col-md-2 -->
      <div class="col-md-10">
        <h4><?=$message['message_by_fullname']?> <small><span class="glyphicon glyphicon-time"></span> posted by <?=$message['created_at']?>.</small></h4> 
        <br>
        <p><?=$message['message']?></p>
        <hr>
        <p><span class="badge"><?=count($comments[$message['message_id']]);?></span> Comments:</p><br>

        <div class="row">
<?php foreach($comments[$message['message_id']] as $comment){
?>
          <div class="col-md-12">
            <div class="col-md-2 text-center">
              <img src="<?=$comment['img']?>" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-md-8">
              <h4><?=$comment['comment_by_fullname']?> <small><span class="glyphicon glyphicon-time"></span> <?=$comment['created_at']?>.</small></h4> 
              <p><?=$comment['comment']?></p>
              <br>
            </div>
          </div>
          <br>
<?php  } ?>
          <div class="col-md-offset-2 col-md-8">
            <form role="form" action="/dashboards/create_comment" method="post">
              <div class="form-group">
                  <input hidden name="message_id" value="<?=$message['message_id']?>">
                  <input hidden name="user_id" value="<?=$message['user_id']?>">
                  <textarea class="form-control" rows="3" name="comment" required placeholder="Write a comment.."></textarea>
              </div>
                <button type="submit" class="btn btn-success pull-right">Post</button>
            </form>
          </div>
        </div><!-- /.row -->
      </div><!-- /.class="col-md-10 -->
    </div><!-- /.row -->
<?php    
  }
?>
  </div><!-- /.container -->
</div><!-- /.container -->
<br><br><br><br>
<?php
  $this->load->view('partials/footer.php');
?>
</body>
</html>

