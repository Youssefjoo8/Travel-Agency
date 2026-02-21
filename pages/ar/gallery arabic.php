<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gallary</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">

    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->

    
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
      <a href="../en/home.php" class="fas fa-globe"></a>
      <div id="theme-btn" class="fas fa-moon"></div>
      <div id="menu-btn" class="fas fa-bars"></div>
   </div>
</section>
<!-- header section ends -->
    
    <div class="heading" style="background:url(../../images/header-bg-2.png) no-repeat">
   <h1>معرض الصور</h1>
</div>
<section class="gallary" id="gallary">


    <div class="container">
        <div class="box">
            <img src="../../images/g-1.jpg" alt="">
            <div class="content">
                <h3>سحر التاريخ</h3>
                <p>اكتشف سحر الطبيعة الخلابة في وجهتك القادمة.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-2.jpg" alt="">
            <div class="content">
                <h3>ملاذك الهادئ</h3>
                <p>لحظات لا تُنسى في أجمل بقاع الأرض.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-3.jpg" alt="">
            <div class="content">
                <h3>وجهة الأحلام</h3>
                <p>عِش المغامرة التي طالما حلمت بها.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-4.jpg" alt="">
            <div class="content">
                <h3>جمال لا يوصف</h3>
                <p>احجز مقعدك الآن واستعد لرحلة العمر</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-5.jpg" alt="">
            <div class="content">
                <h3>عطلة خيالية</h3>
                <p>باقات حصرية صُممت خصيصاً لتناسب ذوقك.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-6.jpg" alt="">
            <div class="content">
                <h3>وجهة الأحلام</h3>
                <p>سافر براحة تامة مع أفضل خدمات التنظيم..</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-7.jpg" alt="">
            <div class="content">
                <h3>استكشف العالم</h3>
                <p>حيث تلتقي الفخامة بجمال الطبيعة.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-8.jpg" alt="">
            <div class="content">
                <h3>مكان رائع</h3>
                <p>الهروب المثالي من صخب الحياة اليومية.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
        <div class="box">
            <img src="../../images/g-9.jpg" alt="">
            <div class="content">
                <h3>مغامرة جديدة</h3>
                <p>اصنع ذكريات تدوم للأبد مع أحبائك.</p>
                <!-- <a href="" class="btn">See more</a> -->
            </div>
        </div>
    </div>

</section>

    <!----------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------->
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
   <div class="credit"> <span>فريق 21</span> | جميع الحقوق محفوظة! </div>
</section>
<!-- footer section ends -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

 </body>

</html>