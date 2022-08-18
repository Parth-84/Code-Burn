<?php
 include "partials/_dbconnect.php"; 

if(isset($_GET["token"])){
    $token= $_GET["token"];
   
}
if(isset($_GET["usr_name"])){
    $usr_nme= $_GET["usr_name"];
}
else{
    echo "No";
    // header("location:/onforum/index.php ");
}

$searchQuery = "SELECT * FROM `users` WHERE `users`.`usr_name` LIKE '".$usr_nme."'";
$result= mysqli_query($conn,$searchQuery);
// print_r($result) ;
if($result){
    // while($row = mysqli_fetch_assoc($result)){
    //     echo "Entered";
    //     $usr_no = $row['usr_no'];
    // $updateQuery = "UPDATE `users` SET `usr_status` = 'active' WHERE `users`.`usr_no` = $usr_no";
    $updateQuery = "UPDATE `users` SET `usr_status` = 'active' WHERE  `users`.`usr_name` LIKE '".$usr_nme."'";
    $updateRow = mysqli_query($conn,$updateQuery);
    header("location:/onforum/index.php?activated=true");
    // }
}
else{
    header("location:/onforum/index.php ");
}   


?>