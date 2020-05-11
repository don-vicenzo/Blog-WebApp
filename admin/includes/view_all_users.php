<a href='users.php?source=add_user'><button type="button" class="btn btn-success">Add User</button></a><br><br>

<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>

<tbody>
    
<?php

$query = "SELECT * FROM users";
$users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['password'];
    $user_first_name = $row['first_name'];
    $user_last_name = $row['last_name'];
    $user_email = $row['email'];
    $user_role = $row['role'];
    

    echo "<tr>";
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_password}</td>";
    echo "<td>{$user_first_name}</td>";
    echo "<td>{$user_last_name}</td>";
    echo "<td>{$user_email}</td>";
    echo "<td>{$user_role}</td>";
    


    // $query = "SELECT * FROM categories WHERE cat_id = {$news_cat_id} ";
    //     $sel_categories_id = mysqli_query($connection, $query);

    //     while ($row = mysqli_fetch_array($sel_categories_id)) {
    //         $cat_id = $row['cat_id'];
    //         $cat_title = $row['cat_title'];
    //         echo "<td>{$cat_title}</td>";    

    //     }

    // $query = "SELECT * FROM news WHERE news_id = $comment_news_id ";
    // $news_id_query = mysqli_query($connection, $query);
    // while($row = mysqli_fetch_assoc($news_id_query)){
    //     $news_id = $row['news_id'];
    //     $news_title = $row['news_title'];

    //     echo "<td><a href='../post.php?n_id=$news_id'>$news_title</a></td>";

    // }
    
   
    echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>EDIT</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete?'); \" href='users.php?delete={$user_id}'>DELETE</td>";
    echo "</tr>";

}

?>


</tbody>      

</table>


<?php

if(isset($_GET['delete'])){

    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");

}

?>

