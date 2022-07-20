<?php

@include 'config_page.php';
session_start();
if (time() - $_SESSION["time"] > 300) {
    session_unset();
    session_destroy();
    header("Location:index.php");
}
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $query = "delete from user_form where id='$id'";
  $query_run = mysqli_query($conn,$query);

  if ($query_run) {
    echo '<script> alert("User Deleted")</script>' ;
    header("location:users.php");
  }
  else {
    echo '<script>alert("User  Not Deleted")</script>';
  }
}
?>
