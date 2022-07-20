<?php

@include 'config_page.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Bookbuy</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" charset="utf-8"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="myscript.js"></script>
  <link rel="stylesheet" href="css/styles.css">
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
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Login/Register
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><button class="dropdown-item" type="button"><a href="login.php" class="text-decoration-none">Login</a></button></li>
              <li><button class="dropdown-item" type="button"><a href="register_form.php" class="text-decoration-none">Register</a> </button></li>
            </ul>
          </div>
        </li>
        <li class="nav-item"><a href="index.html"><img src="img/home.png" alt="home"></a></li>
        <li class="nav-item"><img src="img/search.png" alt="search" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></li>
        <li class="nav-item"><img src="img/cart.png" alt="Cart" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></li>
</ul>
    </div>
  </nav>

  <div class="collapse" id="collapseExample">
    <div class="card card-body">
    Please,login to use this function.
    </div>
  </div>


  <!-- Intro -->
    <div class="container-fluid txtaligns">
      <h1 class="ind opacity-75">Welcome to <br>the Bookbuy <br>
        Find your Favourite Books.</h1>
      <img src="https://static.wixstatic.com/media/11062b_df4b548e80a442f4a9d48559646951ec~mv2.jpg/v1/fill/w_1899,h_925,fp_0.50_0.50,q_85,usm_0.66_1.00_0.01,enc_auto/11062b_df4b548e80a442f4a9d48559646951ec~mv2.jpg" alt="BookStack" class="img-fluid"
        class:"pos">
    </div>



  <hr>









  <!-- Menu -->
    <ul class="nav justify-content-center">
      <li class="nav-item"><a class="active nav-link " href="#trending">
        <ion-icon name="trending-up-outline"></ion-icon>
        </span>
        <span class="text">Trendig</span>
        </h4></a></li>
      <li class="nav-item"><a class="nav-link" href="#new">        <ion-icon name="book-outline"></ion-icon>
              </span>
              <span class="text">New Books</span>
              </h4></a></li>
      <li class="nav-item">
        <a class="nav-link" href="#mostpopular">
          <ion-icon name="heart-circle-outline"></ion-icon>
          </span>
          <span class="text">Most Popular</span>
          </h4>
        </a>
      </li>
    </ul>




    <hr>










  <!-- Trending Section -->
    <div id="trending" class="carousel slide txtaligns pad" data-bs-ride="carousel" class="container" data-bs-interval="3000">
      <h4 class="text-start"><span class="icon">
          <ion-icon name="book-outline"></ion-icon>
        </span>
        <span class="text">Trendig</span>
      </h4>
      <hr>

      <div class="carousel-inner">

          <?php
          $query= "select * from books where status='trending'";
          $qr = mysqli_query($conn,$query);
          $trnd = mysqli_num_rows($qr)>0;
          $count=0;
          if($trnd)
          {
          while ($row = mysqli_fetch_assoc($qr)) {

             $count=$count+1;
             if($count==1)
             {

               ?>
             <div class="carousel-item active">
             <div class="card mb-3 bg-transparent" style="max-width: 100%">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="img/<?php echo $row['image'] ?>" class="img-fluid rounded-start" alt="Angels & Demons">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $row['name'] ?></h5>
                          <p class="card-text"><?php echo $row['Description']; ?></p>
                          <form action="details1.php" method="post">
                               <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" name="edit" class="btn btn-info" value="View">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              else{
                ?>
                <div class="carousel-item">
                <div class="card mb-3 bg-transparent" style="max-width: 100%">
                       <div class="row g-0">
                         <div class="col-md-4">
                           <img src="img/<?php echo $row['image'] ?>" class="img-fluid rounded-start" alt="Angels & Demons">
                         </div>
                         <div class="col-md-8">
                           <div class="card-body">
                             <h5 class="card-title"><?php echo $row['name'] ?></h5>
                             <p class="card-text"><?php echo $row['Description']; ?></p>
                             <form action="details1.php" method="post">
                                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                               <input type="submit" name="edit" class="btn btn-info" value="View">
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <?php
              }
                 ?>
          <?php

          }
          }
          else{
             echo "Nothing is Trending ";
          }
          ?>
      <button class="carousel-control-prev" type="button" data-bs-target="#trending" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#trending" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  </div>










  <!-- New Books -->
    <div id="new" class="carousel slide txtaligns pad" data-bs-ride="carousel" class="container" data-bs-interval="3000">
      <h4 class="text-start">
        <span class="icon">
          <ion-icon name="book-outline"></ion-icon>
        </span>
        <span class="text">New</span>
      </h4>
      <hr>
      <div class="carousel-inner">
        <?php
        $query2= "select * from books where status='New'";
        $qr2 = mysqli_query($conn,$query2);
        $trnd2 = mysqli_num_rows($qr2)>0;
        $count2=0;
        if($trnd2)
        {
        while ($row = mysqli_fetch_assoc($qr2)) {
          $count2=$count2+1;
          if($count2==1)
          {
           ?>
           <div class="carousel-item active">
           <div class="card-group col-sm-12 col-3">
           <div class="card" >
            <img src="img/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
              <p class="card-text"><?php echo $row['Description'] ?></p>
            </div>
            <div class="card-footer bg-transparent">
              <form action="details1.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <input type="submit" name="edit" class="btn btn-info" value="View">
              </form>
              <!-- <a href="index.html" class="btn btn-outline-info">View</a>
            <a href="index.html" class="btn btn-outline-info">Add to Cart</a> -->
            </div>
           </div>

         <?php
       }
       elseif ($count2>=1 && $count2<=4){
         ?>
         <div class="card" >
          <img src="img/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name'] ?></h5>
            <p class="card-text"><?php echo $row['Description'] ?></p>
          </div>
          <div class="card-footer bg-transparent">
            <form action="details1.php" method="post">
                 <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
              <input type="submit" name="edit" class="btn btn-info" value="View">
            </form>
          </div>
         </div>

       <?php
       if($count2==4){
         ?>
       </div>
     </div>
         <?php
       }
       }
  else if($count2==5){
    ?>
    <div class="carousel-item">
    <div class="card-group col-sm-12 col-3">
    <div class="card" >
     <img src="img/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title"><?php echo $row['name'] ?></h5>
       <p class="card-text"><?php echo $row['Description'] ?></p>
     </div>
     <div class="card-footer bg-transparent">
       <form action="details1.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
         <input type="submit" name="edit" class="btn btn-info" value="View">
       </form>
     </div>
    </div>
    <?php
  }
  else {
    ?>
    <div class="card" >
     <img src="img/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title"><?php echo $row['name'] ?></h5>
       <p class="card-text"><?php echo $row['Description'] ?></p>
     </div>
     <div class="card-footer bg-transparent">
       <form action="details1.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
         <input type="submit" name="edit" class="btn btn-info" value="View">
       </form>
     </div>
    </div>

    <?php
    if($count2==8){
      $count2=4;
      ?>
      </div>
    </div>
    <?php
    }
  }
  }
        }
        else{
           echo "Nothing is New ";
        }

        if($count2!=4){
        ?>

      </div>
    </div>
    <?php
  }
    ?>
  </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#new" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#new" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

  </div>

  <!-- Most Populer Section -->
  <div id="mostpopular">
    <h4 class="text-start"><span class="icon">
        <ion-icon name="book-outline"></ion-icon>
      </span>
      <span class="text">Most Populer</span>
    </h4>
    <hr>
    <div class="container txtaligns">
      <div class="row row-cols-1 row-cols-md-3 g-4 padup">
        <?php
        $query2= "select * from books where status='Most Popular'";
        $qr2 = mysqli_query($conn,$query2);
        $trnd2 = mysqli_num_rows($qr2)>0;
        $count2=0;
        if($trnd2)
        {
        while ($row = mysqli_fetch_assoc($qr2)) {
          ?>
          <div class="col">
            <div class="card h-100">
              <img src="img/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo $row['Description'] ?></p>
              </div>
              <div class="card-footer bg-transparent">
                <form action="details1.php" method="post">
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
      }
        ?>
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
