<?php
$username = "root";
$password = "";
$servername = "localhost";
$database = "codeburn";

$conn = mysqli_connect($servername,$username,$password,$database);
$noconn = false;
if(!$conn){
    $noconn = true;
}

$showEmailChangeAlert = false;
    $showNameChangeAlert = false;
    $showPassChangeAlert = false;
    $showSuccess= false;
    $showError= false;
?>