<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include "/xampp/htdocs/onforum/partials/_dbconnect.php";

    if(!$conn){
        echo 'Sorry we can not make this request at the moment. Please try again later';
        exit;
    }

    $sender_name = $_POST["fname"];
    $sender_email = $_POST["contactemail"];
    $sender_phone= $_POST["phonen"];
    $sender_msg_title= $_POST["ctitle"];
    $sender_msg= $_POST["conTxt"];
    $sender_ip = $_SERVER["REMOTE_ADDR"];

    $sql = "INSERT INTO `contactmsgs` (`sender_name`, `sender_email`, `sender_phone`, `sender_msg_title`, `sender_message`, `sender_ip`, `msg_tmstamp`) VALUES ('$sender_name', '$sender_email', '$sender_phone','$sender_msg_title', '$sender_msg', '$sender_ip', current_timestamp());";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: /onforum/contact.php?msgsent=true");
    }
    else{
        echo 'Message was not sent.';
    }
}
?>