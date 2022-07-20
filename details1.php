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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Product Details</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>

  </head>
  <body>
      <nav class="navbar navbar-expand-lg bg-light" id="a">
        <a class="navbar-brand" href=" index.php"><img src="img/Bookbuy.png" alt="BookBuy" width="40" height="32"></a>
        <a class="navbar-brand fw-bold" href="index.php">Bookbuy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigationbar">
          <ul class="navbar-nav ms-auto">

            <li class="nav-item"><a href="index.php"><img src="img/home.png" alt="home"></a></li>
            <li class="nav-item"><a href="search.php"><img src="img/search.png" alt="search"></a></li>
            <li class="nav-item"><a href="cart.php"><img src="img/cart.png" alt="Cart"></a></li>
        </div>
      </nav>
      <br>
      <br>
<style>
.title{
    font-size: 14px;
    font-weight: 600;
    display: block;
    margin: 0 0 5px;
    text-transform: capitalize;
}

.price {
    font-size:20px;
    color: #555;
    font-weight: 500;
    margin: 0 2px;

}
.product-content .title{
    font-size: 25px;
    margin: 0 0 10px;
}
.description{
   font-size: 18px;
   font-weight:400;
   color: #333;
   margin:0 0 20px 0;
   letter-spacing: 0.5px;
}
.add-to-cart{

}
</style>
<?php
  $id = $_POST['id'];
  $query="SELECT * from books WHERE id='$id'";
  $query_run=mysqli_query($conn,$query);
  if ($query_run) {
      while ($row = mysqli_fetch_array($query_run)) {
      ?>
<div class="container">
<h4>Book/<?php echo $row['name'] ?></h4>
<br>
<br>
<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <div class="product-image">
                <img id="product-img" src="img/<?php echo $row['image'] ?>" alt="<?php echo $row['name'] ?>">
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="product-content">
                <h3 class="title"><?php echo $row['name'] ?></h3>
                <small>Product id:<?php echo $row['id'] ?></small><br>
                <small><b>Author: <?php echo $row['Author'] ?></b></small>
                <br>
                <span class="price">TK. <?php echo $row['Price'] ?>৳</span>
                <br>
                <br>
                <p class="description"><b>Description:</b> <br> <?php echo $row['Description'] ?></p>
                <br>
                <br>
                <br>
                <form class="" action="insertcartdata.php" method="post">
                  <div class="d-grid gap-2">
                    <input type="hidden" name="bid" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="bn" value="<?php echo $row['name'] ?>">
                    <input type="hidden" name="bi" value="<?php echo $row['image'] ?>">
                    <input type="hidden" name="bp" value="<?php echo $row['Price'] ?>">
                    <button  class=" btn btn-info" type="submit" name="Add" class="btn btn-info " disabled >Add to cart</button>
                  </div>
                </form>
                <!-- <a class="add-to-cart d-grid gap-2 btn btn-info" data-id="" href="">Add to cart</a> -->
            </div>
        </div>
        <div class="col-md-2"></div>
</div>
</div>
<?php
}
}
  ?>
  </body>
</html>
