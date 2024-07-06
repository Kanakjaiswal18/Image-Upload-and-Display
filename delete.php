<?php
include("connect.php");
$id= $_GET['id']; 
$query="SELECT file from images where id=".$id;
$sqlquer=mysqli_query($conn,$query);
$name = mysqli_fetch_assoc($sqlquer);
$folder = 'images/'.$name['file'];
unlink($folder);

$sql = "DELETE from images where id=".$id;
$result=   mysqli_query($conn, $sql); 
if($result=   mysqli_query($conn, $sql)){
	header('Location: index.php');
}

?>