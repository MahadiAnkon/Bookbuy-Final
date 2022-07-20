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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>
      <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

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


    <div>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2><b>Cart Info</b></h2>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Cover</th>
                            <th>Price</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query= "select * from cart where username='$username'";
                      $qr = mysqli_query($conn,$query);
                      $trnd = mysqli_num_rows($qr)>0;
                      $count=0;
                      if($trnd)
                      {
                      while ($row = mysqli_fetch_assoc($qr)) {
                        ?>
                        <tr>

                            <td><?php echo $row['name'] ?></td>
                            <td><img src="img/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>"></td>
                            <td><?php echo $row['Price'] ?></td>
                            <form class="" action="cartdelete.php" method="post">
                              <td>
                                  <input type="hidden" name="id" value="<?php echo $row['bookid'] ?>">
                                  <input type="submit" name="delete" class="btn btn-danger" value="Remove">
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
<?php
$query2= "select SUM(Price) As sum from cart where username='$username'";
$qr2 = mysqli_query($conn,$query2);
while($row = mysqli_fetch_assoc($qr2)) {
    $output = $row['sum'];
}

 ?>
 <div class="txtaligns">
   <h3>Total Price: TK. <?php echo $output; ?> ৳</h3>
 </div>
 <br>
 <br>
        <a href="https://www.paypal.com/bd/home">  <div class="d-grid gap-2">

      <button  class=" btn btn-info" type="submit" name="Add" class="btn btn-info">Checkout</button>
    </div></a>


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
