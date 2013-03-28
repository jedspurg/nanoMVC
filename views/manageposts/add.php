<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1> the Add Post View </h1>
  </div>
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>manageposts/save" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="">
          <label>Date</label>
          <input type="text" class="span2" name="post_date" value="">
          <label>Category</label>
          <select name="category">
          <?php foreach($categories as $cat){?>
          <option value="<?php echo $cat['categoryID']?>"><?php echo $cat['name']?></option>
          <?php }?>
          </select>
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"></textarea>
    			<br/>
          <input type="hidden" name="uID" value="<?php echo $u->getUserID()?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

