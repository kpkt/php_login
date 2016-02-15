<?php

/* 
 * PHP Login and Registration Script with PDO and OOP
 * In this tutorial I'm going to explain  a login and registration script using PDO and OOP,
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mohdzaki04@gmail.com
 * @fb	 	: https://www.facebook.com/zakimedia
 * @tw	 	: https://twitter.com/mzmfizaki
 */

/*
 * the database connection
 */
include_once 'inc/inc.config.php';

if ($user->is_loggedin() != "") {
    $user->redirect('home.php');
}else{
    $user->redirect('login.php');
}