<?php  include "includes/db_connection.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
if(isset($_GET['us_err'])==true) {
    echo "<div class='alert alert-danger'>
    <p class='text-center'>The username already exists. Please use a different username</p>
                </div>";
}

if(isset($_POST['submit'])){ 
    $query = "SELECT * FROM users";
    $username_query = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($username_query)){
        $db_username = $row['username'];
    }

    if($_POST['username'] === $db_username){
        header("Location: registration.php?us_err=1");

    }else{ 

        if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['password'])){

            if($_POST['first_name'] != " " && $_POST['last_name'] != " " &&  $_POST['username'] != " " && $_POST['password'] != " "){ 

                $first_name =  $_POST['first_name'];
                $last_name =  $_POST['last_name'];
                $username =  $_POST['username'];
                $password =  $_POST['password'];
                $email =  $_POST['email'];

                $first_name = mysqli_real_escape_string($connection, $first_name);
                $last_name = mysqli_real_escape_string($connection, $last_name);
                $username = mysqli_real_escape_string($connection, $username);
                $password = mysqli_real_escape_string($connection, $password);
                $email = mysqli_real_escape_string($connection, $email);


                $query = "INSERT INTO users (username, password, first_name, last_name, email)
                        VALUES ('{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$email}') ";

                $register_query = mysqli_query($connection, $query);
                
                if(!$register_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                $message = "<div class='alert alert-success' role='alert'>You have successfully registered! Thank you for registering.
                            </div>";

            }else{
                $message = "";
                echo "<div class='alert alert-danger'>
                <p class='text-center'>Fields cannot be empty!</p>
                        </div>";
            }

        }else{
            $message = "";
            echo "<div class='alert alert-danger'>
            <p class='text-center'>Fields cannot be empty!</p>
                        </div>";
        }

    }
}else{
    $message = "";
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
                <h1>Register</h1>


                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h5 class="text-center"><?php echo $message; ?></h5>
                    
                         <div class="form-group">
                            <label for="first_name" class="sr-only">First Name</label>
                            <input type="text" name="first_name" id="first_name"  class="form-control" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="sr-only">Last Name</label>
                            <input type="text" name="last_name" id="last_name"  class="form-control" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username"  class="form-control" placeholder="Username">
                        </div>
                         
                        
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email in format: somebody@example.com">
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg center-block" value="Register">
                    
                    </form>


                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
