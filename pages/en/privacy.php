<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Privacy Policy</title>
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
       [data-theme="dark"] .legal-container p {
           color: #E0E0E0;
       }
       [data-theme="dark"] .legal-container h1 {
           color: var(--white);
       }
   </style>
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

<div class="heading" style="background:url(../../images/header-bg-2.png) no-repeat">
   <h1>Privacy Policy</h1>
</div>

<section class="legal-container">
    <h1>Privacy Policy</h1>
    <p>Your privacy is important to us. It is Travel Agency's policy to respect your privacy regarding any information we may collect from you across our website.</p>

    <h2>1. Information We Collect</h2>
    <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.</p>

    <h2>2. How We Use Information</h2>
    <p>We use the information we collect to operate and maintain our website and services, to send you newsletters, marketing or promotional materials, and other information that may be of interest to you.</p>

    <h2>3. Data Protection</h2>
    <p>We don’t share any personally identifying information publicly or with third-parties, except when required to by law. We retain collected information for as long as necessary to provide you with your requested service.</p>

    <h2>4. Cookies</h2>
    <p>We use cookies to help us identify and track visitors, their usage of our website, and their website access preferences. Visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies.</p>
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

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
