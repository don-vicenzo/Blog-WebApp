<?php

function insert_categories()
{
    global $connection;

    if (isset($_POST['submit'])) {

        $add_category = $_POST['cat_title'];

        if ($add_category == "" || empty($add_category)) {
            echo "<div class='alert alert-danger'>This field can not be empty</div>";
        } else {

            $query = "INSERT INTO categories(cat_title) 
                      VALUES('{$add_category}')";

            $cat_add_query = mysqli_query($connection, $query);

            if (!$cat_add_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
    }
}



function showAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr><td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure want to delete?'); \" href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $del_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        if($delete_query){ 
            header("Location: categories.php");    
        }else{
            echo "<div class='alert alert-danger' role='alert'>
            <p class='text-center'>Cannot be deleted. This category contains News.</p>
                    </div>";
        }
    }
}


function checkQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}