<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Code Burn | Contact Us</title>
  </head>
  <body>
 <?php 
 include "partials/_dbconnect.php"; 
 
 include "partials/_headerbar.php"; ?> 
  
  <div class="container my-4">

  <?php
if($_SERVER["REQUEST_METHOD"]=="POST" || isset($_COOKIE["searchText"])){

  $_COOKIE["searchText"] = $_POST["searchText"];
    $searchText=$_COOKIE["searchText"];
    // echo $searchText;
echo '<h1 class="font-weight-light mb-4"> Search Results for: <span ><b>"'.$searchText.'"</b></span></h1>';
echo '<hr>';
    $searchQuery = "SELECT * FROM `threadlist` WHERE MATCH (`thread_title`) AGAINST ('$searchText')";
    $searchResult = mysqli_query($conn,$searchQuery);
    $numSearchRows = mysqli_num_rows($searchResult);
    if($numSearchRows>0){
        while($resultRow = mysqli_fetch_assoc($searchResult)){
            $thread_id = $resultRow["thread_id"];
            echo '<h4><a href="/onforum/thread.php?query='.$thread_id.'">'.$resultRow["thread_title"].'</a></h4>
            <h6>'.$resultRow["thread_desc"].'</h6><hr>';
        }
    }
    else{
        echo '<div class="jumbotron my-4 jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Results Found</h1>
          <p class="lead"></p>
        </div>
      </div>';
    }
    // unset($_POST);
}
?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    // To stop resubmission of form data on refresh
  if ( window.history.replaceState ) {
      // hreff = "/onforum/partials/"
  window.history.replaceState( null, null, window.location.href );
}
let hidb = document.getElementsByClassName('.hidb');
hidb.style.display = none;
  </script>
  </body>
</html>