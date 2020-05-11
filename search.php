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
                //search engine build

                if(isset($_POST['search'])){

                        $search = $_POST['search'];
                        $search = mysqli_real_escape_string($connection, $search);

                        $query = "SELECT * FROM news WHERE news_tag LIKE '%$search%'";
                        $search_query = mysqli_query($connection, $query);

                        if(!$search_query){
                            die("Query FAILED" . mysqli_error($connection));
                        }

                        $count = mysqli_num_rows($search_query);
                        if($count == 0){
                            echo "<h2> NO SEARCH MATCHES </h2>";
                        }else{                        


                            while($row = mysqli_fetch_array($search_query)){
                                $n_db_id = $row['news_id'];
                                $news_title = $row['news_title']; 
                                $news_author = $row['news_author']; 
                                $news_date = $row['news_date']; 
                                $news_content = substr($row['news_content'], 0, 150); 

                                ?>
            
                            
            
                            <!-- Blog Posts -->
                            <hr>
                            <h2>
                                <a href="post.php?n_id=<?php echo $n_db_id; ?>"><?php echo $news_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <?php echo $news_author; ?>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span><?php echo $news_date; ?></p>
                            <hr>
                            
                            <p>
                            <?php echo $news_content; ?>                </p>
                            <a class="btn btn-primary" href="post.php?n_id=<?php echo $n_db_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            
                            <hr>
            
            
                            <?php 
            
                            } 
                            
                            
                            
                        }
                } 

                ?>
                


                
               
            </div>

            

            <!-- Blog Sidebar Widgets Column -->

            <?php  include "includes/sidebar.php" ?>
            

        </div>



        <!-- /.row -->

        <hr>

        <?php  include "includes/footer.php" ?>