<?php  

$conn = new mysqli("localhost","root","usbw","blog-task");
if($conn->connect_error){
 die($conn->connect_error);
}
?>