<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign-Up to Code Burn - Online Forum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      ?>
      <div class="modal-body">
      <form action="/onforum/partials/_handleSignup.php" method="POST">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" required class="form-control" name="username" id="username" aria-describedby="usrnmHelp" placeholder="Enter Username">
    <small id="usrnmHelp" class="form-text text-muted">Choose an unique username. ('@', '.', '_', can be used)</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password"  class="form-control" name="password"  id="password" placeholder="Password">
    <small id="passHelp" class="form-text text-muted">Must contain at least a number, an uppercase letter, a lowercase letter, and at least 8 characters</small>
    <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password"  class="form-control" name="cpassword"  id="cpassword" placeholder="Confirm Password">
    <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>