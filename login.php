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
 * @name Index/Login Page 
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
?>
<?php
/**
 * Already Login
 */
if ($user->is_loggedin() != "") {
    $user->redirect('main.php');
}

/**
 * Before Login
 */
if (isset($_POST['btn-login'])) {
    $femail = $_POST['femail'];
    $upass = $_POST['fpwd'];
    if ($user->login($femail, $upass)) {
        $user->redirect('home.php');
    } else {
        header("Location: index.php?failure");
    }
}
?>
<div class="row mzm">   
    <div class="col-md-offset-3 col-md-6">
        <?php
        if (isset($_GET['failure'])) {
            echo '<div class="alert alert-danger">Wrong Email/Password. Please try agian. <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>';
        }
        ?>
        <h3 class="text-login"><?php echo 'Login' ?></h3>
        <form method='post' class="form-horizontal">

            <div class="form-group form-group-lg">
                <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="femail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <label for="inputPhone" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="fpwd" placeholder="password" required>
                </div>
            </div>    
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="btn-login">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </button>
                </div>                
            </div>
            <span class="col-sm-offset-3 "> Do not have an account? <a href="register.php">Sign Up Now</a> </span>
        </form>
    </div>
</div>
<?php
/*
 * included at the end of all files 
 */
include_once 'inc/inc.footer.php';
