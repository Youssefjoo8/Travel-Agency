<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ask Questions</title>
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>
<body>

<!-- header section starts  -->
<section class="header">
   <a href="home.php" class="logo"> <i class="fas fa-globe-americas"></i> TRAVEL AGENCY </a>
   <nav class="navbar">
      <a href="home.php" class="<?php echo($page == 'home.php') ? 'active' : ''; ?>">home</a>
      <a href="about.php" class="<?php echo($page == 'about.php') ? 'active' : ''; ?>">about</a>
      <a href="package.php" class="<?php echo($page == 'package.php') ? 'active' : ''; ?>">package</a>
      <a href="book.php" class="<?php echo($page == 'book.php') ? 'active' : ''; ?>">book</a>
      <a href="gallery.php" class="<?php echo($page == 'gallery.php') ? 'active' : ''; ?>">gallery</a>
   </nav>
   <div class="icons">
      <a href="../ar/home arabic.php" class="fas fa-globe"></a>
      <div id="theme-btn" class="fas fa-moon"></div>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</section>
<!-- header section ends -->

<div class="heading" style="background:url(../../images/header-bg-1.png) no-repeat">
   <h1>Ask Questions</h1>
</div>

<!-- faq section starts  -->
<section class="faq">

   <h1 class="heading-title"> frequently asked questions </h1>

   <div class="accordion-container">

      <div class="accordion">
         <div class="accordion-header">
            <h3>how to book a tour?</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>You can book a tour by visiting our 'Book' page, filling out the form with your details, and submitting it. We will contact you shortly to confirm your booking.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>what payment methods are accepted?</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>We accept various payment methods including credit/debit cards, bank transfers, and cash payments at our office.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>can I cancel my booking?</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>Yes, you can cancel your booking. Please refer to our cancellation policy for details on refunds and cancellation fees.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>do you offer customizable packages?</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>Absolutely! We can customize tour packages to suit your preferences and requirements. Just contact us with your needs.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>is travel insurance included?</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>Travel insurance is not included in the standard package price but can be arranged upon request for an additional fee.</p>
         </div>
      </div>

   </div>

</section>
<!-- faq section ends -->

<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

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
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
