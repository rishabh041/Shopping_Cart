
<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
<form method="post" action=""="<?php echo base_url(); ?>users/register">
   <div class="form-group">
     <label>First Name:</label>
     <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name" >
   </div>
   <div class="form-group">
     <label>Last Name:</label>
     <input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name" >
   </div>
   <div class="form-group">
     <label>Email:</label>
     <input type="email" class="form-control" name="email" placeholder="Enter Your Email" >
   </div>
   <div class="form-group">
     <label>Choose Username:</label>
     <input type="text" class="form-control" name="username" placeholder="Create a Username" >
   </div>
   <div class="form-group">
     <label>Password:</label>
     <input type="password" class="form-control" name="password" placeholder="Enter Password" >
   </div>
   <div class="form-group">
     <label>Confirm Password:</label>
     <input type="password" class="form-control" name="password2" placeholder="Re-Enter Password" >
   </div>
   <button name="submit" type="submit" class="btn btn-primary">Register</button>
 </form>
