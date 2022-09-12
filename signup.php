<?php
session_start();
if(isset($_POST['email'])){
$servername="localhost";
$username="root";
$password="";
$dbname="moviechrome";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
  die("Connection Failed");
}
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$sql="INSERT INTO `login`(`email`, `username`, `password`) VALUES ('$email','$username','$password')";
if($conn->query($sql)==true){
  $_SESSION['username']=$username;
  header("location:Mainsec.php");
}
else{
  echo "Error: $sql <br> $conn->Error";
}
$conn->close();
}
?>
