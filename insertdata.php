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
              <label for="" style="color:blue" class="fw-bold">Book Name:</label>
              <input type="text" name="name" class="form-control" value="" placeholder="Enter Book Name">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Price:</label>
              <input type="number" name="Price" class="form-control" value="" placeholder="Enter Price">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Status:</label>
              <input type="text" name="status" class="form-control" value="" placeholder="Enter Status">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Catagory:</label>
              <input type="text" name="catagory" class="form-control" value="" placeholder="Enter Catagory">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Image:</label>
              <input type="file" name="image" class="form-control" value="" placeholder="Enter image">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold" >Description:</label>
              <input type="text" name="Description" class="form-control" value="" placeholder="Enter Description">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Author:</label>
              <input type="text" name="Author" class="form-control"  value="" placeholder="Enter Author Name">
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
  $bs =$_POST['status'];
  $bc =$_POST['catagory'];
  $bi =$_POST['image'];
  $bd =$_POST['Description'];
  $ba =$_POST['Author'];
  $bf =$_POST['Price'];
  $qq = "INSERT INTO `books`( `name`, `status`, `catagory`, `image`, `Description`, `Author`, `Price`) VALUES('$bn','$bs','$bc','$bi','$bd','$ba','$bf')";
  $query_run = mysqli_query($conn,$qq);
  if ($query_run) {
    echo '<script> alert("Data Inserted")</script>' ;
    header("location:admin.php");
  }
  else {
    echo '<script>alert("Data  Not Inserted")</script>';
  }
}
 ?>
