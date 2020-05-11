<?php

class User 
{

    public $db_username, $db_id, $db_password, $test, $connection,
            $username, $password, $n_id, $comment_author, $comment_content, $comment_date, $first_name, $last_name;

    public function selectUserByUsername($username){
        $this->username = $username;
        $connection = mysqli_connect("localhost", "root", "", "blog");
        $this->username = mysqli_real_escape_string($connection, $this->username);
        $this->password = mysqli_real_escape_string($connection, $this->password);
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $res = mysqli_query($connection, $query);


        if(!$res){
            die("QUERY FAILED" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_assoc($res)){
            $this->db_id = $row['user_id'];
            $this->db_username = $row['username'];
            $this->db_password = $row['password'];
            $this->db_first_name = $row['first_name'];
            $this->db_last_name = $row['last_name'];
            $this->db_role = $row['role'];
        }
    
    }



    public function insertComment($username){

        $this->n_id = $_GET['n_id'];
        $this->comment_author = $this->db_first_name . " " .  $this->db_last_name;
        $this->comment_content = $_POST['comment'];
        $this->comment_date =  date("Y-m-d H:i:s");


        $this->connection2 = mysqli_connect("localhost", "root", "", "blog"); 
        $this->comment_content = mysqli_real_escape_string($this->connection2, $this->comment_content);
        $query2 = "INSERT INTO comments (comment_news_id, comment_author, comment_content, comment_date )
                                      VALUES ({$this->n_id}, '{$this->comment_author}', '{$this->comment_content}', now() )";

        $create_comment_query = mysqli_query($this->connection2, $query2); 
        
        if(!$create_comment_query){
            die("QUERY FAILED" . mysqli_error($this->connection2));
        
        }   
    }


    public function countCommentPlus(){
        $n_id = $_GET['n_id'];
        $this->connection = mysqli_connect("localhost", "root", "", "blog");

        $query = "UPDATE news SET news_comment_count = news_comment_count + 1 
                  WHERE news_id = $n_id ";

        $update_comment = mysqli_query($this->connection, $query);
    }




    public function deleteComment(){
        $query = "SELECT * FROM comments";
        $this->connection = mysqli_connect("localhost", "root", "", "blog");
        $comments = mysqli_query($this->connection, $query);

        while ($row = mysqli_fetch_array($comments)) {
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_news_id = $row['comment_news_id'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];

        $the_comment_id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
        $delete_query = mysqli_query($this->connection, $query);
        

        header("Location: comments.php");
        }
    }




    public function deleteUserComment(){
        $query = "SELECT * FROM comments";
        $this->connection = mysqli_connect("localhost", "root", "", "blog");
        $comments = mysqli_query($this->connection, $query);

        while ($row = mysqli_fetch_array($comments)) {
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_news_id = $row['comment_news_id'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];

        $the_comment_id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
        $delete_query = mysqli_query($this->connection, $query);
        

        header("Location post.php");
        }
    }


    public function notAdmin(){
        header("Location: ../index.php");
    }

    public function admin(){
        header("Location: ../admin");
    }

    
    


}