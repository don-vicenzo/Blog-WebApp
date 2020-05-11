<?php

if(isset($_GET['n_id'])){
    $n_id = $_GET['n_id'];
    
}

$query = "SELECT * FROM news WHERE news_id = $n_id ";
$news = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($news)) {
    $news_id = $row['news_id'];
    $news_author = $row['news_author'];
    $news_title = $row['news_title'];
    $news_cat_id = $row['news_cat_id'];
    $news_content = $row['news_content'];
    $news_tag = $row['news_tag'];
    $news_comment = $row['news_comment_count'];
    $news_date = $row['news_date'];  // (u slucaju da ne radi), onda -> $news_date =  date("Y-m-d H:i:s");

}

if(isset($_POST['update_news'])){
    
    $news_author = $_POST['author'];
    $news_title = $_POST['title'];
    $news_title = mysqli_real_escape_string($connection, $news_title);  //ovo ne koristim iz bezbednosnih razloga (jer samo admin ima pristup ovom delu), vec da MySQL prihvati navodnike
    $news_cat_id = $_POST['news_category'];
    $news_tag = $_POST['news_tag'];
    $news_content = $_POST['news_content'];
    $news_content = mysqli_real_escape_string($connection, $news_content); //isti razlog kao kod '$news_title'

    $query = "UPDATE news SET news_title = '{$news_title}', 
                              news_cat_id = {$news_cat_id}, 
                              news_author = '{$news_author}', 
                              news_date = '{$news_date}', 
                              news_tag = '{$news_tag}', 
                              news_content = '{$news_content}'
              WHERE news_id = {$n_id}";

    $update_news = mysqli_query($connection, $query);

    checkQuery($update_news);

    echo "<div class='alert alert-success'>
                <strong>Post Updated!</strong><a href='news.php' class='alert-link'> View all News</a>.
            </div>";

    // header("Location: news.php");

}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">News Title</label>
        <input type="text" value="<?php echo $news_title; ?>" class="form-control" name="title">
    </div>  

    <div class="form-group">
        <label for="news_category">News Category</label>
        <select class="form-control" name="news_category" id="">

            <?php
            
            $query = "SELECT * FROM categories";
            $sel_categories = mysqli_query($connection, $query);

            checkQuery($sel_categories);

            while ($row = mysqli_fetch_array($sel_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";

            }
            
            ?>

        </select>
    </div>  

    <div class="form-group">
        <label for="author">News Author</label>
        <input type="text" value="<?php echo $news_author; ?>" class="form-control" name="author">
    </div> 

    <div class="form-group">
        <label for="news_tag">News Tags</label>
        <input type="text" value="<?php echo $news_tag; ?>" class="form-control" name="news_tag">
    </div> 

    <div class="form-group">
        <label for="news_content">News Content</label>
        <textarea class="form-control ckeditor" name="news_content" id="body" cols="30" rows="10"><?php echo $news_content; ?>
            
        </textarea>  
    </div> 

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_news" value="Update News">
    </div>

</form>