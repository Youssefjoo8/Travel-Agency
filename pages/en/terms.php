<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Terms of Use</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


   <style>
       .legal-container {
           max-width: 1100px;
           margin: 0 auto;
           padding: 5rem 2rem;
       }
       .legal-container h1 {
           font-size: 4rem;
           color: var(--black);
           margin-bottom: 2rem;
           border-left: 5px solid var(--tomato);
           padding-left: 1.5rem;
           text-transform: uppercase;
       }
       .legal-container h2 {
           font-size: 2.5rem;
           color: var(--main-color);
           margin-top: 3rem;
           margin-bottom: 1.5rem;
       }
       .legal-container p {
           font-size: 1.6rem;
           color: var(--light-black);
           line-height: 2;
           margin-bottom: 1.5rem;
           text-align: justify;
       }
       .legal-container ul {
           margin-left: 2rem;
           margin-bottom: 1.5rem;
       }
       .legal-container li {
           font-size: 1.6rem;
           color: var(--light-black);
           line-height: 2;
           list-style: disc;
           margin-bottom: 0.5rem;
       }
       [data-theme="dark"] .legal-container p, 
       [data-theme="dark"] .legal-container li {
           color: #E0E0E0;
       }
       [data-theme="dark"] .legal-container h1 {
           color: var(--white);
       }
   </style>
</head>
<body>

<section class="header">
   <a href="home.php" class="logo"> <i class="fas fa-globe-americas"></i> Travel agency | TEAM 21</a>
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

<div class="heading" style="background:url(../../images/header-bg-1.png) no-repeat">
   <h1>Terms of Use</h1>
</div>

<section class="legal-container">
    <h1>Terms of Use</h1>
    <p>Welcome to Travel Agency. By using our website and services, you agree to comply with and be bound by the following terms and conditions. Please review them carefully.</p>

    <h2>1. Acceptance of Terms</h2>
    <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. In addition, when using this websites particular services, you shall be subject to any posted guidelines or rules applicable to such services.</p>

    <h2>2. Use of Service</h2>
    <p>You agree to use this site only for lawful purposes. You are prohibited from posting on or transmitting through this site any unlawful, harmful, threatening, abusive, harassing, defamatory, vulgar, obscene, sexually explicit, profane, hateful, racially, ethnically, or otherwise objectionable material of any kind.</p>

    <h2>3. Booking Policy</h2>
    <p>All bookings made through our website are subject to availability and confirmation. Prices are subject to change without notice. We reserve the right to cancel or modify bookings where it appears that a customer has engaged in fraudulent or inappropriate activity.</p>

     <h2>4. Limitation of Liability</h2>
    <p>Travel Agency shall not be liable for any direct, indirect, incidental, special, consequential, or exemplary damages, including but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses resulting from the use of or inability to use the service.</p>
    
    <h2>5. Privacy Policy</h2>
    <p>Your use of the website is also subject to our Privacy Policy. Please review our Privacy Policy, which also governs the website and informs users of our data collection practices.</p>
    
    <h2>6. Governing Law</h2>
    <p>Any claim relating to Travel Agency's website shall be governed by the laws of the country without regard to its conflict of law provisions.</p>
    
    <h2>7. Changes to Terms</h2>
    <p>Travel Agency reserves the right, at its sole discretion, to change, modify, add or remove portions of these Terms of Use, at any time. It is your responsibility to check these Terms of Use periodically for changes.</p>
</section>

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
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

