<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>

</thead>
<tbody>
<?php
$query = "SELECT * FROM posts";
$Select_posts = mysqli_query($Connection,$query);

while ($row = mysqli_fetch_assoc($Select_posts))
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

echo "<tr>";
echo "<td> $post_id </td>";
echo "<td> $post_author </td>";
echo "<td>$post_author</td>";
echo "<td>$post_category</td>";
echo "<td>$post_status</td>";
echo "<td><img width='100' class = 'img-responsive' src= '../images/$post_image'></td>";
echo "<td>$post_tags</td>";
echo "<td>$post_comments </td>";
echo "<td>$post_date</td>";
echo "<td><a href ='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
echo "<td><a href ='posts.php?delete={$post_id}'>Delete</a></td>";
echo "</tr>";

}

?>
   
</tbody>
  


</table>

<?php

if (isset($_GET ['delete'])){

    $delete_id = $_GET ['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$delete_id}";
    $delete_query = mysqli_query($Connection, $query);



}


 ?>