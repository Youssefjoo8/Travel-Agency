<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>شروط الاستخدام</title>
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
           border-right: 5px solid var(--tomato);
           padding-right: 1.5rem;
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

<div class="heading" style="background:url(../../images/header-bg-1.png) no-repeat">
   <h1>شروط الاستخدام</h1>
</div>

<section class="legal-container">
    <h1>شروط الاستخدام</h1>
    <p>مرحباً بك في وكالتنا السياحية. باستخدامك لموقعنا وخدماتنا، فإنك توافق على الالتزام بالشروط والأحكام التالية. يرجى قراءتها بعناية.</p>

    <h2>1. قبول الشروط</h2>
    <p>من خلال الدخول إلى هذا الموقع واستخدامه، فإنك تقبل وتوافق على الالتزام بهذه الشروط والأحكام. بالإضافة إلى ذلك، عند استخدام خدماتنا الخاصة، ستخضع لأي إرشادات أو قواعد منشورة تنطبق على هذه الخدمات.</p>

    <h2>2. استخدام الخدمة</h2>
    <p>أنت توافق على استخدام هذا الموقع لأغراض مشروعة فقط. يُحظر عليك نشر أو نقل أي مواد غير قانونية، ضارة، تهديدية، مسيئة، تشهيرية، مبتذلة، فاحشة، أو غير مقبولة من خلال هذا الموقع.</p>

    <h2>3. سياسة الحجز</h2>
    <p>جميع الحجوزات التي تتم من خلال موقعنا تخضع للتوافر والتأكيد. الأسعار قابلة للتغيير دون إشعار مسبق. نحتفظ بالحق في إلغاء أو تعديل الحجوزات إذا تبين أن العميل شارك في نشاط احتيالي أو غير لائق.</p>

    <h2>4. حدود المسؤولية</h2>
    <p>لا تتحمل وكالتنا السياحية أي مسؤولية عن أي أضرار مباشرة، غير مباشرة، عرضية، خاصة، أو تبعية، بما في ذلك على سبيل المثال لا الحصر، الأضرار الناجمة عن خسارة الأرباح، الشهرة، البيانات أو غيرها من الخسائر غير الملموسة الناتجة عن استخدام الخدمة أو عدم القدرة على استخدامها.</p>
</section>

<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

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

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

</body>
</html>
