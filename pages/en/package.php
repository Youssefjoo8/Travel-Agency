<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">


   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function(){
          $(".scroll-top").click(function() {
              $("html, body").animate({ 
                  scrollTop: 0 
              }, "slow");
              return false;
          });
      });
   </script>

</head>
<body>
   
<!-- header section starts  -->

<section class="header">
   <a  href="home.php" class="logo"> <i class="fas fa-globe-americas"></i> Travel agency | TEAM 21</a>
   <nav class="navbar">
      <a href="home.php" class="<?php echo($page == 'home.php') ? 'active' : ''; ?>">Home</a>
      <a href="about.php" class="<?php echo($page == 'about.php') ? 'active' : ''; ?>">about</a>
      <a href="package.php" class="<?php echo($page == 'package.php') ? 'active' : ''; ?>">package</a>
      <a href="book.php" class="<?php echo($page == 'book.php') ? 'active' : ''; ?>">book</a>
      <a href="gallery.php" class="<?php echo($page == 'gallery.php') ? 'active' : ''; ?>">gallery</a>
      <a href="../ar/home arabic.php" style="text-decoration: underline;">ARABIC </a>
   </nav>
   <div id="menu-btn" class="fas fa-bars"></div>
   <div id="theme-btn" class="fas fa-moon"></div>


</section>

<!-- header section ends -->

<div class="heading" style="background:url(../../images/header-bg-2.png) no-repeat">
   <h1>packages</h1>
</div>

<!-- packages section starts  -->

<section class="packages">

   <h1 class="heading-title">top destinations</h1>

   <div class="box-container">

      <div class="box">
         <div class="image">
            <img src="../../images/img-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>Dubai Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our Dubai top selling packages!</p>
            <h2>Eg 10,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>India Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our Delhi top selling packages!</p>
            <h2>Eg 9,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>Japan Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our Japan top selling packages!</p>
            <h2>Eg 11,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-4.jpg" alt="">
         </div>
         <div class="content">
            <h3>Australia Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our Australia top selling packages!</p>
            <h2>Eg 13,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-5.jpg" alt="">
         </div>
         <div class="content">
            <h3>china Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our china top selling packages!</p>
            <h2>Eg 7,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-6.jpg" alt="">
         </div>
         <div class="content">
            <h3>singapur Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our singapur top selling packages!</p>
            <h2>Eg 12,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-7.jpg" alt="">
         </div>
         <div class="content">
            <h3>spain Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our spain top selling packages!</p>
            <h2>Eg 18,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-8.jpg" alt="">
         </div>
         <div class="content">
            <h3>canada Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our canada top selling packages!</p>
            <h2>Eg 21,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-9.jpg" alt="">
         </div>
         <div class="content">
            <h3>barli Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our barli top selling packages!</p>
            <h2>Eg 14,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-10.jpg" alt="">
         </div>
         <div class="content">
            <h3>nepal Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our nepal top selling packages!</p>
            <h2>Eg 7,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-11.jpg" alt="">
         </div>
         <div class="content">
            <h3>bangladesh Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our bangladesh top selling packages!</p>
            <h2>Eg 5,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-12.jpg" alt="">
         </div>
         <div class="content">
            <h3>Japan Tour Packages</h3>
            <p>Enjoy the Emirates with unforgettable fun with our Japan top selling packages!</p>
            <h2>Eg 11,900</h2>
            <a href="book.php" class="btn">book now</a>
         </div>
      </div>

   </div>

   <div class="load-more"><span class="btn">see more</span></div>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

</section>

<!-- packages section ends -->
<!-- footer section starts  -->

<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>
      <div class="box">
         <h3>extra links</h3>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="faq.php"> <i class="fas fa-angle-right"></i> FAQ </a>
         <a href="terms.php"> <i class="fas fa-angle-right"></i> terms of use</a>
         <a href="privacy.php"> <i class="fas fa-angle-right"></i> privacy policy</a>
      </div>
      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +020-000-0000 </a>
         <a href="https://wa.me/+201014130237"> <i class="fab fa-whatsapp"></i> +201014130237 </a>
         <a href="https://mail.google.com"> <i class="fas fa-envelope"></i> example@email.com </a>
         <a href="https://maps.app.goo.gl/22352352352352352"> <i class="fas fa-map"></i> cairo, Egypt  </a>
      </div>
      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.X.com"> <i class="fab fa-twitter"></i> twitter/X </a>
         <a href="https://www.instagram.com"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://www.linkedin.com"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>
   </div>
   <div class="credit"> designed by <span>Team 21</span> | all rights reserved! </div>
</section>

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>


</body>
</html>