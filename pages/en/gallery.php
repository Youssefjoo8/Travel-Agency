<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gallary</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">

    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
    
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->

    
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
    
    <div class="heading" style="background:url(../../images/header-bg-2.png) no-repeat">
   <h1>gallery</h1>
</div>
    <section class="gallary" id="gallary">


        <div class="container">
            <div class="box">
                <img src="../../images/g-1.jpg" alt="">
                <div class="content">
                    <h3>Historic Charm</h3>
                    <p>Explore the breathtaking beauty of your next destination</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-2.jpg" alt="">
                <div class="content">
                    <h3>Your Peaceful Escape</h3>
                    <p>Unforgettable moments in the world's most beautiful places</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-3.jpg" alt="">
                <div class="content">
                    <h3>Dream Destination</h3>
                    <p>Live the adventure you've always dreamed of</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-4.jpg" alt="">
                <div class="content">
                    <h3>Unspeakable Beauty</h3>
                    <p>Book your seat now and get ready for a lifetime trip</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-5.jpg" alt="">
                <div class="content">
                    <h3>Fantastic Getaway</h3>
                    <p>Exclusive packages specially designed to suit your taste</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-6.jpg" alt="">
                <div class="content">
                    <h3>Dream Destination</h3>
                    <p>Travel in total comfort with the best planning services</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-7.jpg" alt="">
                <div class="content">
                    <h3>Your Peaceful Escape</h3>
                    <p>Where luxury meets the beauty of nature</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-8.jpg" alt="">
                <div class="content">
                    <h3>Unspeakable Beauty</h3>
                    <p>The perfect escape from the hustle of daily life</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
            <div class="box">
                <img src="../../images/g-9.jpg" alt="">
                <div class="content">
                    <h3>New Adventure</h3>
                    <p>Create memories that last forever with your loved ones</p>
                    <!-- <a href="" class="btn">See more</a> -->
                </div>
            </div>
        </div>

    </section>

    <!----------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------->
    <button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

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
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

 </body>
</html>