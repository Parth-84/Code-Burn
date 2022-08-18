<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to Code Burn - Online Forum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/onforum/partials/_handleLogin.php?loc=<?php echo htmlentities($_SERVER["REQUEST_URI"])?>" method="POST">
  <div class="form-group">
    <label for="loginusername">Username</label>
    <input type="text"  class="form-control" name="loginusername" id="loginusername" aria-describedby="userHelp" placeholder="Enter Username">
    <!-- <input type="hidden" class="form-control" name="sno" id="sno" > -->
  </div>
  <div class="form-group">
    <label for="loginpassword">Password</label>
    <input type="password" class="form-control" name="loginpassword"  id="loginpassword" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Login</button>
</form>
  <a href="#">Forgot Password?</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>