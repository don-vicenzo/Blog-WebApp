<?php

        if(isset($_GET['delete'])){

            $the_n_id = $_GET['n_id'];
            $the_comm_id = $_GET['delete'];
            include_once "db_connection.php";

            $query = "DELETE FROM comments WHERE comment_id = {$the_comm_id} ";
            $delete_query = mysqli_query($connection, $query);

            $query = "UPDATE news SET news_comment_count = news_comment_count - 1 
            WHERE news_id = {$the_n_id} ";
            $count_minus = mysqli_query($connection, $query);

            header("Location: ../post.php?n_id=$the_n_id");
           
        }              

        ?>