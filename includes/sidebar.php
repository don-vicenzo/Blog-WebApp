<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">




    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!--end of search form -->
        <!-- /.input-group -->
    </div>





     <!-- Login Form -->
     <?php
        // ***Ako user nije ulogovan-prikazivace se Login forma.
        // U suprotnom Login forma nece biti prikazana na stranici
    if(!isset($_SESSION['username'])){
        include "login_include.php";
    }

    ?>





    <!-- Blog Categories Well -->
    <div class="well">

        <?php
        $query = "SELECT * FROM categories";
        $categories_sidebar = mysqli_query($connection, $query);
        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php
                    while ($row = mysqli_fetch_array($categories_sidebar)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                    ?>

                </ul>
            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->
    </div>


    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>