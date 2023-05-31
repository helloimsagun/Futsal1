<?php
$showError = false;



if($_SERVER["REQUEST_METHOD"]== 'POST')
{
  include '_dbconnect.php';
  $userid = $_POST['userid'];
  $cpassword = $_POST['cpassword'];
  $s = "select * from register where userid = '$userid' && cpassword='$cpassword'";
  $result = mysqli_query($con, $s);

  $num = mysqli_num_rows($result);
  if($num == 1){
    session_start();
   $_SESSION['loggedin'] = true;
   $_SESSION['userid'] = $userid;
   header('location:/FUTSAL1/index.php#book');

  }
  else{
    $showError=true;
   
  }
 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Login</title>
</head>

<style>
p1 {
    color: red;
}
</style>

<body>
    <div class="login-box">
        <div class="login-container">
            <div class="form-box">
                <a href="../index.php" class="close-btn">&times;</a>
                <h2>Login</h2>
                <form id="login" class="input-group" action="login.php" method="post">
                    <div class="input-field">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="userid" class="field" placeholder="User ID" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="cpassword" class="field" placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" class="submit-btn">Log In</button>
                </form>
                <div class="aside">
                    <p>Don't have an account? <a href="register.php">Register Now</a></p>
                    </div>
                    <div class="login_msg">
                    <?php
                      if($showError)
                       {
                       echo"<p1><strong>Invalid Username or password.</p1>";
                       }
                     ?>
                     </div>
                
            </div>
        </div>
    </div>
</body>

</html>