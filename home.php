<?php
/*
 * PHP Login and Registration Script with PDO and OOP
 * In this tutorial I'm going to explain  a login and registration script using PDO and OOP,
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mohdzaki04@gmail.com
 * @fb	 	: https://www.facebook.com/zakimedia
 * @tw	 	: https://twitter.com/mzmfizaki
 */
?>
<?php
/*
 * the database connection
 */
include_once 'inc/inc.config.php';


/*
 * included at the beginning of all files
 */
include_once 'inc/inc.header.php';

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}
?>
<div class="row mzm">   
    <h3>PHP Login and Registration Script with PDO and OOP</h3>
    <p>In my previous tutorial (https://github.com/mzm-dev/php_pdo) i have explained that how to use OOP in PDO, and now in this tutorial I'm going to explain a login and registration script using PDO and OOP, 
        we already have a tutorial on this topic but that was for beginners with MySQL, and this one is with PDO and OOP, as PDO is improved extension it's must be used.
        I have used here new PHP 5.5 Password Hashing API function that creates strong password, 
        for hashing password you have to use PHP 5.5 latest version of PHP and we will also see how to hash passsword 
        using this functions and maintaining a user sessions using OOP so let's see the tutorial.</p>
    <p><a href="https://github.com/mzm-dev/php_login">Github Repository</a></p>
</div>


<?php
/*
 * included at the end of all files 
 */
include_once 'inc/inc.footer.php';
