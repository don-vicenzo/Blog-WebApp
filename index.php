<?php include_once "includes/db_connection.php"; ?>
<?php include "includes/header.php"; ?>



   <!-- Navigation -->
   <?php include "includes/navigation.php"; ?>



    <!-- Page Content -->
    <div class="container">



        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

                <?php

                $query = "SELECT * FROM news";
                $select_all_news = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($select_all_news)){
                    $news_id = $row['news_id']; 
                    $news_title = $row['news_title']; 
                    $news_author = $row['news_author']; 
                    $news_date = $row['news_date']; 
                    $news_content = substr($row['news_content'], 0, 150); 
                    
                    ?>

               


                <!-- First Blog Post -->
                <hr>
                <h2>
                    <a href="post.php?n_id=<?php echo $news_id; ?>"><?php echo $news_title; ?></a>
                </h2>
                <p class="lead">
                    by: <?php echo $news_author; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $news_date; ?></p>
                <hr>
                
                
                
                <p><?php echo $news_content; ?></p>


                <a class="btn btn-primary" href="post.php?n_id=<?php echo $news_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                <?php 

                }

                ?>


                
               
            </div>

            

            <!-- Blog Sidebar Widgets Column -->

            <?php  include "includes/sidebar.php" ?>
            

        </div>



        <!-- /.row -->

        <hr>

        <?php  include "includes/footer.php" ?>