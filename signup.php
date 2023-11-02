<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = md5($_POST['password']);
   $address = $_POST['address'];

   $stmt = mysqli_prepare($conn, "SELECT * FROM `userform` WHERE email =? AND password = ?");
   mysqli_stmt_bind_param($stmt,"ss",$email,$password);
   mysqli_stmt_execute($stmt);
   $result=mysqli_stmt_get_result($stmt);

   if(mysqli_num_rows($result) > 0){
      $message[] = 'user already exist!';
   }else{
     $stmt= mysqli_prepare($conn, "INSERT INTO `userform`(name, email, password,address) VALUES(?,?,?,?)");
     mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$password,$address);
     if(mysqli_stmt_execute($stmt)){

      $message[] = 'registered successfully!';
      header('location:login.php');
     }else{
        $message[] = 'registered failed!';  
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
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
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
            <h1>Register</h1>
           <form id="signup-form" class="form" action="" method="post">
            <h2>Sign Up</h2>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" required>
            <input type="submit" name="submit" value="Register now">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>
    </div>


       <footer>
        <p>&copy; My Eduford Website 2023</p>
    </footer>

    </body>
</html>