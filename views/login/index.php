<?php include('views/elements/header.php');

if($_SESSION['error']){
	
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}?>
<div class="container">
	<div class="page-header">
   <h1>Login</h1>
  </div>
   <?php if($error){?>
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $error?>
       
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>login/<?php echo $task?>" method="post" >

          
          <label>Email</label>
          <input type="email" class="span6" name="user_email">
          
          <label>Password</label>
          <input type="password" class="span6" name="user_password">

          <div class="clearfix"></div>
          <button id="submit" type="submit" class="btn btn-primary" >Login</button> or <a href="<?php echo BASE_URL.'register'?>" class="btn">Register</a>
        </form>

        
      </div>
    </div>
    
    
</div>
<?php include('views/elements/footer.php');?>

