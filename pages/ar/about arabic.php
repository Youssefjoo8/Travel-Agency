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

<div class="heading" style="background:url(../../images/header-bg-1.png) no-repeat">
   <h1>من نحن</h1>
</div>

<!-- about section starts  -->
<section class="about">
   <div class="image">
      <img src="../../images/about-img.jpg" alt="">
   </div>
   <div class="content">
      <h3>لماذا تختارنا؟</h3>
      <p>لأننا لا نقدم مجرد جولات سياحية، بل نصنع لك ذكريات تدوم للأبد. نحن نجمع بين الخبرة المحلية في مصر والمعايير الدولية في تنظيم الرحلات. مع باقاتنا المتنوعة، نضمن لك سهولة الحجز، وشفافية الأسعار، وتجربة سفر خالية من المتاعب، حيث نهتم بكافة التفاصيل من لحظة وصولك للمطار وحتى عودتك بسلام</p>
      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>أفضل الوجهات</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>خدمة 24/7</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>أسعار مناسبة</span>
         </div>
      </div>
   </div>
</section>

</section>

<!-- stats section starts -->

<section class="stats">
   <h1 class="heading-title"> إحصائياتنا </h1>
   <div class="box-container">
      <div class="box">
         <div class="image">
            <img src="../../images/icon-1.png" alt="">
         </div>
         <div class="content">
            <h3>+1000</h3>
            <p>عميل سعيد</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="../../images/icon-2.png" alt="">
         </div>
         <div class="content">
            <h3>+50</h3>
            <p>وجهة سياحية</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="../../images/icon-3.png" alt="">
         </div>
         <div class="content">
            <h3>+20</h3>
            <p>سنة خبرة</p>
         </div>
      </div>
      <div class="box">
         <div class="image">
            <img src="../../images/icon-4.png" alt="">
         </div>
         <div class="content">
            <h3>+100</h3>
            <p>رحلة مكتملة</p>
         </div>
      </div>
   </div>
</section>

<!-- stats section ends -->

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading-title"> آراء العملاء </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>تجربة حالمة بكل معنى الكلمة! قمت بحجز رحلة مخصصة إلى أوروبا عبر هذا الموقع، وتم التعامل مع كل تفصيل بدقة متناهية. كانت اختيارات الفنادق ممتازة وفي قلب المدينة تماماً. كما كان فريق دعم العملاء سريع الاستجابة بشكل مذهل في كل مرة كان لدي فيه استفسار. أنصح به بشدة!.</p>
            <h3>صوفيا مارتينيز</h3>
            <span>مسافر</span>
            <img src="../../images/pic-4.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>لقد تعاملت مع العديد من وكالات السفر من قبل، ولكن هذه الوكالة تتميز بالشفافية وسهولة الاستخدام. لا توجد رسوم خفية، كما أن مواعيد رحلات الربط (الترانزيت) كانت مثالية لتجنب الانتظار الطويل. إنه لمن دواعي الارتياح العثور على خدمة تفي بوعودها فعلاً. سأقوم بالتأكيد بحجز عطلتي الشتوية من هنا.</p>
            <h3>ديفيد تشن</h3>
            <span>مسافر</span>
            <img src="../../images/pic-5.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>أفضل قيمة مقابل سعر وجدتها منذ سنوات. حجزنا باقة عائلية لستة أشخاص، وكان كل شيء بدءاً من الانتقالات من المطار وصولاً إلى الجولات اليومية يسير بسلاسة تامة. لقد جعل ذلك السفر مع الأطفال أقل توتراً بكثير. شكراً لكم على جعل عطلتنا الصيفية لا تُنسى حقاً!</p>
            <h3>ياسمين الفارسي</h3>
            <span>مسافر</span>
            <img src="../../images/pic-6.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>كالعادة خدمة رائعة، صفر مشاكل في الاتصال. أفضل جزء في السفر عبر الإنترنت هو أنه يمكنك الحضور إلى المطار بجواز سفرك وكل شيء آخر منظم من أجلك.</p>
            <h3>نورا</h3>
            <span>traveler</span>
            <img src="../../images/pic-2.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>كانت كريستي مفيدة للغاية في العثور لي على فندق بسعر معقول وقريب من الترام في وقت قصير لعطلة نهاية الأسبوع. سأستخدم هذه الخدمة بالتأكيد مرة أخرى.</p>
            <h3>تيجان كيليان</h3>
            <span>traveler</span>
            <img src="../../images/pic-1.png" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>كانت الباقة قيمة رائعة، وتم إرسال المستندات إلينا في الوقت المناسب ومرت عطلتنا دون أي عوائق. كل شيء كان سلساً للغاية! شكراً لكم.</p>
            <h3>آدم ويليامسون</h3>
            <span>traveler</span>
            <img src="../../images/pic-3.png" alt="">
         </div>

      </div>

   </div>

</section>

<!-- reviews section ends -->
<!-- footer section starts  -->
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

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>


</body>
</html>