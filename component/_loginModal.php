 <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="loginModalLabel">Login</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="component/_handleLogin.php" method="POST">
                     <div class="form-group">
                         <label for="Username">Username</label>
                         <input type="text" class="form-control" id="Username" name="Username">
                     </div>
                     <div class="form-group">
                         <label for="Password">Password</label>
                         <input type="password" class="form-control" id="Password" name="Password">
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