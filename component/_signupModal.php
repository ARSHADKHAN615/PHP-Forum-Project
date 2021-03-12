 <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="signupModalLabel">SignUp</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="component/_handleSignup.php" method="POST">
                     <div class="form-group">
                         <label for="Username">Username</label>
                         <input type="text" class="form-control" id="Username" name="Username">
                     </div>
                     <div class="form-group">
                         <label for="Email">Email</label>
                         <input type="email" class="form-control" id="Email" name="Email">
                     </div>
                     <div class="form-group">
                         <label for="Password">Password</label>
                         <input type="password" class="form-control" id="Password" name="Password">
                     </div>
                     <div class="form-group">
                         <label for="cPassword">Confirm Password</label>
                         <input type="password" class="form-control" id="cPassword" name="cPassword">
                     </div>
                     <div class="modal-footer">
                         <button type="reset" class="btn btn-secondary">Reset</button>
                         <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>