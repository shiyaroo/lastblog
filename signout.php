<?php

session_start();
if(!isset($_SESSION['user_id'])){
 header("Location: login.php");
}
if(isset($_GET['signout'])){
 session_destroy();
 unset($_SESSION['user_id']);
 header("Location: login.php");
}