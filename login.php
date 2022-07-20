<?php

@include 'config_page.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION["time"] = time();
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin.php');

      }elseif($row['user_type'] == 'user'){
      //  $_SESSION['user_id']=$row['email'];
         $_SESSION['user_name'] = $row['name'];
         $_SESSION["time"] = time();

         header('location:index2.php');

      }

   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <div class="form-container">

   <form action="" method="post">
      <h3 class="bg-light">login now</h3>
      <?php
if(isset($error)){
   foreach($error as $error){
      echo '<span class="error-msg">'.$error.'</span>';
   };
};
?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>

</div>
  </body>
</html>
