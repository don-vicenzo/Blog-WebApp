<?php include "includes/admin_header.php";   ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php";  ?>


    <div id="page-wrapper">

        <div class="container-fluid">



            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                <h1 class="page-header">
                        Welcome to admin panel
                        <small>Author</small>
                    </h1>


                   <?php
                   
                   if(isset($_GET['source'])){
                       $source = $_GET['source'];
                   }else{
                       $source = "";
                   }

                   switch($source){

                       case 'add_news':
                       include "includes/add_news.php";
                       break;

                       case 'edit_news':
                       include "includes/edit_news.php";
                       break;

                       default:
                       include "includes/view_all_comments.php";
                       break;
                   }
                   
                   
                   
                   ?>

                   
                </div>
            </div>
            <!-- /.row -->



        </div>
        <!-- /.container-fluid -->



    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>