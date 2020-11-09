<?php

if (isset($_POST['create_post']))
{

	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];
	$post_content = $_POST['post_content'];

	$post_image = $_FILES['image'] ['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];


	$post_tags = $_POST['post_tags'];
	$post_date = date ('d-m-y');
	$post_comment_count = 4;

	move_uploaded_file($post_image_temp, "../images/$post_image");


$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_tags, post_comment_count, post_content, post_status)";

$query .= "VALUES ('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}', 
'{$post_tags}','{$post_comment_count}','{$post_content}','{$post_status}')";

$creat_post_query = mysqli_query($Connection, $query);

confirm($creat_post_query);

}


?>


<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="post_category_id">Post Category ID</label>
		<input type="text" class="form-control" name="post_category_id">
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="20" rows="5">
		</textarea>
	</div>

	<div class="form-group" >
		<label for="image">Post Image</label> 
		<input type="file"  name="image" >
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>	

</form>

<div>
	
	<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=tf_til&ad_type=product_link&tracking_id=arf01e-20&marketplace=amazon&region=US&placement=B0018OKNWM&asins=B0018OKNWM&linkId=2ddf125290a268f19861591fd4849219&show_border=false&link_opens_in_new_window=false&price_color=333333&title_color=0066C0&bg_color=FFFFFF">
    </iframe>
</div>