<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>Comment ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Date</th>
        <!-- <th>??Status??</th> -->
        <th>Comment on News</th>
        
        <th>Action</th>
    </tr>
</thead>

<tbody>
    
<?php

$query = "SELECT * FROM comments";
$comments = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($comments)) {
    $comment_id = $row['comment_id'];
    $comment_author = $row['comment_author'];
    $comment_news_id = $row['comment_news_id'];
    $comment_content = $row['comment_content'];
    $comment_date = $row['comment_date'];
    

    echo "<tr>";
    echo "<td>{$comment_id}</td>";
    echo "<td>{$comment_author}</td>";
    echo "<td>{$comment_content}</td>";
    echo "<td>{$comment_date}</td>";
    

    $query = "SELECT * FROM news WHERE news_id = $comment_news_id ";
    $news_id_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($news_id_query)){
        $news_id = $row['news_id'];
        $news_title = $row['news_title'];

        echo "<td><a href='../post.php?n_id=$news_id'>$news_title</a></td>";

    }
   
    echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete?'); \" href='comments.php?delete=$comment_id'>DELETE</td>";
    echo "</tr>";

}

?>


</tbody>      

</table>


<?php

if(isset($_GET['delete'])){

    $query = "UPDATE news SET news_comment_count = news_comment_count - 1 
    WHERE news_id = $news_id ";
    $count_minus = mysqli_query($connection, $query);

    include_once "../config.php";
    $user = new User();
    $user->deleteComment();

    
    // $user->countCommentMinus();
}

?>

