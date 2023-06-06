<?php
 if($user == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=users");
 }
?>
<script>
 function validateForm() {

  var confirmpasswordInput = document.getElementById("confirmpassword");
  var passwordInput = document.getElementById("password");
 // Perform password validation
    var password = passwordInput.value;
    var confirmpassword = confirmpasswordInput.value; 
    if (password.length < 8) {
      alert("Password must be atleast 8 characters long");
      return false;
    }
    if(password != confirmpassword){
        alert("Password does not match!");
        return false;
    }
    return true;
 }
</script> 
<h3>Registration</h3>
<p> Complete the form below and press the save button!</p>
<div id="form-block">
    <form method="POST" id="userform" onsubmit="return validateForm(event)" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name.." required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.." required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" class="input" name="phone" placeholder="Your phone number..">

            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" placeholder="Your address..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="staff">Staff</option>
              <option value="supervisor">Supervisor</option>
              <option value="Manager">Manager</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email.."required>
        
            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.."required>

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.."required>
</div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>