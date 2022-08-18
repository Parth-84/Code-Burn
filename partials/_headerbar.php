<?php
    session_start();
    if(!isset($_SESSION["usrLoggedin"])){
      $loggedin = false;
    }
    if(isset($_SESSION["usrLoggedin"])){
      $loggedin = true;
      $username = $_SESSION["usrname"];
    }

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/onforum/index.php">Code Burn</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active indexli">
      <a class="nav-link" href="/onforum/index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item aboutli">
      <a class="nav-link" href="/onforum/about.php">About</a>
    </li>
    <li class="nav-item dropdown catli">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top-Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      if(!$conn){
        echo 'No Connection';
    }
    else{
        $selectQuery = "SELECT * FROM `categories` LIMIT 5";
        $result = mysqli_query($conn,$selectQuery);
        while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?gcatid='.$row["cat_id"].'">'.$row["cat_name"].'</a>';
        }
      }
      echo '</div>
    </li>
    <li class="nav-item contactli">
      <a class="nav-link" href="/onforum/contact.php">Contact</a>
    </li>
  </ul>
  <form action="/onforum/searchText.php" method="POST" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" name="searchText"  id="searchText" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary my-2 my-sm-0" name="submitSearch" type="submit">Search</button>
    ';
    if(!$loggedin){
      echo '<button class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#loginModal" type="button">Login</button>
      <button class="btn btn-outline-primary mx-2" data-toggle="modal" data-target="#signupModal" type="button">Sign-Up</button>';}
      
      if($loggedin){
        // echo '<p class"mb-0">Welcome - '.$username.'</p>';
      echo '<button class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#logoutModal" type="button">Logout</button>';}
  echo'</form>
</div>
</nav>';
include "/xampp/htdocs/onforum/partials/_signupModal.php";
include "/xampp/htdocs/onforum/partials/_loginModal.php";
include "/xampp/htdocs/onforum/partials/_logoutModal.php";
include "/xampp/htdocs/onforum/partials/_delThreadModal.php";

// $_GET["login"]=false;
// $loggedin=false;




?>