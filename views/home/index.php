<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
    <h1> Home, sweet home </h1>
  </div>
<hr>
<h2>Channel: <a href="<?php echo $rssInfo->link?>" title="<?php echo $rssInfo->title?>"><?php echo $rssInfo->title?></a></h2>
<p><?php echo $rssInfo->description?></p>
<p><?php echo date('l, F, j g:i a',strtotime($rssInfo->lastBuildDate))?></p>
 
<hr>
<?php

foreach($rssItems as $item){?>

<h3><a href="<?php echo $item->link?>" title="<?php echo $item->title?>"><?php echo $item->title?></a></h3>
<p><?php echo date('l, F, j g:i a',strtotime($item->pubDate))?></p>
<p><?php echo $item->description?></p>
	
<?php }?>
</div>

<?php include('views/elements/footer.php');?>
