<?php  include "includes/db_connection.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php

if(isset($_SESSION['username'])){
    $the_username = $_SESSION['username'];
    $the_username;


    $query = "SELECT * FROM users WHERE username = '{$the_username}' ";
    $users = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['password'];
        $user_first_name = $row['first_name'];
        $user_last_name = $row['last_name'];
        $user_email = $row['email'];
        $user_role = $row['role'];

    }
}


if(isset($_POST['edit_user'])){
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])){ 
        if($_POST['first_name'] != " " && $_POST['last_name'] != " " &&  $_POST['email'] != " " && $_POST['password'] != " "){ 

            $user_f_name =  $_POST['first_name'];
            $user_l_name =  $_POST['last_name'];
            $user_password =  $_POST['password'];
            $user_email =  $_POST['email'];
            $user_role =  $_POST['role'];
            

            $query = "UPDATE users SET  password = '{$user_password}', 
                                        first_name = '{$user_f_name}', 
                                        last_name = '{$user_l_name}', 
                                        email = '{$user_email}', 
                                        role = '{$user_role}'
                    WHERE username = '{$the_username}' ";

            $edit_user = mysqli_query($connection, $query);

            if(!$edit_user){
                die("QUERY FAILED" . mysqli_error($connection));
            }

            echo "<div class='alert alert-success' role='alert'><p class='text text-center'>Profile successfully updated!</p>  
            </div>";
            // checkQuery($edit_user);
        }else{
            echo "<div class='alert alert-danger'>
                            <p class='text-center'>Fields cannot be empty!</p>
                                     </div>";
        }
    }else{
        echo "<div class='alert alert-danger'>
                            <p class='text-center'>Fields cannot be empty!</p>
                                     </div>";
    }

}

?>




    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 class="text text-center">Edit your profile</h1>




                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $user_first_name; ?>" name="first_name" value="">
                    </div>  


                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $user_last_name; ?>" name="last_name">
                    </div>  


                    <div class="form-group">
                        <label for="username">Username (cannot be changed)</label>
                        <input type="text" class="form-control" value="<?php echo $username; ?>" name="username" readonly>
                    </div> 


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="password">
                    </div> 


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="email">
                    </div>

                    


                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="">

                            <option value="subscriber"><?php echo $user_role; ?></option>   
                            
                        </select>
                    </div>   






                    <div class="form-group">
                        <input type="submit" class="btn btn-primary center-block" name="edit_user" value="Update Profile">
                    </div>

</form>


                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
