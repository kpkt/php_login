<?php

/*
 * PHP Login and Registration Script with PDO and OOP
 * In this tutorial I'm going to explain  a login and registration script using PDO and OOP,
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mohdzaki04@gmail.com
 * @fb	 	: https://www.facebook.com/zakimedia
 * @tw	 	: https://twitter.com/mzmfizaki
 */

session_start();

if (!isset($_SESSION['user_session'])) {
    header("Location: index.php");
} else if (isset($_SESSION['user_session']) != "") {
    header("Location: home.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_session']);
    header("Location: index.php");
}
?>