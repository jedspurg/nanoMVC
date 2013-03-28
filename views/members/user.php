<?php 
include('views/elements/header.php');
extract($user);
?>

<div class="container">
	<div class="page-header">
		<h1><?php echo $first_name;?> <?php echo $last_name;?></h1>
  </div>
	<?php echo $email;?>
</div>

<?php include('views/elements/footer.php');?>