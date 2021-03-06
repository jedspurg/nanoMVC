<div class="container">
	<div class="page-header">
   <h1>Register</h1>
  </div>
  
  <?php if($error){?>
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $error?>
    </div>
  <?php }?>
  
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>/register/process" method="post" >
          <label>First Name</label>
          <input type="text" class="span6" name="first_name" value="">
          
          <label>Last Name</label>
          <input type="text" class="span6" name="last_name" value="">
          
          <label>Email</label>
          <input type="email" class="span6" name="email" value="">
          
          <label>Password</label>
          <input type="password" class="span6" name="password">
          
          <label>Retype Password</label>
          <input type="password" class="span6" name="password_retype">
          <input type="hidden" name="role_id" value="2">
          <div class="clearfix"></div>
          <button id="submit" type="submit" class="btn btn-primary" >Register</button>
        </form>
      </div>
    </div>
</div>