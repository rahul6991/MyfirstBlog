<?php 
session_start();
include('conn.php');
$uname=$_POST['name'];
$pass=$_POST['pass'];



$sql="Select * from signup where name='$uname' AND passs='$pass' "; 
$result=$conn->query($sql);
$_SESSION['name']=$_POST['name'];
header("Location:home.php");


 ?>