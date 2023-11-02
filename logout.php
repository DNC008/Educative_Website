<?php
include 'config.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
    unset($user_id);
    session_destroy();
    header('location:index.php');
}
?>