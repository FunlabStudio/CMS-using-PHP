<form action="" method="post">

<div class="form-group">
<label for="cat_title"> Edit Category </label>
<?php


if(isset($_GET['edit']))
{
$cat_id= $_GET['edit'];
$query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
$Select_categories_id = mysqli_query($Connection,$query);

while ($row = mysqli_fetch_assoc($Select_categories_id))
{
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
?>
<input type="text" value=" <?php  if(isset($cat_title)){ echo $cat_title; }  ?>" val class="form-control" name="cat_title">    

<?php }} ?>

<?php               // Update Querry


if(isset($_POST['update_category']))
{
$the_cat_title = $_POST['cat_title'];
$query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}"; 
$update_query = mysqli_query($Connection,$query);
header("Location: categories.php"); 

if (!$update_query){

die("QUERRY FAILED". mysqli_error($Connection));
}
}

?>



</div>

<div class="form-group">
<input type="Submit" class="btn btn-primary" name="update_category" value="Update Category">
</div>

</form>
