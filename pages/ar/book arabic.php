<?php session_start(); ?>

<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>وكاله سياحيه</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
   <!-- intl-tel-input CSS v23 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.1/build/css/intlTelInput.css">
   <style>
      .iti { width: 100%; }
      .iti__flag { background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/img/flags.png"); }
      @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .iti__flag { background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/img/flags@2x.png"); }
      }
   </style>


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
   <!-- <a  href="home.php" class="logo"><img  src="images/logo.jpg"></a> -->
   <a  href="home arabic.php" class="logo"> <i class="fas fa-globe-americas"></i> منصة  وكاله  سياحيه | مجموعه 21</a>
   <nav class="navbar">
      <a href="../en/home.php" style="text-decoration: underline;">الانجليزية</a>
      <a href="gallery arabic.php" class="<?php echo($page == 'gallery arabic.php') ? 'active' : ''; ?>">معرض الصور </a>
      <a href="book arabic.php" class="<?php echo($page == 'book arabic.php') ? 'active' : ''; ?>">حجز رحلة</a>
      <a href="package arabic.php" class="<?php echo($page == 'package arabic.php') ? 'active' : ''; ?>">الرحلات</a>
      <a href="about arabic.php" class="<?php echo($page == 'about arabic.php') ? 'active' : ''; ?>">عن الموقع</a>
      <a href="home arabic.php" class="<?php echo($page == 'home arabic.php') ? 'active' : ''; ?>">الرئيسية</a>
   </nav>
   <div id="menu-btn" class="fas fa-bars"></div>
   <div id="theme-btn" class="fas fa-moon"></div>


</section>

<!-- header section ends -->

<div class="heading" style="background:url(../../images/header-bg-3.png) no-repeat">
   <h1>احجز الآن</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">احجز رحلتك!</h1>

   <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
      <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
      <?php
   unset($_SESSION['success_message']);
}
?>

   <form action="book_form.php" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>الاسم :</span>
            <input type="text" placeholder="أدخل اسمك" name="name">
         </div>
         <div class="inputBox">
            <span>البريد الإلكتروني :</span>
            <input type="email" placeholder="أدخل بريدك الإلكتروني" name="email">
         </div>
         <div class="inputBox">
            <span>الهاتف :</span>
            <input type="tel" placeholder="أدخل رقم هاتفك" name="phone" id="phone">
         </div>
         <div class="inputBox">
            <span>العنوان :</span>
            <input type="text" placeholder="أدخل عنوانك" name="address">
         </div>
         <div class="inputBox">
            <span>الوجهة :</span>
            <input type="text" placeholder="المكان الذي تريد زيارته" name="location">
         </div>
         <div class="inputBox">
            <span>العدد :</span>
            <input type="number" placeholder="عدد الضيوف" name="guests">
         </div>
         <div class="inputBox">
            <span>تاريخ الوصول :</span>
            <input type="date" name="arrivals">
         </div>
         <div class="inputBox">
            <span>تاريخ المغادرة :</span>
            <input type="date" name="leaving">
         </div>
      </div>

      <input type="submit" value="إرسال" class="btn" name="send">

   </form>
</section>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
<!-- booking section ends -->
<!-- footer section starts  -->
<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>روابط سريعة</h3>
         <a href="home arabic.php"> <i class="fas fa-angle-right"></i> الرئيسية</a>
         <a href="about arabic.php"> <i class="fas fa-angle-right"></i> من نحن</a>
         <a href="package arabic.php"> <i class="fas fa-angle-right"></i> الرحلات</a>
         <a href="book arabic.php"> <i class="fas fa-angle-right"></i> حجز</a>
      </div>
      <div class="box">
         <h3>روابط إضافية</h3>
         <a href="about arabic.php"> <i class="fas fa-angle-right"></i> من نحن</a>
         <a href="faq arabic.php"> <i class="fas fa-angle-right"></i> اساله شائعه</a>
         <a href="terms.php"> <i class="fas fa-angle-right"></i> شروط الاستخدام</a>
         <a href="privacy.php"> <i class="fas fa-angle-right"></i> سياسة الخصوصية</a>
      </div>
      <div class="box">
         <h3>معلومات الاتصال</h3>
         <a href="#"> <i class="fas fa-phone"></i> +020-000-0000 </a>
         <a href="https://wa.me/+201014130237"> <i class="fab fa-whatsapp"></i> +201014130237 </a>
         <a href="https://mail.google.com"> <i class="fas fa-envelope"></i> example@email.com </a>
         <a href="https://maps.app.goo.gl/22352352352352352"> <i class="fas fa-map"></i> القاهره، مصر </a>
      </div>
      <div class="box">
         <h3>تابعنا</h3>
         <a href="https://www.facebook.com"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.X.com"> <i class="fab fa-twitter"></i> twitter/X </a>
         <a href="https://www.instagram.com"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://www.linkedin.com"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>
   </div>
   <div class="credit"> تم التصميم بواسطة <span>فريق 21</span> </div>
</section>

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- intl-tel-input JS v23 -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.1/build/js/intlTelInput.min.js"></script>
<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     initialCountry: "auto",
     separateDialCode: true,
     geoIpLookup: function(callback) {
       fetch('https://ipinfo.io/json?token=YOUR_TOKEN_HERE', { headers: { 'Accept': 'application/json' }})
         .then((resp) => resp.json())
         .catch(() => { return { country: 'eg' }; })
         .then((resp) => callback(resp.country));
     },
     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.1/build/js/utils.js",
   });
</script>


<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>


</body>
</html>