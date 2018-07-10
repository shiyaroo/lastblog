<?php
session_start();
require_once('dbconnect.php');
$errors = array();
//check the name
if(isset($_POST['check_name'])){
 $check_name = strip_tags($_POST['check_name']);
 $sql = $conn->query("SELECT * FROM users WHERE username='$check_name'");
 $count = $sql->num_rows;
 if($count >0){
  array_push($errors,"username already exists");
  ?>
  <div class="error_report">
  <p>Username exists</p>
  </div>
  <?php
 }
 else if(!preg_match('/^[0-9a-zA-z_]{5,}$/',$check_name)){
  array_push($errors,"username must contains 5 characters");
  ?>
  <div class="error_report">
  <p>Username must have 5 characters</p>
  </div>
  <?php
 }
 else{
  ?>
  <div class="success_report">
  <p>OK</p>
  </div>
  <?php
 }
 if(count($errors) == 0){
  $_SESSION['username'] = 'No error';
 }
 else{
  foreach($errors as $error){
   $_SESSION['username'] = $error;
  }
 }
}
?>
//check the mail

<?php
if(isset($_POST['check_email'])){
 $check_email = strip_tags($_POST['check_email']);
 $sql_email = $conn->query("SELECT * FROM users WHERE email='$check_email'");
 $count_email = $sql_email->num_rows;
 if($count_email >0){
  array_push($errors,"Email already exists");
  ?>
  <div class="error_report">
  <p>Email exists</p>
  </div>
  <?php
 }
 else if(!filter_var($check_email, FILTER_VALIDATE_EMAIL)){
  array_push($errors,"Invalid email format");
  ?>
  <div class="error_report">
  <p>Invalid email format</p>
  </div>
  <?php
 }
 else{
  ?>
  <div class="success_report">
  <p>All done</p>
  </div>
  <?php
 }
 if(count($errors) == 0){
  $_SESSION['email'] = 'No error';
 }
 else{
  foreach($errors as $error){
   $_SESSION['email'] = $error;
  }
 }
}
?>
// check the password

<?php
if(isset($_POST['check_pass'])){
 $password = strip_tags($_POST['check_pass']);
 if(!preg_match('/^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z]).*$/',$password)){
  array_push($errors,"Password must contains 0-9 a-z A-z");
  ?>
  <div class="error_report">
  <p>Password must contains 0-9 a-z A-Z</p>
  </div>
  <?php
 }
 else{
  ?>
  <div class="success_report">
  <p>Well done</p>
  </div>
  <?php
 }
 if(count($errors) == 0){
  $_SESSION['password'] = 'No error';
 }
 else{
  foreach($errors as $error){
   $_SESSION['password'] = $error;
  }
 }
}
?>
// match password

<?php
if(isset($_POST['match_password'])){
 $match_password = strip_tags($_POST['match_password']);
 $retype_password = strip_tags($_POST['retype_password']);
 if($retype_password == $match_password){
  ?>
  <div class="success_report">
  <p>Matched</p>
  </div>
  <?php
 }
 else{
  array_push($errors,"Not matched");
  ?>
  <div class="error_report">
  <p>Not matched</p>
  </div>
  <?php
 }
 if(count($errors) == 0){
  $_SESSION['matched'] = 'No error';
 }
 else{
  foreach($errors as $error){
   $_SESSION['matched'] = $error;
  }
 }
}
?>