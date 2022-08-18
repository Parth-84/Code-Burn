<?php
    if(!isset($_SESSION["usrLoggedin"])){
      $loggedin = false;
    }
    if(isset($_SESSION["usrLoggedin"])){
      session_start();
      $loggedin = true;
      $username = $_SESSION["usrname"];
    }
    $Posted = false;
    if(isset($_GET['gcatid'])){
      include "partials/_dbconnect.php"; 
      $gcatid = $_GET['gcatid'];
    }
    // if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["askQues"])){
    $thread_title= mysqli_escape_string($conn,$_POST["askQues"]);
    $thread_descrip= mysqli_escape_string($conn,$_POST["elabQues"]);
    $thread_catid=   $gcatid;
    $thread_usrid = $_POST["ueno"];
    // echo var_dump($_POST["usrno"]);
    // echo $thread_title;
    $addThreadQuery = "INSERT INTO `threadlist` (`thread_catid`, `thread_usr`, `thread_title`, `tltmstamp`,`thread_desc`) VALUES ('$thread_catid', '$thread_usrid', '$thread_title', current_timestamp(),'$thread_descrip');";
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
     <strong>Success!</strong> You have succesfully posted a question.
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
        $findQuery = "SELECT * FROM `categories` WHERE `cat_id`=$gcatid";
        $result = mysqli_query($conn,$findQuery);
       if($row = mysqli_fetch_assoc($result)){
           $catid = $row['cat_id'];
           $catname = $row['cat_name'];
           $catdesc = $row['cat_desc'];
echo '<div class="container my-3">
<div class="jumbotron">
  <h1 class="display-4">'.$catname .'</h1>
  <p class="lead">'.$catdesc .'</p>
  <hr class="my-4">
  <p><span class="font-weight-bold">Note:</span> No use of explicit, obscene or vulgar language or images and/or messages, including racist remarks. 
 
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
</div>';

 }
}
?>

<div class="container">

<h2 class="mb-3" >Ask a question</h2>
<?php
if($loggedin){
echo '<form action="'.$_SERVER["REQUEST_URI"].'" class="form-inline my-2 my-lg-0" method="POST">
<div class="form-group container mb-0 ">
<input class="form-control mr-sm-2" type="text" name="askQues" style="width:80%;" placeholder="Enter a title">
</div>
<div class="form-group container my-2">
    <textarea class="form-control" name="elabQues" id="exampleFormControlTextarea1" style="width:80%;" rows="3" placeholder="Elaborate your concern.." ></textarea>
  </div>
  <input type="hidden" class="form-control" name="ueno" id="ueno" value='.$_SESSION["usrid"].'>   
  <div class="form-group container ">
 <button class="btn btn-primary my-2 my-sm-0" id="threadsubmit" name="threadsubmit" type="submit">Post</button>
</div>
 </form>';}
else{
  echo '<p>Login to ask a question.</p>';
}
?>
<h2 class="mt-3">Questions</h2>
<?php
$getThreadQuery = "SELECT * FROM `threadlist` WHERE `thread_catid`=$gcatid";
$result = mysqli_query($conn,$getThreadQuery);
$numRows = mysqli_num_rows($result);
if($numRows>0){
while($row = mysqli_fetch_assoc($result)){
//    $catid = $row['cat_id'];
   $threadTitle = $row['thread_title'];
   $threadId = $row['thread_id'];
   $thread_usr = $row['thread_usr'];
   $thread_desc = $row['thread_desc'];
   echo '<div class="media my-2">
   <img class="mr-3" src="img/userimg.png" style="width:70px" alt="Generic placeholder image">
   <div class="media-body">
     <h5 class="mt-0 mb-0"><a href="thread.php?query='.$threadId.'" style="text-decoration: none">'.$threadTitle.'</a></h5>
     <p class="mt-0 mb-0">'.$thread_desc.'<p>
   </div>';
   $usrQuery = "SELECT * FROM `users` WHERE `usr_no`=$thread_usr";
   $usrResult = mysqli_query($conn,$usrQuery);
   $usrRow= mysqli_fetch_assoc($usrResult);
   if(isset($_SESSION["usrLoggedin"]) && $_SESSION["usrname"] == $usrRow["usr_name"]){
     $usr_id =  $usrRow["usr_no"];
    //  $sendLoc = 
   echo'
   
   <span><a href="partials/_handleQueDelete.php?threadid='.$threadId.'&usrid='.$thread_usr.'&loca='.htmlentities($_SERVER["REQUEST_URI"]).'">Delete</a></span>';
   }
  
   echo'</div>';
}
}
else{
       echo '<div class="jumbotron jumbotron-fluid">
       <div class="container">
         <h1 class="display-4">No Results Found</h1>
         <p class="lead">Be the first to ask a question.</p>
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
</html>