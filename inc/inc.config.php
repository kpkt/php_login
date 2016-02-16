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
 * @name Dbconfig file
 * @description Set the credentials for the database and make a new PDO connection 
 *              if the connection fails display the error.
 */
session_start();
/**
 * Set Setting 
 * Please change this parameter follow yourselft setting
 */
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "password";
$dbName = "db_php_sample";


try {
    // Connections are established by creating instances of the PDO base class.    
    // http://php.net/manual/en/pdo.connections.php
    $dbCon = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
    $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

include_once 'inc.class.crud.php';
$crud = new Crud($dbCon);
include_once 'inc.class.user.php';
$user = new User($dbCon);
