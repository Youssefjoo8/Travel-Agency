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

<div class="heading" style="background:url(../../images/header-bg-2.png) no-repeat">
   <h1>الرحلات</h1>
</div>

<!-- packages section starts  -->

<section class="packages">

   <h1 class="heading-title">أشهر الوجهات</h1>

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
            <h3>رحله الي الهند</h3>
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

      <div class="box">
         <div class="image">
            <img src="../../images/img-4.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة استراليا</h3>
            <p>استمتع بالإمارات مع تجربة لا تُنسى من خلال باقات استراليا الأكثر مبيعاً لدينا!</p>
            <h2>13,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20استراليا&price=13900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-5.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة الصين</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات الصين الأكثر مبيعاً لدينا!</p>
            <h2>7,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20الصين&price=7900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-6.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة سنغافورة</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات سنغافورة الأكثر مبيعاً لدينا!</p>
            <h2>12,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20سنغافورة&price=12900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-7.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة اسبانيا</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات اسبانيا الأكثر مبيعاً لدينا!</p>
            <h2>18,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20اسبانيا&price=18900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-8.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة كندا</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات كندا الأكثر مبيعاً لدينا!</p>
            <h2>21,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20كندا&price=21900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-9.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة بالي</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات بالي الأكثر مبيعاً لدينا!</p>
            <h2>14,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20بالي&price=14900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-10.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة نيبال</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات نيبال الأكثر مبيعاً لدينا!</p>
            <h2>7,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20نيبال&price=7900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-11.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة بنغلاديش</h3>
            <p>استمتع بيأجمل اللحظات مع تجربة لا تُنسى من خلال باقات بنغلاديش الأكثر مبيعاً لدينا!</p>
            <h2>5,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20بنغلاديش&price=5900" class="btn">احجز الآن</a>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="../../images/img-12.jpg" alt="">
         </div>
         <div class="content">
            <h3>باقات جولة اليابان</h3>
            <p>استمتع بالإمارات مع تجربة لا تُنسى من خلال باقات اليابان الأكثر مبيعاً لدينا!</p>
            <h2>11,900 جنيه</h2>
            <a href="book arabic.php?p=باقة%20جولة%20اليابان&price=11900" class="btn">احجز الآن</a>
         </div>
      </div>

   </div>

   <div class="load-more"><span class="btn">عرض المزيد</span></div>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

</section>

<!-- packages section ends -->
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
         <a href="https://maps.app.goo.gl/22352352352352352"> <i class="fas fa-map"></i> cairo, egypt</a>
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