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
                        News
                        <small>Author</small>
                    </h1>

                    <!-- <a href='news.php?source=add_news'><button type="button" class="btn btn-success">Add News</button></a><br><br>     -->


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
                       include "includes/view_all_news.php";
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