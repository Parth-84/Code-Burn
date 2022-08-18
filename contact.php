<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Code Burn | Contact Us</title>
    <link rel="stylesheet" href="./static/contact.css">
</head>

<body>
    <?php
 include "partials/_dbconnect.php"; 
 include "partials/_headerbar.php"; 
 if(isset($_GET["msgsent"])=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <strong>Success!</strong> Message sent successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
 echo '<div class="jumbotron jumbotron-fluid">
 <div class="container">
   <h1 class="display-4">Contact Us</h1>
 </div>
</div>';

?>

    <div class="container midC">
        <form action="/onforum/partials/_handleContact.php" method="POST" id="cform">
            <div class="form-group mt-4">
                <label for="fname">Name</label>
                <input type="text" class="form-control" name="fname" style="width:100%;" id="fname"
                    aria-describedby="fnameHelp" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="contactemail">Email Address</label>
                <input type="email" class="form-control" name="contactemail" style="width:100%;" id="contactemail"
                    aria-describedby="contactemailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phonen">Phone</label>
                <input type="tel" class="form-control" name="phonen" style="width:100%;" id="phonen"
                    placeholder="Enter phone no.">
                <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
            </div>
            <div class="form-group">
                <label for="ctitle">Title</label>
                <input type="text" class="form-control" name="ctitle" style="width:100%;" id="ctitle"
                    aria-describedby="ctitleHelp" placeholder="Message Title">
            </div>
            <div class="form-group">
                <label for="conTxt">Message</label>
                <textarea class="form-control" name="conTxt" id="conTxt" style="width:100%;" rows="3"
                    placeholder="Message.."></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="consubmit" id="cbtn" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
    <footer class="footercontainer mt-4">
        <p class="mb-0">&copy; Copyrights 2021 | Code Burn - Parth Parmar</p>
    </footer>

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
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, "http://localhost/onforum/contact.php");
    }
 
    </script>
</body>

</html>