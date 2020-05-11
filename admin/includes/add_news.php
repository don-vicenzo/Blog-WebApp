<?php

if(isset($_POST['create_news'])){

    $news_title =  $_POST['title'];
    $news_title = mysqli_real_escape_string($connection, $news_title);  //ovo ne koristim iz bezbednosnih razloga (jer samo admin ima pristup ovom delu), vec da MySQL prihvati navodnike

    $news_content = mysqli_escape_string($connection, $news_title); //isti razlog kao sa '$news_title'
    $news_author =  $_POST['author'];
    $news_cat_id =  $_POST['news_category'];
    $news_tag =  $_POST['news_tag'];
    $news_content =  $_POST['news_content'];
    $news_content = mysqli_escape_string($connection, $news_content);
    $news_date =  date("Y-m-d H:i:s");
    // $news_comment_count = 4;

    $query = "INSERT INTO news(news_cat_id, news_title, news_author, news_date, 
                               news_content, news_tag) 
                           VALUES({$news_cat_id},'{$news_title}', '{$news_author}', now(),
                                 '{$news_content}', '{$news_tag}') ";

    $create_news_query = mysqli_query($connection, $query);
    
    checkQuery($create_news_query);
    echo "<div class='alert alert-success'>
                <strong>News Created!</strong><a href='news.php' class='alert-link'> View all News</a>.
            </div>";
}

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">News Title</label>
        <input type="text" class="form-control" name="title" required>
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
        <input type="text" class="form-control" name="author" required>
    </div> 

    <div class="form-group">
        <label for="news_tag">News Tags</label>
        <input type="text" class="form-control" name="news_tag" required>
    </div> 

    <div class="form-group">
        <label for="news_content">News Content</label>
        <textarea class="form-control ckeditor" name="news_content" id="" cols="30" rows="10" required></textarea>  
    </div> 

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_news" value="Publish News">
    </div>

</form>