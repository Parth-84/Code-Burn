// $showEmailChangeAlert = false;
    // $showNameChangeAlert = false;
    // $showPassChangeAlert = false;
    // $showSuccess= false;
    // $showError= false;
if($showEmailChangeAlert){
     echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
     <strong>Wooh!</strong> You already have an account wuth this email .
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
if($showNameChangeAlert){
     echo '<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
     <strong>Sorry!</strong> This username is unavailable at the moment.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
if($showPassChangeAlert){
     echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
     <strong>Error!</strong> Passwords do not match.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
if($showSuccess){
     echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
     <strong>Success!</strong> You are succesfully signed up. Please check your mail to activate.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
if($showError){
     echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
     <strong>Success!</strong> You have succesfully posted a question.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
 }
