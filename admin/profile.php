<?php
include "includes/admin_header.php";


if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile)){
        
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

    $username =  $_POST['username'];
    $user_f_name =  $_POST['first_name'];
    $user_l_name =  $_POST['last_name'];
    $user_password =  $_POST['password'];
    $user_email =  $_POST['email'];
    $user_role =  $_POST['role'];
    

    $query = "UPDATE users SET username = '{$username}',
                                password = '{$user_password}', 
                                first_name = '{$user_f_name}', 
                                last_name = '{$user_l_name}', 
                                email = '{$user_email}', 
                                role = '{$user_role}'
              WHERE username = '{$username}' ";

    $edit_user = mysqli_query($connection, $query);

    checkQuery($edit_user);

    header("Location: users.php");

}







?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php";  ?>


    <div id="page-wrapper">

        <div class="container-fluid">



            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                <h1 class="page-header">
                    Welcome to your profile <small><?php echo $user_first_name . " " . $user_last_name; ?></small>
                </h1>


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
                        <select class="form-control" name="role" id="">

                            <option value="subscriber"><?php echo $user_role; ?></option>   
                            
                            <?php

                            if($user_role == 'admin'){
                                echo "<option value='subscriber'>subscriber</option>";
                            }else{
                                echo "<option value='admin'>admin</option>";
                            }

                            ?>
                            

                        </select>
                    </div>   






                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                    </div>

                    </form>
                   
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>