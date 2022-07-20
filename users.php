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
    <title>Admin Panel</title>
<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Bookbuy Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav  ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="users.php">Users Info</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<!-- content -->
            <div>
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h2><b>Users Information</b></h2>
                                </div>
                                <div class="col-sm-2 float-end">
                                      <a href="userinsert.php" class="btn btn-info" style="margin-left=80%">+Add Data</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>Email</th>

                                    <th>Password</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query= "select * from user_form where user_type='user'";
                              $qr = mysqli_query($conn,$query);
                              $trnd = mysqli_num_rows($qr)>0;
                              $count=0;
                              if($trnd)
                              {
                              while ($row = mysqli_fetch_assoc($qr)) {
                                ?>
                                <tr>

                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['password'] ?></td>
                                    <form action="updateuser.php" method="post">
                                         <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <td>   <input type="submit" name="edit" class="btn btn-primary" value="Edit">
                                      </td>
                                    </form>
                                    <form class="" action="deleteuser.php" method="post">
                                      <td>
                                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                          <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                                      </td>
                                    </form>



                                </tr>
                                <?php
                              }
                            }
                                                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <hr>
            <div class="txtaligns">

                <footer class="white-section" id="footer">
                  <div class="container-fluid">
                    <a href="https://www.facebook.com/mahadi.ankon"> <i class="social-icon fab fa-facebook-f"></i></a>
                    <a href="https://github.com/MahadiAnkon"> <i class="social-icon fab fa-github"></i></a>
                  <a href="https://www.instagram.com/mahadi.ankon">  <i class="social-icon fab fa-instagram"></i></a>
                  <a href="https://mail.google.com/mail/mahadi.ankon@gmail.com">  <i class="social-icon fas fa-envelope"></i></a>
                    <p>© Copyright 2022 Bookbuy</p>
                  </div>
                </footer>
            </div>
</body>



</html>
