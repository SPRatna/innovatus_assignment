<?php

$con = mysqli_connect('localhost','root','','innovatus') or die(mysqli_error($con));
if($con ==FALSE){
    die("Connection failed due to".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <script type="text/javascript" src="bootstrap/js/jQuery v3.5.1.js"></script>
        <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<title>Innovatus | Assignment</title>
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">Logo</a>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
  <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Innovatus Assignment</a>
      </li>
    </ul>
  </div>
</nav>
<!--Registration Form--->
<div class="container shadow">
  <h2 class="text-center mt-5 text-warning mb-5"><u>Register Here</u></h2>
  <?php
  if(isset($_POST['register'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $state=$_POST['state'];
  $pin=$_POST['pincode'];
  $phone=$_POST['phone'];
  
  $query="INSERT INTO `user`(`name`, `email`, `address`, `state`, `pin`, `phone`, `status`) VALUES('$name', '$email', '$address', '$state', '$pin', '$phone', '1')";
  if (mysqli_query($con,$query)) {
  echo '<script>alert("User Has Been Successfully Added.");window.location.assign("index.php");</script>';
  }
  else {
  //echo '<script>alert("Invalid data type");window.location.assign("index.php");</script>';
  echo mysqli_error($con);
  }
  }
  ?>
  <form action="" method="POST" class="needs-validation" novalidate>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom01">Full Name</label>
        <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="Full Name"required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please enter your full name.
        </div>
      </div>
      <!-- <div class="col-md-6 mb-3">
        <label for="validationCustom02">Last name</label>
        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div> -->
      <div class="col-md-6 mb-3">
        <label for="validationCustomUsername">Email/Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
          <input type="email" class="form-control" name="email" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationCustom03">Address</label>
        <input type="text" class="form-control" name="address" id="validationCustom03" placeholder="H.No/Village, Post, Police Station, District, City" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom04">State</label>
        <input type="text" class="form-control" name="state" id="validationCustom04" placeholder="State" required>
        <div class="invalid-feedback">
          Please provide a valid state.
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom05">Pin Code</label>
        <input type="text" class="form-control" name="pincode" id="validationCustom05" placeholder="Pincode" required>
        <div class="invalid-feedback">
          Please provide a valid pincode.
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationCustom01">Phone</label>
        <input type="phone" class="form-control" name="phone" id="validationCustom11" placeholder="987654321" minlength="10" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please enter valid contact no.
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          Agree to terms and conditions
        </label>
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>
    <button class="btn btn-primary mb-5" type="submit" name="register">Submit form</button>
  </form>
</div>
<div class="container shadow">
  <h2 class="text-center mt-5 text-warning"><u>Users List</u></h2>
  <table class="table table-hover mt-5 mb-5">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">State</th>
        <th scope="col">Pincode</th>
        <th scope="col">Contact</th>
      </tr>
    </thead>
    <?php $result = $con ->query("SELECT * FROM `user` where `status`='1' ORDER BY `id` DESC") or die($con ->error);
    while ($row = $result ->fetch_assoc()):
    ?>
    <tbody>
      <tr>
        <th scope="row"><?php echo $row['id']; ?></th>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['state']; ?></td>
        <td><?php echo $row['pin']; ?></td>
        <td><?php echo $row['phone']; ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
'use strict';
window.addEventListener('load', function() {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
form.addEventListener('submit', function(event) {
if (form.checkValidity() === false) {
event.preventDefault();
event.stopPropagation();
}
form.classList.add('was-validated');
}, false);
});
}, false);
})();
</script>
</body>
</html>