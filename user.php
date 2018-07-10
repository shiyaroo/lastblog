<?php
session_start();
require_once('dbconnect.php');
$id = $_SESSION['user_id'];
if(!isset($id)){
 header("Location: login.php");
}
else{
 $res = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
 $userRow = $res->fetch_array();
}
?>


<html>
<head>
<title>Welcome <?php echo $userRow['username']; ?></title>
<link href="style.css" rel="stylesheet" />
</head>
<body>
<div class="user_page">
<div>
<p>Welcome <?php echo $userRow['username']; ?></p>
</div>
<div>
<p><php echo $_SESSION['message']; ?></p>
</div>
<div>
<p align="center"><a href="signout.php?signout">Signout</a></p>
</div>
</div> 
<?php
include("home.php");

 ?>
</body>
</html>
