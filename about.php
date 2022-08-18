<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/about.css">
    <title>Code Burn | About Us</title>
  </head>
  <body>
<?php
 include "partials/_dbconnect.php"; 
 include "partials/_headerbar.php"; 
 echo '<div class="jumbotron jumbotron-fluid">
 <div class="container">
   <h1 class="display-4">About Us</h1>
 </div>
</div>';
?>
<div class="headContainer">
  <h1>Code Burn</h1>
  <p>An online forum website, serves as a resource to help developers of all skillsets.<br> Our mission is to help each other learn, build and share using code. </p>
</div>
<div class="imgContainer">
  <img src="./img/c-7.png" alt="">
</div>
<h1 class="mt-5 text-center">Who we are?</h1>
 <div class="midCo mt-2">
<div class="col-md-4 cardMidco mt-2 mb-2" id="midcoCenterF">
  <img src="./img/c-14.png" alt="">
</div>
<div class="col-md-4 cardMidco mt-2 mb-2" id="midcoCenter">
  <h1>Helping developers and computer engineers write the script of the future.</h1>
</div>
</div>
<div class="afmid mt-4">
<div class="col-md-4 inafmid mt-2 mb-2 text-center">
  <p>Created and developed by <em>"Parth Parmar"</em>. This is just a practice project work. Lorem ipsum dolor sit amet consectetur adipisicing quod eum, nulla ex laborum accusamus incidunt debitis est velit nam quis ea magni sint quisquam officiis repudiandae nisi repellendus provident qui recusandae vel? Ex!</p>
</div>
<div class="col-md-4 inafmid mt-2 mb-2">
<img src="./img/c-6.png" alt="">
</div>

</div>
<footer class="footercontainer mt-4">
  <p class="mb-0">&copy; Copyrights 2021 | Code Burn - Parth Parmar</p>
</footer>
 <script>
   var aboutli = document.getElementsByClassName("aboutli");
   var contactli = document.getElemenstByClassName('contactli');
   var catli = document.getElementsByClassName('catli');
   var indexli = document.getElementsByClassName('indexli');
   aboutli.classList.add('active'); 
   contactli.classList.remove('active'); 
   catli.classList.remove('active'); 
   indexli.classList.remove('active'); 
 </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>