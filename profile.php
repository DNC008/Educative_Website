<?php

include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];
if(!isset($user_id))
{
    header('location:login.php');
};
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
}

?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>College Website</title>
        <link rel="stylesheet" href="pro.css">
        
    </head>
    <body>

    <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

       <section class="header">
           <nav>
            <a href="index.html"><img src="images/logo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="courses.html">COURSE</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                </ul>
            </div>
           </nav>
           <main>
            <section class="profile-info">
                <?php
                $select_user=mysqli_query($conn,"SELECT * FROM `userform` WHERE id='$user_id'") or die('query failed');
                if(mysqli_num_rows($select_user)>0)
                {
                    $fetch_user=mysqli_fetch_assoc($select_user);

                };
                

                ?>
                <h2>User Information</h2>
                <div>
                    <label>Name:</label>
                    <span><?php echo $fetch_user['name']; ?></span>
                </div>
                <div>
                    <label>Email:</label>
                    <span><?php echo $fetch_user['email']; ?></span>
                </div>
                <div>
                    <label>Address:</label>
                    <span><?php echo $fetch_user['address']; ?></span>
                </div>
            </section>
            <section class="enrolled-courses">
                <h2>Enrolled Courses</h2>
                <ul>
                    <li>Course 1</li>
                    <li>Course 2</li>
                    <li>Course 3</li>
                    <li>Course 4</li>
                    <li>Course 5</li>
                </ul>
            </section><br>
            <a href="signup.php" class="sign">Register</a>
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are you sure you want to logout?');" class="sign">Logout</a>

        </main>

        <footer>
            <p>&copy; My Eduford Website 2023</p>
        </footer>
    
        </body>
    </html>