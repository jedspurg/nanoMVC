<div class="container">
	<div class="page-header">
		<h1><?php echo $title;?></h1>
  </div>
	<?php foreach($users as $user){?>
  <h3><a href="<?php echo BASE_URL?>/members/user/<?php echo $user['id'];?>" title="<?php echo $first_name;?> <?php echo $last_name;?>"><?php echo $user['first_name'];?> <?php echo $user['last_name'];?></a></h3>
	<p><?php echo $user['email'];?></p>
	<?php }?>
</div>