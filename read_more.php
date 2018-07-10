<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>





<body>
<?php include("connect.php");
if(isset($_GET['id'])){
$post_id=$_GET['id'];

$select_posts=" SELECT * FROM posts WHERE post_id ='$post_id' ";

$run_posts = mysql_query ($select_posts);


while ($row=mysql_fetch_assoc($run_posts)){
	
	$post_id=$row['post_id'];
	$post_title=$row['post_title'];
	$post_author=$row['post_author'];
	$post_image=$row['post_image'];
	$post_content=$row['post_content'];
	
	?>
<?php }}?>
<p align="right"> <a href="pages.php?id=<?php echo $post_id; ?>"></a></p>

</body>
</html>