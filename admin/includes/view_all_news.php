<a href='news.php?source=add_news'><button type="button" class="btn btn-success">Add News</button></a><br><br>

<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>News ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View News</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    
<?php

$query = "SELECT * FROM news";
$news = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($news)) {
    $news_id = $row['news_id'];
    $news_author = $row['news_author'];
    $news_title = $row['news_title'];
    $news_cat_id = $row['news_cat_id'];
    $news_tag = $row['news_tag'];
    $news_comment = $row['news_comment_count'];
    $news_date = $row['news_date'];

    echo "<tr>";
    echo "<td>{$news_id}</td>";
    echo "<td>{$news_author}</td>";
    echo "<td>{$news_title}</td>";

    $query = "SELECT * FROM categories WHERE cat_id = {$news_cat_id} ";
    $sel_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($sel_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<td>{$cat_title}</td>";    

    }

$query = "SELECT * FROM comments WHERE comment_news_id = {$news_id}";
$res = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($res)){
    $num = $row['comment_news_id'];
    }



    echo "<td>{$news_tag}</td>";
    echo "<td>{$news_comment}</td>";
    echo "<td>{$news_date}</td>";
    echo "<td><a href='../post.php?n_id={$news_id}'>View News</td>";
    echo "<td><a href='news.php?source=edit_news&n_id={$news_id}'>Edit</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete?'); \" href='news.php?delete={$news_id}'>DELETE</td>";
    echo "</tr>";

}

?>


</tbody>      

</table>


<?php

if(isset($_GET['delete'])){

    $the_news_id = $_GET['delete'];
    $query = "DELETE FROM news WHERE news_id = {$the_news_id}";
    $delete_query = mysqli_query($connection, $query);
   
    header("Location: news.php");
    
    
    
    

}

?>

