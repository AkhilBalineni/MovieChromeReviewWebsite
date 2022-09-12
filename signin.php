<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "moviechrome";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed");
}

$username = $_POST["username"];
$password = $_POST["password"];


$sql = mysqli_query($conn, "SELECT count(*) as total from login WHERE username = '".$username."' and
    password = '".$password."'");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
  $_SESSION['username']=$username;
    header("location:Mainsec.php");
}
else{
    ?>
    <script>
        alert('Login failed');
    </script>
    <?php
}
