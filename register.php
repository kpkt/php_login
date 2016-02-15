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
?>
<?php
//session_start();
if (isset($_SESSION['user_session']) != "") {
    header("Location: home.php");
}

if (isset($_POST['btn-signup'])) {
    $fname = $_POST['fname'];
    $femail = $_POST['femail'];
    $fphone = $_POST['fphone'];
    $upass = $_POST['fpwd'];

    if ($user->register($fname, $femail, $fphone, $upass)) {
        header("Location: register.php?successfully");
    } else {
        header("Location: register.php?failure");
    }
}
?>

<div class="row mzm">   
    <div class="col-md-offset-2 col-md-8">
        <?php
        if (isset($_GET['successfully'])) {
            echo '<div class="alert alert-info">The registration has been successfully. <a href="login.php"><strong>Login</strong></a>!</div>';
        } else if (isset($_GET['failure'])) {
            echo '<div class="alert alert-warning">The registration could not be saved. Please, try again.</div>';
        }
        ?>

        <h3 class="text-login"><?php echo 'Sign Me Up' ?></h3>
        <form method='post' class="form-horizontal">
            <div class="form-group form-group-lg">
                <label for="inputName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="fname" placeholder="Full Name" required> 
                </div>
            </div>    
            <div class="form-group form-group-lg">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control"  name="femail" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group form-group-lg">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="fpwd" placeholder="Password" required>
                </div>
            </div>    
            <div class="form-group form-group-lg">
                <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-8">
                    <input type="tel" class="form-control" name="fphone" placeholder="Phone Number" required>
                </div>
            </div>    
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="btn-signup">
                        <span class="glyphicon glyphicon-plus"></span> Sign Up
                    </button>
                </div>
            </div>
            <span class="col-sm-offset-4">Already have an account? <a href="login.php">Login</a> </span>
        </form>
    </div>
</div>
<?php
/*
 * included at the end of all files 
 */
include_once 'inc/inc.footer.php';
