 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">



            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Homepage</a>
            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php
                // session_start();
                include_once "db_connection.php";
                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($select_all_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    // echo "<li><a href='#'>{$cat_title}</a></li>";
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }


                ?>
                   
                </ul>


                <ul class="nav navbar-nav navbar-right top-nav"> 
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                </ul>





                <?php

                // **** Ako user nije ulogovan-prikazivace se opcija (link) ka registraciji

                if(!isset($_SESSION['username'])){
                ?>
                    <ul class="nav navbar-nav navbar-right top-nav"> 
                        <li>
                            <a href="registration.php">Registration</a>
                        </li>
                    </ul>

                <?php } ?>



                <?php
                    // **** Ako je user ulogovan-prikazivace se opcija njegovog profila u navigaciji
                    if(isset($_SESSION['username'])){
                        include 'user_dropdown.php';
                    }    

                ?>
            </div>
            <!-- /.navbar-collapse -->

  





        </div>
        <!-- /.container -->
    </nav>