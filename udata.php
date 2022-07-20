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
    $query="SELECT * from books WHERE id='$id'";
    $query_run=mysqli_query($conn,$query);
    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
        ?>
        <div class="container">
          <div class="jumbotron">
          <h2>Update Data</h2>
          <hr>
          <form class="" action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Book Name:</label>
              <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder="Enter Book Name">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Price:</label>
              <input type="number" name="Price" class="form-control" value="<?php echo $row['Price'] ?>" placeholder="Enter price">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Status:</label>
              <input type="text" name="status" class="form-control" value="<?php echo $row['status'] ?>" placeholder="Enter Status">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Catagory:</label>
              <input type="text" name="catagory" class="form-control" value="<?php echo $row['catagory'] ?>" placeholder="Enter Catagory">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Image:</label>
              <input type="file" name="image" class="form-control" value="<?php echo $row['image'] ?>" required placeholder="Select Image">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold" >Description:</label>
              <input type="text" name="Description" class="form-control" value="<?php echo $row['Description'] ?>" placeholder="Enter Description">
            </div>
            <br>
            <div class="form-group">
              <label for="" style="color:blue" class="fw-bold">Author:</label>
              <input type="text" name="Author" class="form-control"  value="<?php echo $row['Author'] ?>" placeholder="Enter Author Name">
            </div>
            <br>
            <button type="submit" name="update" class="btn btn-primary">Update User</button>
            <a href="admin.php" class="btn btn-danger">Back</a>
          </form>
          <?php
          if (isset($_POST['update'])) {
            $bn =$_POST['name'];
            $bs =$_POST['status'];
            $bp =$_POST['Price'];
            $bc =$_POST['catagory'];
            $bi =$_POST['image'];
            $bd =$_POST['Description'];
            $ba =$_POST['Author'];
            $qq = "UPDATE books SET name='$bn', Price='$bp',status='$bs', catagory='$bc', image='$bi', Description='$bd', Author='$ba' WHERE id='$id' ";
            $query_run = mysqli_query($conn,$qq);
            if ($query_run) {
              echo '<script> alert("Data Updated")</script>' ;
              header("location:admin.php");
            }
            else {
              echo '<script>alert("Data  Not Updated")</script>';
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
