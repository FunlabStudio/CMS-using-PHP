<?php
if (isset($_GET['p_id']))

{

$post_id =  $_GET['p_id'];

}



$query = "SELECT * FROM posts WHERE post_id = $post_id " ;
$Select_posts_by_id = mysqli_query($Connection,$query);

while ($row = mysqli_fetch_assoc($Select_posts_by_id))
{
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_tags = $row['post_tags'];
$post_comments = $row['post_comment_count'];
$post_date = $row['post_date'];
$post_content = $row['post_content'];
}

if(isset($_POST['create_post']))
{
	$post_author = $_POST['author'];
	$post_title = $_POST['title'];
	$post_category = $_POST['post_category_id'];
	$post_status = $_POST['post_status'];
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
	$post_comments = $_POST['post_comment_count'];
	$post_date = $_POST['post_date'];
	$post_content = $POST['post_content'];

	move_uploaded_file($post_image_temp , "../images/$post_image");

	if (empty($post_image)) {
		$query= "SELECT * FROM posts WHERE post_id = $post_id ";
		$select_image = mysqli_query ($Connection,$query);

		while ($row = mysqli_fetch_array ($select_image)) {
			
		
		$post_image = $row [ 'post_image'];
	}	
	}

	$update_query = "UPDATE posts SET";
	$update_query .= "post_title = '{$post_title}' ,";
	$update_query .= "post_category_id = '{$post_category}',";
	$update_query .= "post_date = now(),";
	$update_query .= "author = '{$post_author}',";
	$update_query .= "post_status = '{$post_status}',";
	$update_query .= "post_tags = '{$post_tags}',";
	$update_query .= "post_content = '{$post_content}',";
	$update_query .= "post_image = '{$post_image}' ";
	$update_query .= "WHERE post_id = {$post_id}";


	$update_post = mysqli_query ($Connection, $query);
	confirm($update_pos);

}

?>




<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title ?>" type="text" class="form-control" name="title">
	</div>

	
	<div class="form-group">

	<select name= "post_category" id=""> 
	<?php 
	
	$query = "SELECT * FROM categories ";
	$Select_categories = mysqli_query($Connection,$query);
     confirm($Select_categories);	


		while ($row = mysqli_fetch_assoc($Select_categories))
		{
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];

		echo "<option value''>{$cat_title}</option>";

		}

	 ?>


 	</select>


</div>

	<div class="form-group">
		<label for="post_category_id">Post Category ID</label>
		<input value="<?php echo $post_category ?>" type="text" class="form-control" name="post_category_id">
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input value="<?php echo $post_author ?>" type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="20" rows="5">
			<?php echo $post_content ?>
		</textarea>
	</div>

	<div class="form-group" >
		<label for="image">Post Image</label> 
		<input type="file"  name="image" >
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Update Post">
	</div>	

</form>