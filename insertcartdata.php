<?php

@include 'config_page.php';

session_start();
if (time() - $_SESSION["time"] > 300) {
    session_unset();
    session_destroy();
    header("Location:index.php");
} else {
     $username =$_SESSION['user_name'];
}
?>
<?php
$bid = $_POST['bid'];
$bn= $_POST['bn'];
$bi= $_POST['bi'];
$bp= $_POST['bp'];
if (isset($_POST['Add'])) {
  $qq = "INSERT INTO `cart`(`bookid`,`name`, `image`, `Price`,`username`) VALUES('$bid','$bn','$bi','$bp','$username')";
  $query_run = mysqli_query($conn,$qq);
  if ($query_run) {
    echo '<script> alert("Added to Cart")</script>' ;
    header("location:cart.php");
  }
  else {
    echo '<script>alert("Not Added")</script>';
  }
}

  ?>
