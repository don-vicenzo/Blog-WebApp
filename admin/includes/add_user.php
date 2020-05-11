<?php

if(isset($_POST['create_user'])){

    $username =  $_POST['username'];
    $user_f_name =  $_POST['first_name'];
    $user_l_name =  $_POST['last_name'];
    $user_password =  $_POST['password'];
    $user_email =  $_POST['email'];
    $user_role =  $_POST['role'];
    

    $query = "INSERT INTO users(username, password, first_name, 
                               last_name, email, role) 
                           VALUES('{$username}', '{$user_password}',
                                 '{$user_f_name}', '{$user_l_name}', '{$user_email}', '{$user_role}') ";

    $create_user_query = mysqli_query($connection, $query);
    
    checkQuery($create_user_query);

    echo "<div class='alert alert-success'>
                <strong>User Created!</strong><a href='users.php' class='alert-link'> View all Users</a>.
            </div>";


}

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" required>
    </div>  


    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" required>
    </div>  


    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div> 


    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div> 


    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

     
    <div class="form-group">
        <select class="form-control" name="role" id="">

            <option value="subscriber">Select Options</option>       
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>

        </select>
    </div>   






    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>

</form>