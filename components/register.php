<?php
$showError=false;
$showAlert=false;
$wrongPassword=false;

if($_SERVER["REQUEST_METHOD"]== 'POST')
{
  include '_dbconnect.php';
  $userid = $_POST['userid'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $s = "select * from users where username = '$userid'";
  $result = mysqli_query($con, $s);

  $num = mysqli_num_rows($result);
  if($num == 1){
   $showError=true;
   //echo "userid already exist";
  }
  else{
    $reg= "insert into users(username, email, password) values('$userid', '$email', '$password') ";
  
  if($password!=$cpassword)
  {
    $wrongPassword=true;

   // echo"Password missmatch";
  }
  else{
  mysqli_query($con, $reg);
  $showAlert=true;
  //echo"Registration successful";
}
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
    <title>Register</title>
</head>
<style>
p1 {
    color: red;
}


p2 {
    color: rgb(30 126 52);
}

</style>

<body>
    <div class="register-box">
        <div class="register-container">
            <div class="form-box2">
                <a href="../index.php" class="close-btn2">&times;</a>
                <h2>Register</h2>
                <form id="register" class="input-group2" action="register.php" method="post">
                    <div class="input-field">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="userid" class="field" placeholder="User Name" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="email" class="field" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password" class="field" placeholder="Password" required
                            pattern=".{4,8}" title="Minimum 4 or maximum 8 characters">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="cpassword" class="field" placeholder="Confirm Password" required
                            pattern=".{4,8}" title="Minimum 4 or maximum 8 characters">
                    </div>
                    <button type="submit" class="submit-btn">Register</button>
                </form>
                <div class="aside2">
                    <p>Already have an account? <a href="login.php">Log In</a></p>
                </div>
                <div class="reg_msg">
                    <?php
                   if($showAlert){
                    echo '<p2 style="padding: 0px 0 0 30px;"> <strong>Account created successfully!!</strong></p2>';
                   }
                    if($wrongPassword){
                        echo '<p1 style="padding: 0px 0 0 30px;"> <strong>Error!</strong> Password do not match.</p1>';
                    }
                    if($showError){
                        echo '<p1> <strong>Error!!</strong> The user id that you have entered already exists.</p1>';
                    }
                 ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>