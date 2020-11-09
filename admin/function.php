<?php

function confirm($result)
{
	global $Connection;
	if (!$result)
	 {
		die("QUERRY FAILED." . mysqli_error($Connection));
	}
	return $result;
	
}


function insert_categories ()

{
	global $Connection;
	    if(isset($_POST['submit']))
	{
	$cat_title = $_POST['cat_title'];
	if ($cat_title == "" || empty($cat_title))
	{
	echo "This should not be empty";
	}else
	{
	$query = "INSERT INTO categories(cat_title)";
	$query .="VALUE ('$cat_title')";
	$creaat_category_quuery = mysqli_query ($Connection, $query);
	if (! $creaat_category_quuery) 
	{
	    die('QUERY Failed' .mysqli_error($connection));
	}
	}
	} 
}

function find_all_categories()
{
	global $Connection;
	$query = "SELECT * FROM categories";
	$Select_categories = mysqli_query($Connection,$query);

	while ($row = mysqli_fetch_assoc($Select_categories))
	{
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];

	echo "<tr>";
	echo "<td>{$cat_id}</td>";
	echo "<td>{$cat_title}</td>";
	echo "<td> <a href='categories.php?delete={$cat_id}'> Delete </a> </td> ";
	echo "<td> <a href='categories.php?edit={$cat_id}'> Edit </a> </td> ";
	echo "</tr>";
	}
}

function delete_categories()
{
	global $Connection;
	if(isset($_GET['delete']))
	{
	$the_cat_id = $_GET['delete'];
	$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}"; 
	$delete_query = mysqli_query($Connection,$query);
	header("Location: categories.php"); 
	}
}

?>