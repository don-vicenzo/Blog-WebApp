<ul class="nav navbar-nav navbar-right top-nav">

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>

            <?php

            if (isset($_SESSION['username'])) {

                echo " " . $_SESSION['first_name'] . " " . $_SESSION['last_name'];
            }

            ?>


            <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="user_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>

            <li class="divider"></li>
            <li>
                <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>