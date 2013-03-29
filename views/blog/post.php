<?php extract($post);?>
<div class="container">
	<div class="page-header">
		<h1><?php echo $title;?></h1>
  </div>
	<?php echo $content;?>
  <br/>
  category: <?php echo Category::getCategoryValue($categoryID);?>
  <br/>
  <?php echo date('F j, Y', strtotime($date))?>
</div>
