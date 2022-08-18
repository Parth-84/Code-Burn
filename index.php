<?php

// session_start();
if((!isset($_SESSION['usrLoggedin'])) || ($_SESSION['usrLoggedin']!=true)){
//   header("location: index.php");
}
// echo $_SESSION['usrloggedin'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/style.css">
    <title>Code Burn | Online Forum</title>
</head>

<body>
    <?php
 include "partials/_dbconnect.php"; 
 include "partials/_headerbar.php"; 

if(isset($_GET["usrnameavail"])=="false"){
    echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
    <strong>Sorry!</strong> This username is unavailable at the moment.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET["invalid"])){
    echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    <strong>Error!</strong> Passwords do not match.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET["passFalse"])){
    echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    <strong>Error!</strong> Invalid credentials.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET["nousr"])=="true"){
    echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    <strong>Error!</strong> Username not found.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET["success"])=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <strong>Success!</strong> You are succesfully signed up. Please check your mail to activate.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_GET["activated"])=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <strong>Success!</strong> Your account is activated you may login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if(isset($_SESSION["usrLoggedin"]) && (isset($_GET["cred"]))){
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <strong>Success!</strong> You are succesfully logged in as <span class="font-weight-bold">"'.$_SESSION["usrname"].'"</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
//   if(isset($_GET["user"])){
  
// }
?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner caroHeight " s>
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: auto; max-width: 100%;" src="img/i-4.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" style="height: auto; max-width: 100%;" src="img/i-5.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" style="height: auto; max-width: 100%;" src="img/i-1.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container my-2">
        <h1 class="text-center">Browse Categories</h1>

        <div class="row my-3 mx-0">
            <?php
            if(!$conn){
                echo 'No Connection';
            }
            else{

                $selectQuery = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$selectQuery);
                while($row = mysqli_fetch_assoc($result)){
                echo '<div class="col-md-4 my-2">
                <div class="card cardWidth">
                <img class="card-img-top" src="img/img-'.$row["cat_id"].'.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title"><a href="threadlist.php?gcatid='.$row["cat_id"].'">'.$row["cat_name"].'</a></h5>
                <p class="card-text">'.substr($row["cat_desc"],0,90).'...</p>
                <a href="threadlist.php?gcatid='.$row["cat_id"].'" class="btn btn-primary">Learn More</a>
                </div>
                </div>
                </div>';
                }
            }
                
?>

        </div>
    </div>
    <div class="footerc bg-dark py-2 mt-4" style="width: 100%; text-align: center;">
        <p class="mb-0" style="color:#fff;">&copy; Copyrights 2021 | Code Burn - Parth Parmar</p>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./static/script.js">
    // To stop resubmission of form data on refresh
    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, "http://localhost/onforum/index.php");
    //     // window.location = "";
    // }
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>

</html>