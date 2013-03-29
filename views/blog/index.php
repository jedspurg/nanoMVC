<div class="container">
	<div class="page-header">
		<h1><?php echo $title;?></h1>
  </div>
	<?php foreach($posts as $p){?>
    <h3><a href="<?php echo BASE_URL?>/blog/post/<?php echo $p['id'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>
    <?php echo date('F j, Y', strtotime($p['date']))?> 
    <div> 
			<a class="btn post-loader" href="<?php echo BASE_URL?>/ajax/get_post_content/?id=<?php echo $p['id'];?>">View entire post</a>
    </div>
    category: <?php echo Category::getValue($p['categoryID']);?><br/>
	<?php }?>
</div>
