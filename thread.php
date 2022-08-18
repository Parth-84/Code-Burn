<?php

if(!isset($_SESSION["usrLoggedin"])){
  $loggedin = false;
}
if(isset($_SESSION["usrLoggedin"])){
  session_start();

  $loggedin = true;
}

// if($_SERVER["REQUEST_METHOD"]=="POST"){
    $Posted = false;
if(isset($_GET['query'])){
 include "partials/_dbconnect.php"; 
 $gt_thrd_id = $_GET['query'];
}
// if(isset($_GET['user'])){
//  $username = $_GET['user'];
// }

if(isset($_POST["addCmnt"])){
  // session_start();
    $comment= mysqli_escape_string($conn,$_POST["addCmnt"]);
    $comment_by = $_POST["pno"];
    // echo $thread_title;

    $addThreadQuery = "INSERT INTO `threads` (`comment_to`, `tmstamp`, `comment`, `comment_by`) VALUES ('$gt_thrd_id', current_timestamp(), '$comment', '$comment_by');";
$result = mysqli_query($conn,$addThreadQuery);
if($result){
    $Posted = True;
}
else{
    $err= mysqli_error($conn);
    echo 'Error'.$err;
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Code Burn | Categories</title>
  </head>
  <body>
<?php
 include "partials/_headerbar.php"; 
 if($Posted){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> You have succesfully added a comment.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
?>
<?php
 if(!$conn){
    echo 'No connection';
}
else{
        $findQuery = "SELECT * FROM `threadlist` WHERE `thread_id`=$gt_thrd_id";
        $result = mysqli_query($conn,$findQuery);
        $quRow = mysqli_num_rows($result);
        if($quRow>0){
        $row = mysqli_fetch_assoc($result);
           $thread_id = $row['thread_id'];
           $thread_title= $row['thread_title'];
           $thread_descrip= $row['thread_desc'];
           $thread_usrid = $row['thread_usr'];
           $thread_timestamp = $row["tltmstamp"];
          //  $thread_date = date("d-m-y H:i:s",$row["tltmstamp"]);
          $thread_date = strtotime($thread_timestamp);
           $thread_PHP_date = date("d-F-y | H:i:s", $thread_date);
          //  echo $thread_usrid;
           $selectUsrQuery = "SELECT * FROM `users` WHERE `usr_no`= $thread_usrid";
           $resultQ = mysqli_query($conn,$selectUsrQuery);
           $row2 = mysqli_fetch_assoc($resultQ);
          //  echo mysqli_error($conn);
          // echo var_dump($row2);
           $thread_usrname = $row2["usr_name"];
           
echo '<div class="container my-3">
<div class="jumbotron">
<h1 class="display-4">Q: '.$thread_title.'</h1>
<h5 class="mt-5">'.$thread_descrip.'</h5>

<p class="lead mt-5">
posted by: <span class="font-weight-bold">'.$thread_usrname.'</span> on <span class="font-weight-bold">'.$thread_PHP_date.' 
</span> </p>
<hr class="my-2">
  <p><span class="font-weight-bold">Note:</span> No use of explicit, obscene or vulgar language or images and/or messages, including racist remarks. 
 

</div>
</div>';
        }
        else{
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Results Found</h1>
        </div>
      </div>';
          exit;
        }
}
?>

<div class="container">

<h2 class="mb-3" >Post a comment</h2>
<?php
if($loggedin){
echo '
<form action="'.$_SERVER["REQUEST_URI"].'" class="form-inline my-2 my-lg-0 " method="POST">
    <input class="form-control mr-sm-2" type="text" name="addCmnt" style="width:80%;" placeholder="Add a comment">

    <input type="hidden" class="form-control" name="pno" id="pno" value='.$_SESSION["usrname"].'>
    <button class="btn btn-primary my-2 my-sm-0 mx-2" id="quessubmit" name="quessubmit" type="submit">Post</button>
</form>';
}
else{
  echo '<p>Login to post a comment.</p>';
}
?>
<h2 class="my-3" >Other Comments</h2>

<?php
$getCommentQuery = "SELECT * FROM `threads` WHERE `comment_to`=$gt_thrd_id";
$result = mysqli_query($conn,$getCommentQuery);
$numRows = mysqli_num_rows($result);
if($numRows>0){
while($row = mysqli_fetch_assoc($result)){
//    $catid = $row['cat_id'];
   $comment = $row['comment'];
   $comment_by = $row['comment_by'];
   $tmstamp = $row['tmstamp'];
   $thread_cdate = strtotime($tmstamp);
   $thread_PHP_cdate = date("d-m-y H:i", $thread_cdate);
//    $threadId = $row['thread_id'];
   echo '<div class="media my-3">
   <img class="mr-3" src="img/userimg.png" style="width:70px" alt="Generic placeholder image">
   <div class="media-body">
   <span class="mt-0 mb-0 font-weight-light"><span class="font-weight-bold">'.$comment_by.'</span></span><span class="font-weight-light" style="float:right;"> <span class="font-italic">posted on: </span>'.$thread_PHP_cdate.'</span>
     <p class="lead-sm mt-0 mb-0">'.$comment.'</p>
   </div>
 </div>';}
}
else{
       echo '<div class="jumbotron jumbotron-fluid">
       <div class="container">
         <h1 class="display-4">No Results Found</h1>
         <p class="lead">Be the first to answer this question.</p>
       </div>
     </div>';
   }
?>

</div>
<div class="footerc bg-dark py-2 mt-4" style="width: 100%; text-align: center;">
        <p class="mb-0" style="color:#fff;">&copy; Copyrights 2021 | Code Burn - Parth Parmar</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    // To stop resubmission of form data on refresh
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>
  </body>
  <!-- <input type="hidden" class="form-control" name="sno" id="sno" value="'.$_SESSION["usrname"].'" > -->
</html>