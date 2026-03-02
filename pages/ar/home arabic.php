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

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>
<body>

<!-- Profile Completion Reminder -->
<?php if (isset($_SESSION['user_id'])): ?>
    <?php
   if (!isset($connection)) {
      include '../../config.php';
   }
   $u_id = $_SESSION['user_id'];
   $chk_q = "SELECT phone_number FROM users WHERE id = '$u_id'";
   $chk_r = mysqli_query($connection, $chk_q);
   $chk_user = mysqli_fetch_assoc($chk_r);
   if (empty($chk_user['phone_number'])):
?>
    <div style="background-color: #ff9800; color: white; text-align: center; padding: 12px; font-size: 1.4rem; font-weight: bold; position: sticky; top: 0; z-index: 9999; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <i class="fas fa-exclamation-triangle"></i> يرجى إكمال ملفك الشخصي بإضافة رقم هاتف.
        <a href="settings_ar.php" style="color: #fff; text-decoration: underline; margin-right: 10px; padding: 4px 10px; background: rgba(0,0,0,0.2); border-radius: 4px;">اذهب إلى الإعدادات</a>
    </div>
    <?php
   endif; ?>
<?php
endif; ?>

<!-- header section starts  -->
<section class="header">
   <a href="home arabic.php" class="logo"> <i class="fas fa-globe-americas"></i> TRAVEL AGENCY </a>
   <nav class="navbar">
      <a href="home arabic.php" class="<?php echo($page == 'home arabic.php') ? 'active' : ''; ?>">الرئيسية</a>
      <a href="about arabic.php" class="<?php echo($page == 'about arabic.php') ? 'active' : ''; ?>">عن الموقع</a>
      <a href="package arabic.php" class="<?php echo($page == 'package arabic.php') ? 'active' : ''; ?>">الرحلات</a>
      <a href="book arabic.php" class="<?php echo($page == 'book arabic.php') ? 'active' : ''; ?>">حجز رحلة</a>
      <a href="gallery arabic.php" class="<?php echo($page == 'gallery arabic.php') ? 'active' : ''; ?>">معرض الصور</a>
   </nav>
   <div class="icons">
      <?php
$pg = basename($_SERVER["PHP_SELF"]);
$map = [
   "home arabic.php" => "home.php",
   "about arabic.php" => "about.php",
   "package arabic.php" => "package.php",
   "book arabic.php" => "book.php",
   "gallery arabic.php" => "gallery.php",
   "bookings_ar.php" => "my_bookings.php",
   "my_bookings_arabic.php" => "my_bookings.php",
   "settings_ar.php" => "settings.php",
   "profile_ar.php" => "profile.php"
];
$en_dest = isset($map[$pg]) ? $map[$pg] : "home.php";
?>
      <?php
$pg = basename($_SERVER["PHP_SELF"]);
$map = [
   "home arabic.php" => "home.php",
   "about arabic.php" => "about.php",
   "package arabic.php" => "package.php",
   "book arabic.php" => "book.php",
   "gallery arabic.php" => "gallery.php",
   "bookings_ar.php" => "my_bookings.php",
   "my_bookings_arabic.php" => "my_bookings.php",
   "settings_ar.php" => "settings.php",
   "profile_ar.php" => "profile.php"
];
$en_dest = isset($map[$pg]) ? $map[$pg] : "home.php";
?>
      <a href="../en/<?php echo $en_dest; ?>" class="fas fa-globe"></a>
      <div id="theme-btn" class="fas fa-moon"></div>
      <?php if (isset($_SESSION['user_id'])): ?>
         <div id="profile-btn" class="fas fa-user"></div>
      <?php
else: ?>
         <div id="login-btn" class="fas fa-user-circle"></div>
      <?php
endif; ?>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</section>
<?php include '../../login_modal.php'; ?>
<?php include 'user_sidebar_ar.php'; ?>
<!-- header section ends -->
<!-- header section ends -->
<!-- home section starts  -->
<section class="home">
   <div class="swiper home-slider">
   <div class="swiper-wrapper">
         <div class="swiper-slide slide" style="background:url(../../images/home-slide-1.jpg) no-repeat">
            <div class="content">
               <span>استكشف، اكتشف، سافر</span>
               <h3>سافر حول العالم</h3>
               <a href="package arabic.php" class="btn">اكتشف المزيد</a>
            </div>
         </div>
         <div class="swiper-slide slide" style="background:url(../../images/home-slide-2.jpg) no-repeat">
            <div class="content">
               <span>استكشف، اكتشف، سافر</span>
               <h3>اكتشف وجهات جديدة</h3>
               <a href="package arabic.php" class="btn">اكتشف المزيد</a>
            </div>
         </div>
         <div class="swiper-slide slide" style="background:url(../../images/home-slide-3.jpg) no-repeat">
            <div class="content">
               <span>استكشف، اكتشف، سافر</span>
               <h3>اجعل رحلتك لا تُنسى</h3>
               <a href="package arabic.php" class="btn">اكتشف المزيد</a>
            </div>
         </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>
