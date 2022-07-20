<?php

@include 'config_page.php';

session_start();
if (time() - $_SESSION["time"] > 300) {
    session_unset();
    session_destroy();
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>
</head>
<body>
        <div class="container">
          <div class="jumbotron">
          <h2>Insert Data</h2>
          <hr>
          <form class="" action="" method="post">
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">User Name:</label>
              <input type="text" name="name" class="form-control" value="" placeholder="Enter User Name">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Email:</label>
              <input type="email" name="email" class="form-control" value="" placeholder="Enter Email">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Password:</label>
              <input type="password" name="password" class="form-control" value="" placeholder="Enter Password">
            </div>
            <br>
            <button type="submit" name="Add" class="btn btn-primary">Insert Data</button>
            <a href="admin.php" class="btn btn-danger">Back</a>
          </form>
        </div>
      </div>
</body>
</html>
<?php
if (isset($_POST['Add'])) {
  $bn =$_POST['name'];
  $bs =$_POST['email'];
  $bb =$_POST['password'];
  $bc=md5($bb);
  $qq = "INSERT INTO `user_form`(`name`, `email`, `password`) VALUES('$bn','$bs','$bc')";
  $query_run = mysqli_query($conn,$qq);
  if ($query_run) {
    echo '<script> alert("User Added")</script>' ;
    header("location:users.php");
  }
  else {
    echo '<script>alert("User  Not Added")</script>';
  }
}
 ?>
