<?php
session_start();

if(isset($_GET["threadid"]) && isset($_GET["usrid"]) && isset($_SESSION["usrLoggedin"])){
 include "_dbconnect.php"; 
 $thread_id = $_GET["threadid"];
$thread_usr=$_GET["usrid"];
$headerLoc = $_GET["loca"];
 $findQuery = "SELECT * FROM `threadlist` WHERE `thread_usr`= $thread_usr AND `thread_id`= $thread_id" ;
 $findResult = mysqli_query($conn,$findQuery);
 if( $usrRow= mysqli_fetch_assoc($findResult)){
    $thread_catid=$usrRow["thread_catid"];
    $thread_title=mysqli_escape_string($conn,$usrRow["thread_title"]);
    $thread_desc=mysqli_escape_string($conn,$usrRow["thread_desc"]);
    $tltmstamp=$usrRow["tltmstamp"];

    $del_insert = "INSERT INTO `del_backup` (`del_threadid`, `del_usrid`, `del_title`, `del_desc`, `del_catid`,`del_que_date`, `del_tmstamp`) VALUES ('$thread_id', '$thread_usr', '$thread_title', '$thread_desc','$thread_catid','$tltmstamp', current_timestamp());";
    $del_inRslt= mysqli_query($conn,$del_insert);
    if($del_inRslt){ 
    $delQuery =  "DELETE FROM `threadlist` WHERE `threadlist`.`thread_id` = $thread_id";
 $delQueryResult = mysqli_query($conn,$delQuery);
 if($delQueryResult){
    header("location: $headerLoc?delSuccess=true");
 }
 else{
    header("location: $headerLoc?delSuccess=true");
 }
 }
}
else{
   echo 'We cant delete this at the moment.';
}
//  else{
//      echo 'You cant do that..';
//  }
 header("location: $headerLoc");
}
else{
     echo 'Not Authorized';
 }

?>