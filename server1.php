<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', 'usbw', 'blog-task');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($conn, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: posts.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($conn, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: posts.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: posts.php');
}


	$results = mysqli_query($conn, "SELECT * FROM info");


?>