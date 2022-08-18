<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include "_dbconnect.php";
    if(!$conn){
        die("Sorry we could not connect to the database");
    }
 
    // $username = mysqli_escape_string($conn,$_POST["loginusername"]);
    // $userpass =  mysqli_escape_string($conn,$_POST["loginpassword"]);
    $username = $_POST["loginusername"];
    $userpass = $_POST["loginpassword"];
    $getloc = $_GET["loc"];

    
    $selectQuery = "SELECT * FROM `users` WHERE `usr_name` = '$username'";
    $result = mysqli_query($conn,$selectQuery);
    $numRow = mysqli_num_rows($result);

    if($numRow == 1){
        $row = mysqli_fetch_assoc($result);
        // echo var_dump($result);
        // $dbusrpass = $row['usr_password'];
        // P A R T H
        // P A R M A R
        // $bcrypt = password_hash($userpass,PASSWORD_BCRYPT);
        if(password_verify($userpass,$row['usr_password'])){
        // if($bcrypt == $row['usr_password']){
            session_start();
            $_SESSION["usrLoggedin"]=true;
            $_SESSION["usrname"]=$row['usr_name'];
            $_SESSION["usrid"]= $row['usr_no'];
            $token = $row['usr_token'];
        //     header("location: /onforum/index.php?usrtoken=$token");
        //    if(($getloc == "localhost/onforum/index.php")){
        //     header("location: /onforum/index.php?login=true");}
        //     else{
        //     header("location: $getloc&user=$username");
        //     }
            header("location: /onforum/index.php?cred=true");

        }
        else{
            header("location: /onforum/index.php?passFalse=true");
        }
    }
    else{
        header("location: /onforum/index.php?nousr=true");
        // echo $numRow;
    }
}
?>