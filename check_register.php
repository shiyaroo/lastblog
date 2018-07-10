<?php
session_start();
require_once('dbconnect.php');
$register_errors = array();
// registeration
 if(isset($_POST['reg_name'])){
  $uname = strip_tags($_POST['reg_name']);
  $email = strip_tags($_POST['reg_email']);
  $upass = strip_tags($_POST['reg_pass']);
  
  $uname = $conn->real_escape_string($uname);
  $email = $conn->real_escape_string($email);
  $upass = password_hash($conn->real_escape_string($upass), BCRYPT);
  
  // get the error messages
  
  $username_error = $_SESSION['username'];
  $email_error = $_SESSION['email'];
  $password_error = $_SESSION['password'];
  $matched_error = $_SESSION['matched'];
  
  if($username_error !== "No error"){
   array_push($register_errors, $username_error);
  }
  if($email_error !== "No error"){
   array_push($register_errors, $email_error);
  }
  if($password_error !== "No error"){
   array_push($register_errors, $password_error);
  }
  if($matched_error !== "No error"){
   array_push($register_errors, $matched_error);
  }
  if(count($register_errors) == 0){
   $register = $conn->query("INSERT into users(username,email,password) VALUES('$uname','$email','$upass')");
   if($register){
    ?>
    <div class="success_report">
    <p>Registered</p>
    </div>
<?php
   }
   else{
    ?>
    <div class="error_report">
    <p>Error... try again later</p>
    </div>
<?php
   }
  }
 

 else{
		 foreach($register_errors as $register_error){
			 ?>
			 <div class="error_report">
			 <p>
			
			<?php
 echo $register_error."<br />"; ?>
                         </p>
			 </div>
			 <?php
		 }
	 }




 }
?>