</section>
<!-- home section ends -->
<!-- services section starts  -->
<section class="services">
   <h1 class="heading-title"> خدماتنا </h1>
   <div class="box-container">
      <div class="box">
         <img src="../../images/icon-2.png" alt="">
         <h3>مرشد سياحي</h3>
      </div>
      <div class="box">
         <img src="../../images/icon-6.png" alt="">
         <h3>تخييم</h3>
      </div>
      <div class="box">
         <img src="../../images/icon-1.png" alt="">
         <h3>مغامرات</h3>
      </div>
      <div class="box">
         <img src="../../images/icon-3.png" alt="">
         <h3>تسلق الجبال</h3>
      </div>
      <div class="box">
         <img src="../../images/icon-5.png" alt="">
         <h3>طرق وعرة</h3>
      </div>
      <div class="box">
         <img src="../../images/icon-4.png" alt="">
         <h3>نار المخيم</h3>
      </div>
   </div>
</section>
<!-- services section ends -->
<!-- home about section starts  -->
<section class="home-about">
   <div class="image">
      <img src="../../images/about-img.jpg" alt="">
   </div>
   <div class="content">
      <h3>لماذا تختارنا؟</h3>
      <p>لأننا لا نقدم مجرد جولات سياحية، بل نصنع لك ذكريات تدوم للأبد. نحن نجمع بين الخبرة المحلية في مصر والمعايير الدولية في تنظيم الرحلات. مع باقاتنا المتنوعة، نضمن لك سهولة الحجز، وشفافية الأسعار، وتجربة سفر خالية من المتاعب، حيث نهتم بكافة التفاصيل من لحظة وصولك للمطار وحتى عودتك بسلام.</p>
      <a href="about arabic.php" class="btn">اقرأ المزيد</a>
   </div>
</section>
<!-- home about section ends -->
<!-- home packages section starts  -->
<section class="home-packages">
   <h1 class="heading-title"> باقاتنا </h1>
   <div class="box-container">
      <div class="box">
         <div class="image">
            <img src="../../images/img-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة دبي</h3>
            <p>استمتع بالإمارات مع تجربة لا تُنسى من خلال باقات دبي الأكثر مبيعاً لدينا!</p>
            <h2>10,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20دبي&price=10900" class="btn">احجز الآن</a>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="../../images/img-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة دلهي</h3>
            <p>استمتع بالإمارات مع تجربة لا تُنسى من خلال باقات دلهي الأكثر مبيعاً لدينا!</p>
            <h2>9,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20الهند&price=9900" class="btn">احجز الآن</a>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="../../images/img-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة اليابان</h3>
            <p>استمتع بالإمارات مع تجربة لا تُنسى من خلال باقات اليابان الأكثر مبيعاً لدينا!</p>
            <h2>11,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20اليابان&price=11900" class="btn">احجز الآن</a>
         </div>
      </div>
   </div>
   <div class="load-more"> <a href="package arabic.php" class="btn">تحميل المزيد</a> </div>
</section>
<!-- home packages section ends -->


<section class="partner">
   <h1 class="heading-title"> شركاؤنا </h1>
   <div class="box-container">
      <div class="partner">
         <img src="../../images/sp1.png" alt="">
      </div>
      <div class="partner">
         <img src="../../images/sp2.png" alt="">
      </div>
      <div class="partner">
         <img src="../../images/sp3.png" alt="">
      </div>
      <div class="partner">
         <img src="../../images/sp4.png" alt="">
      </div>
      <div class="partner">
         <img src="../../images/sp5.png" alt="">
      </div>
   </div>
</section>


<!-- home offer section starts  -->
<section class="home-offer home-packages">
   <div class="content">
      <div class="offerimage">
      <img src="../../images/offer.jpg">
      </div>
   </div>
   <div class="content">
      <h3>خصم يصل إلى 40%</h3>
      <p>يقع منتجع بالي داينستي في موقع مركزي على بعد مسافة قصيرة سيراً على الأقدام من الحياة الليلية والإثارة في منطقة كوتا. يوفر مكان الإقامة الشهير في بالي مجموعة واسعة من أنواع الغرف التي تناسب العائلات والأزواج. يمكن للأطفال الاستمتاع في نادي الأطفال بينما يدلل البالغون أنفسهم في سبا أشوكا أو نادي الشاطئ. لإقامة لا تُنسى ومريحة في كوتا، لماذا لا تقيم في منتجع بالي داينستي.</p>
      <a href="book arabic.php?p=باقة%20جولة%20بالي&price=14900" class="btn">احجز الآن</a>
   </div>
</section>
<!-- home offer section ends -->

<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
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
         <a href="faq arabic.php"> <i class="fas fa-angle-right"></i>اساله شائعه</a>
         <a href="terms.php"> <i class="fas fa-angle-right"></i> شروط الاستخدام</a>
         <a href="privacy.php"> <i class="fas fa-angle-right"></i> سياسة الخصوصية</a>
      </div>
      <div class="box">
         <h3>معلومات الاتصال</h3>
         <a href="#"> <i class="fas fa-phone"></i> +020-000-0000 </a>
         <a href="https://wa.me/+201014130237"> <i class="fab fa-whatsapp"></i> +201014130237 </a>
         <a href="https://mail.google.com"> <i class="fas fa-envelope"></i> example@email.com </a>
         <a href="https://maps.app.goo.gl/22352352352352352"> <i class="fas fa-map"></i> cairo, egypt </a>
      </div>
      <div class="box">
         <h3>تابعنا</h3>
         <a href="https://www.facebook.com"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.X.com"> <i class="fab fa-twitter"></i> twitter/X </a>
         <a href="https://www.instagram.com"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://www.linkedin.com"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>
   </div>
   <div class="credit"> <span>فريق 21</span> | جميع الحقوق محفوظة! </div>
</section>
<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>