<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
$email=trim($_POST['email']);
$password=trim($_POST['password']);

   $email = mysqli_real_escape_string($conn,$email);
   $password = mysqli_real_escape_string($conn, $password);
   $password_hash=md5($password);
$sql="SELECT id FROM `userform` WHERE email = '$email' AND password = '$password_hash' LIMIT 1";
   $result = mysqli_query($conn,$sql );

   if($result && mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['id'];
      mysqli_free_result($result);
      mysqli_close($conn);
      header('location:index.html');
      exit();
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>College Website</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
       <section class="header">
           <nav>
            <a href="index.html"><img src="images/logo.png"></a>
            <div class="nav-links">
               
            </div>
           </nav>
           <div class="container">
            <h1>Login</h1>
            <form id="login-form" class="form" action="" method="POST">
                <h2>Login</h2>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" name="submit" value="Login">
              <a href="signup.php" class="sign">signup</a>

            </form>
            
        </div>


           <footer>
            <p>&copy; My Eduford Website 2023</p>
        </footer>
    
        </body>
    </html>