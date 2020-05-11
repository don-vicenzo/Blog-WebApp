<?//php include_once "includes/db_connection.php"; ?>
<?php include "includes/header.php"; ?>
<?php 
include "config.php";
// session_start();

?>


   <!-- Navigation -->
   <?php include "includes/navigation.php"; ?>



    <!-- Page Content -->
    <div class="container">



        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

                <?php

                if(isset($_GET['n_id'])){
                    include_once "includes/db_connection.php"; 
                    $n_id = $_GET['n_id'];
                }

            $query = "SELECT * FROM news WHERE news_id = $n_id";
                $select_all_news = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_news)){
                    $news_title = $row['news_title']; 
                    $news_author = $row['news_author']; 
                    $news_date = $row['news_date']; 
                    $news_content = $row['news_content'];
                    $news_cat_id = $row['news_cat_id']; 


                $query = "SELECT * FROM categories WHERE cat_id = {$news_cat_id}";
                    $cat_query = mysqli_query($connection, $query);
                    while($c = mysqli_fetch_assoc($cat_query)){
                        $cat_title = $c['cat_title'];
                    }
                    
                    ?>

                <h1 class="page-header">
                    <?php echo $cat_title . " " . "category"; ?>
                    <!-- <small>Secondary Text</small> -->
                </h1> 


                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $news_title; ?></a>
                </h2>
                <p class="lead">
                    by <?php echo $news_author; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $news_date; ?></p>
                <hr>
                
                <p><?php echo $news_content; ?></p>

                

                <hr>


                <?php 

                }

                ?>




                 <!-- Blog Comments -->


                <?php

                if(isset($_POST['create_comment'])){
                    if(!empty($_POST['comment'])){ 
                        if(isset($_SESSION['user_logged'])){
                            $user = new User;
                            $user->selectUserByUsername($_SESSION['username']);

                            if($_SESSION['user_logged'] && $_SESSION['username'] === $user->db_username ){
                                
                                $user->insertComment($_SESSION['username']);
                                $user->countCommentPlus();
                                        
                            }else{
                                echo "<div class='alert alert-danger'>
                                    <strong>You must be Logged in to post a comment!</strong>
                                </div>";
                            }
                        }else{
                            echo "<div class='alert alert-danger'>
                                    <strong>You must be Logged in to post a comment!</strong>
                                </div>";
                        }
                    }else{
                        echo "<div class='alert alert-danger'>
                        Comment field cannot be empty!
                      </div>";
                    } 
                }   

                ?>





                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">


                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>


                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

                        
                    </form>
                </div>

                <hr>



                <!-- Posted Comments -->
                <div class="media">
                    <h3>All Comments</h3><hr>
                </div>    

                <?php 
                // ********displaying comments********
                include_once "includes/db_connection.php";
            $query = "SELECT * FROM comments WHERE comment_news_id = {$n_id} 
                      ORDER BY comment_id DESC ";

                $comment_display = mysqli_query($connection, $query);
                if(!$comment_display){
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                while($row = mysqli_fetch_assoc($comment_display)){
                    $comment_id = $row['comment_id'];
                    $comment_date = $row['comment_date'];  
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];  
                      ?>

                <!-- Comment -->
                <div class="media">
                
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>








                        <?php 
                        // **Ako je korisnik ulogovan na sistem-bice u mogucnosti da obrise komentar (samo svoj)
                        if(isset($_SESSION['username'])){
                            $session_author = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
                            if($session_author == $comment_author ){ ?>


                                <br><br><a onClick="javascript: return confirm('Are you sure want to delete?');" href='includes/delete_comment.php?n_id=<?php echo $n_id; ?>&delete=<?php echo $comment_id; ?>'><button type="submit"  name="delete_comment" class="btn btn-danger">Delete comment</button></a><hr>
                            
                            <?php

                            }
                        }
                        
                        ?>
                        
                    
                    
                    </div>
                </div><br>


                        
               <?php } ?>

            </div>

            

            <!-- Blog Sidebar Widgets Column -->

            <?php  include "includes/sidebar.php" ?>
            

        </div>



        <!-- /.row -->

        <hr>


        


        <?php  include "includes/footer.php" ?>