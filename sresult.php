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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>
      <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-light" id="a">
    <a class="navbar-brand" href="index2.php"><img src="img/Bookbuy.png" alt="BookBuy" width="40" height="32"></a>
    <a class="navbar-brand fw-bold" href="index2.php">Bookbuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo strtoupper($username) ?>
          </button>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><button class="dropdown-item" type="button"><a href="logout.php" class="text-decoration-none">Logout</a></button></li>
          </ul>
        </div>
      </li>
            <li class="nav-item"><a href="index2.php"><img src="img/home.png" alt="home"></a></li>
    </ul>

    </div>
  </nav>
  <div class="container txtaligns">
    <h3>Search Result:</h3>
    <hr>
    <div class="container txtaligns">
      <div class="row row-cols-1 row-cols-md-3 g-4 padup h-100">
        <?php
        if (isset($_POST['search'])){

        $bn =$_POST['search'];
        $qq = "SELECT * FROM books WHERE name LIKE '%$bn%' ";
        $qr2 = mysqli_query($conn,$qq);
        $trnd2 = mysqli_num_rows($qr2)>0;
        $count2=0;
        if($trnd2)
        {
        while ($row = mysqli_fetch_assoc($qr2)) {
          ?>
          <div class="col">
            <div class="card h-100 a">
              <img src="img/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo $row['Description'] ?></p>
              </div>
              <div class="card-footer bg-transparent">
                <form action="Details.php" method="post">
                     <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                  <input type="submit" name="edit" class="btn btn-info" value="View">
                </form>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
        </div>
        <div class="txtaligns padup">
        </div>
  <?php
}}
else {
  echo "Nothing Found";
}
        ?>
    </div>
  </div>
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
