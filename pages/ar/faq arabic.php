<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>اسأل سؤالاً</title>
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
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
   <a href="home arabic.php" class="logo">منصة وكاله سياحيه | مجموعه 21</a>
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

<div class="heading" style="background:url(../../images/header-bg-1.png) no-repeat">
   <h1>الأسئلة الشائعة</h1>
</div>

<!-- faq section starts  -->
<section class="faq">

   <h1 class="heading-title"> الأسئلة الأكثر شيوعاً </h1>

   <div class="accordion-container">

      <div class="accordion">
         <div class="accordion-header">
            <h3>كيف أحجز رحلة؟</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>يمكنك حجز رحلة عن طريق زيارة صفحة "حجز"، وملء النموذج بتفاصيلك، وإرساله. سنتصل بك قريباً لتأكيد حجزك.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>ما هي طرق الدفع المقبولة؟</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>نقبل طرق دفع مختلفة بما في ذلك بطاقات الائتمان/الخصم، والتحويلات المصرفية، والدفع النقدي في مكتبنا.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>هل يمكنني إلغاء حجزي؟</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>نعم، يمكنك إلغاء حجزك. يرجى مراجعة سياسة الإلغاء الخاصة بنا للحصول على تفاصيل حول المبالغ المستردة رسوم الإلغاء.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>هل تقدمون باقات مخصصة؟</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>بالتأكيد! يمكننا تخصيص باقات سياحية لتناسب تفضيلاتك ومتطلباتك. فقط اتصل بنا باحتياجاتك.</p>
         </div>
      </div>

      <div class="accordion">
         <div class="accordion-header">
            <h3>هل التأمين على السفر مشمول؟</h3>
            <span class="fas fa-plus"></span>
         </div>
         <div class="accordion-body">
            <p>التأمين على السفر غير مشمول في سعر الباقة القياسي ولكن يمكن ترتيبه عند الطلب مقابل رسوم إضافية.</p>
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
<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
