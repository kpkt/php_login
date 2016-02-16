<?php
/*
 * PHP Login and Registration Script with PDO and OOP
 * In this tutorial I'm going to explain  a login and registration script using PDO and OOP
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mohdzaki04@gmail.com
 * @fb	 	: https://www.facebook.com/zakimedia
 * @tw	 	: https://twitter.com/mzmfizaki
 */

/*
 * @name Header page
 * @description This header.php file will be included at the beginning of all files 
 *              so that we won't have to write the same header codes every-time. 
 *              This file contains bootstrap file links. 
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Penggunaan AppGen - API Manager dan pembangunan API Service dengan mengggunakan PHP dan MySQL" name="description">        
        <title>PHP Login and Registration Script with PDO and OOP</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"> 
        <!-- Custome -->
        <link href="css/style.css" rel="stylesheet"> 
    </head>

    <body>
        <!-- Main content -->
        <div class="container">
            <?php if ($user->is_loggedin() != "") { ?>
                <!--Main header -->
                <div class="header clearfix">
                    <!--Nav -->
                    <nav>
                        <ul class="nav nav-pills pull-right">
                            <li class="active" role="presentation"><a href="index.php">Home</a></li>                        
                            <li class="active" role="presentation"><a href="user_index.php">User Data</a></li>                        
                            <li class="active" role="presentation"><a href="logout.php?logout">Logout</a></li>                        
                        </ul>
                    </nav>
                    <!-- /.nav -->
                    <h3 class="text-muted">Welcome : <?php echo $_SESSION['user_session']['name']; ?></h3>
                </div>
                <!-- /.header -->
            <?php } ?>
