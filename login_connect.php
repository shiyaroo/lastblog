<?php
session_start();
require_once('dbconnect.php');
if(isset($_POST['logger_name'])){
 $logger_username = strip_tags($_POST['logger_name']);
 $logger_password = strip_tags($_POST['logger_pass']);
 
 $logger_username = $conn->real_escape_string($logger_username);
 $logger_password = $conn->real_escape_string($logger_password);
 
 $username_find = $conn->query("SELECT * FROM users WHERE username='$logger_username'");
 if(($username_find->num_rows) == 0){
  ?>
  <div class="error_report">
  <p>Such username doesnot exists</p>
  </div>
  <?php

 }
 else{
  $row = $username_find->fetch_array();
  if(password_verify($logger_password, $row['password'])){
   $_SESSION['user_id'] = $row['user_id'];
   $_SESSION['message'] = "you have logged in successfully";
   echo "Success";
  }
  else{
   ?>
   <div class="error_report">
   <p>Password does not match</p>
   </div>
<?php
  }
 }
}
?>