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
  <?php
    $id = $_POST['id'];
    $query="SELECT * from user_form WHERE id='$id'";
    $query_run=mysqli_query($conn,$query);
    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
        ?>
        <div class="container">
          <div class="jumbotron">
          <h2>Update User</h2>
          <hr>
          <form class="" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">User Name:</label>
              <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder="Enter User Name">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Email:</label>
              <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Enter Status">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Password:</label>
              <input type="text" name="password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Enter Catagory">
            </div>
            <br>
            <button type="submit" name="update" class="btn btn-primary">Update Data</button>
            <a href="admin.php" class="btn btn-danger">Back</a>
          </form>
          <?php
          if (isset($_POST['update'])) {
            $bn =$_POST['name'];
            $bs =$_POST['email'];
            $ba =$_POST['password'];
            $bc=md5($ba);

            $qq = "UPDATE user_form SET name='$bn', email='$bs', password='$bc' WHERE id='$id' ";
            $query_run = mysqli_query($conn,$qq);
            if ($query_run) {
              echo '<script> alert("User Updated")</script>' ;
              header("location:users.php");
            }
            else {
              echo '<script>alert("User  Not Updated")</script>';
            }
           ?>
        </div>
      </div>
        <?php
      }
    }
  }
    else {
      echo '<script>alert("Data  Not Found")</script>';
    }
   ?>
</body>
</html>
