<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>سياسة الخصوصية</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script>
      $(document).ready(function(){
          $(".scroll-top").click(function() {
              $("html, body").animate({ scrollTop: 0 }, "slow");
              return false;
          });
      });
   </script>
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

<section class="header">
   <a href="home arabic.php" class="logo"> <i class="fas fa-globe-americas"></i> منصة وكاله سياحيه | مجموعه 21</a>
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

<div class="heading" style="background:url(../../images/header-bg-2.png) no-repeat">
   <h1>سياسة الخصوصية</h1>
</div>

<section class="legal-container">
    <h1>سياسة الخصوصية</h1>
    <p>خصوصيتك مهمة بالنسبة لنا. من سياسة وكالتنا السياحية احترام خصوصيتك فيما يتعلق بأي معلومات قد نجمعها منك عبر موقعنا الإلكتروني.</p>

    <h2>1. المعلومات التي نجمعها</h2>
    <p>نحن نطلب المعلومات الشخصية فقط عندما نحتاج إليها حقًا لتقديم خدمة لك. نحن نجمعها بوسائل عادلة ومشروعة، بمعرفتك وموافقتك. كما نعلمك أيضًا سبب جمعنا لها وكيف سيتم استخدامها.</p>

    <h2>2. كيف نستخدم المعلومات</h2>
    <p>نستخدم المعلومات التي نجمعها لتشغيل وصيانة موقعنا وخدماتنا، ولإرسال النشرات الإخبارية، والمواد التسويقية أو الترويجية، وغيرها من المعلومات التي قد تهمك.</p>

    <h2>3. حماية البيانات</h2>
    <p>نحن لا نشارك أي معلومات تعريف شخصية علنًا أو مع أطراف ثالثة، إلا عندما يقتضي القانون ذلك. نحن نحتفظ بالمعلومات التي تم جمعها طالما كان ذلك ضروريًا لتزويدك بالخدمة المطلوبة.</p>

    <h2>4. ملفات تعريف الارتباط (Cookies)</h2>
    <p>نحن نستخدم ملفات تعريف الارتباط لمساعدتنا في تحديد وتتبع الزوار، واستخدامهم لموقعنا، وتفضيلات الوصول إلى موقع الويب الخاص بهم. يجب على الزوار الذين لا يرغبون في وضع ملفات تعريف الارتباط على أجهزة الكمبيوتر الخاصة بهم ضبط متصفحاتهم لرفض ملفات تعريف الارتباط.</p>
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
