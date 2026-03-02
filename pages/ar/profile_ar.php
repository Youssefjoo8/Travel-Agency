<?php
session_start();

// If the user ID is not set in the session, they are not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php?login_required=true");
    exit();
}

include '../../config.php';
$user_id = $_SESSION['user_id'];
// Fetch standard info plus the new phone column
$q = "SELECT id, Full_name, email, phone, Profile_image FROM users WHERE id = '$user_id'";
$res = mysqli_query($connection, $q);
$user_data = mysqli_fetch_assoc($res);

$page = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>الملف الشخصي :: وكاله سياحيه</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   <style>
      /* Epic Games Style Settings */
      :root {
          --settings-bg: #ffffff;
          --settings-sidebar: #ffffff;
          --settings-text: #0F172A;
          --settings-label: #555555;
          --settings-border: #e0e0e0;
          --settings-input-bg: #ffffff;
      }

      /* Apply Deep Black/Dark Gray for Dark Mode */
      [data-theme="dark"] {
          --settings-bg: #121212;
          --settings-sidebar: #121212;
          --settings-text: #ffffff;
          --settings-label: #b3b3b3;
          --settings-border: #333333;
          --settings-input-bg: #1a1a1a;
      }

      body {
          background-color: var(--settings-bg) !important;
          color: var(--settings-text) !important;
      }

      .settings-layout {
          display: flex;
          min-height: 80vh;
          max-width: 1400px;
          margin: 0 auto;
          margin-top: 120px; /* offset for fixed header */
          padding: 2rem;
          gap: 4rem;
          margin-bottom: 50px;
      }

      /* Sidebar styling */
      .settings-sidebar {
          width: 300px;
          background: var(--settings-sidebar);
          border-radius: 12px;
          padding: 2rem;
          display: flex;
          flex-direction: column;
          gap: 1rem;
          height: fit-content;
          border: 1px solid var(--settings-border);
      }

      .settings-sidebar a {
          color: var(--settings-label);
          font-size: 1.5rem;
          padding: 1.5rem;
          text-decoration: none;
          border-radius: 8px;
          transition: 0.3s;
          display: flex;
          align-items: center;
          gap: 15px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: 1px;
      }

      .settings-sidebar a:hover {
          background: rgba(0, 120, 242, 0.1);
          color: #0078f2;
      }

      .settings-sidebar a.active {
          background: rgba(0, 120, 242, 0.1);
          color: #0078f2;
          border-left: 4px solid #0078f2;
      }

      /* Main Content Area */
      .settings-content {
          flex: 1;
          display: flex;
          flex-direction: column;
          gap: 4rem;
      }

      h2.section-title {
          font-size: 3rem;
          color: var(--settings-text);
          margin-bottom: 1rem;
          font-weight: 800;
          text-transform: uppercase;
          letter-spacing: 1px;
      }

      .settings-card {
          background: var(--settings-sidebar);
          padding: 4rem 3rem;
          border-radius: 12px;
          border: 1px solid var(--settings-border);
      }

      .settings-card h3 {
          font-size: 2.2rem;
          color: var(--settings-text);
          margin-bottom: 2.5rem;
          border-bottom: 1px solid var(--settings-border);
          padding-bottom: 1.5rem;
          font-weight: 700;
      }

      .form-row {
          display: flex;
          gap: 2rem;
          flex-wrap: wrap;
      }

      .form-group {
          margin-bottom: 2.5rem;
          position: relative;
          flex: 1;
          min-width: 250px;
      }

      .form-group label {
          display: block;
          font-size: 1.3rem;
          color: var(--settings-label);
          margin-bottom: 1rem;
          text-transform: uppercase;
          font-weight: 700;
          letter-spacing: 0.5px;
      }

      .settings-input {
          width: 100%;
          padding: 1.5rem;
          font-size: 1.5rem;
          background: var(--settings-input-bg);
          border: 1px solid var(--settings-border);
          color: var(--settings-text);
          border-radius: 8px;
          transition: 0.3s;
          box-sizing: border-box;
      }

      .settings-input:focus {
          outline: none;
          border-color: #F59E0B; /* Orange focus state */
          box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.15);
      }

      .settings-input.error {
          border-color: #ff4d4d;
      }

      .error-msg {
          color: #ff4d4d;
          font-size: 1.2rem;
          margin-top: 8px;
          display: none;
          font-weight: 600;
      }

      .settings-input.error + .error-msg {
          display: block;
      }

      .settings-input[readonly] {
          opacity: 0.7;
          cursor: not-allowed;
      }

      .btn-save {
          background: #0078f2; /* Bright Blue */
          color: #fff;
          font-size: 1.5rem;
          padding: 1.5rem 4rem;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          font-weight: 800;
          text-transform: uppercase;
          transition: 0.3s;
          letter-spacing: 1px;
          display: inline-block;
          margin-top: 1rem;
      }

      .btn-save:hover {
          filter: brightness(1.1);
          transform: translateY(-2px);
          box-shadow: 0 10px 20px rgba(0, 120, 242, 0.2);
      }

      .btn-save:disabled {
          opacity: 0.7;
          cursor: not-allowed;
      }

      .back-btn {
          margin-top: 3rem;
          background: #e11d48;
          color: #fff !important;
          text-align: center;
          justify-content: center;
          border: none;
      }
      .back-btn:hover {
          background: #be123c !important;
          color: #fff !important;
      }

      .profile-message {
          font-size: 1.5rem;
          margin-bottom: 2rem;
          font-weight: bold;
          padding: 1.5rem;
          border-radius: 8px;
          display: none;
      }

      .msg-success {
          background: rgba(46, 204, 113, 0.1);
          color: #2ecc71;
          border: 1px solid rgba(46, 204, 113, 0.2);
      }

      .msg-error {
          background: rgba(255, 77, 77, 0.1);
          color: #ff4d4d;
          border: 1px solid rgba(255, 77, 77, 0.2);
      }
   </style>
</head>
<body>
   
<!-- header section starts  -->
<section class="header">
   <a href="home.php" class="logo"> <i class="fas fa-globe-americas"></i> TRAVEL AGENCY </a>
   <nav class="navbar">
      <a href="home.php" class="<?php echo($page == 'home.php') ? 'active' : ''; ?>">الرئيسية</a>
      <a href="about.php" class="<?php echo($page == 'about.php') ? 'active' : ''; ?>">حول</a>
      <a href="package.php" class="<?php echo($page == 'package.php') ? 'active' : ''; ?>">الباقات</a>
      <a href="book.php" class="<?php echo($page == 'book.php') ? 'active' : ''; ?>">الحجز</a>
      <a href="gallery.php" class="<?php echo($page == 'gallery.php') ? 'active' : ''; ?>">المعرض</a>
   </nav>
   <div class="icons">
      <a href="../en/home.php" class="fas fa-globe"></a>
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
<?php include 'sidebar_ar.php'; ?>
<!-- header section ends -->

<!-- Two Column Settings Layout -->
<div class="settings-layout">
    <!-- Left Sidebar -->
    <div class="settings-sidebar">
        <a href="#account" class="tab-link active" data-target="pane-account"><i class="fas fa-user"></i> الحساب</a>
        <a href="#security" class="tab-link" data-target="pane-security"><i class="fas fa-shield-alt"></i> الأمان</a>
        <a href="#payment" class="tab-link" data-target="pane-payment"><i class="fas fa-credit-card"></i> الدفع</a>
        
        <a href="home arabic.php" class="back-btn"><i class="fas fa-arrow-left"></i> الصفحة الرئيسية</a>
    </div>

    <!-- Right Content Area -->
    <div class="settings-content">
        
        <!-- Account Pane -->
        <div id="pane-account" class="tab-pane" style="display: block;">
            <h2 class="section-title">إعدادات الحساب</h2>
            <form id="profile-form" class="settings-form">
                <div id="profile-message" class="profile-message"></div>

                <div class="settings-card">
                    <h3>معلومات الحساب</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>معرف المستخدم</label>
                            <input type="text" class="settings-input" value="<?php echo htmlspecialchars($user_data['id'] ?? ''); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>الاسم الكامل</label>
                            <input type="text" name="full_name" class="settings-input required-field" value="<?php echo htmlspecialchars($user_data['Full_name'] ?? ''); ?>" placeholder="أدخل اسمك الكامل">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="email" name="email" class="settings-input required-field" value="<?php echo htmlspecialchars(strtolower($user_data['email'] ?? '')); ?>" placeholder="أدخل بريدك الإلكتروني">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                    </div>
                </div>

                <div class="settings-card">
                    <h3>تفاصيل شخصية</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="tel" name="phone" id="phone_number" class="settings-input required-field" value="<?php echo htmlspecialchars($user_data['phone'] ?? ''); ?>" placeholder="رقم الهاتف">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                    </div>
                    
                    <div style="text-align: right;">
                        <button type="submit" class="btn-save saveBtn">حفظ التغييرات</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Security Pane -->
        <div id="pane-security" class="tab-pane" style="display: none;">
            <h2 class="section-title">إعدادات الأمان</h2>
            <form id="security-form" class="settings-form">
                <div id="security-message" class="profile-message"></div>

                <div class="settings-card">
                    <h3>إدارة كلمة المرور</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label>كلمة المرور الجديدة</label>
                            <input type="password" name="password" id="new_password" class="settings-input required-field" placeholder="أدخل كلمة المرور الجديدة">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                        <div class="form-group">
                            <label>تأكيد كلمة المرور</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="settings-input required-field" placeholder="تأكيد كلمة المرور">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button type="submit" class="btn-save saveBtn">تحديث كلمة المرور</button>
                    </div>
                </div>
            </form>

            <div class="settings-card" style="margin-top: 4rem;">
                <h3>المصادقة الثنائية (2FA)</h3>
                <p style="font-size: 1.4rem; color: var(--settings-label); margin-bottom: 2rem;">احمِ حسابك بطبقة إضافية من الأمان. سيتم إرسال رموز التحقق إلى رقم هاتفك المرتبط.</p>
                <div class="form-row">
                    <div class="form-group">
                        <label>رقم الهاتف المرتبط</label>
                        <input type="text" class="settings-input" value="<?php echo htmlspecialchars($user_data['phone'] ?? 'Not Provided'); ?>" readonly>
                    </div>
                </div>
                <!-- Adding Bright Blue logic per request -->
                <button type="button" class="btn-save" style="background: #0078f2; margin-top: 0;">تمكين المصادقة الثنائية عبر الرسائل القصيرة</button>
            </div>

            <div class="settings-card" style="margin-top: 4rem;">
                <h3>سجل الدخول</h3>
                <p style="font-size: 1.4rem; color: var(--settings-label); margin-bottom: 2rem;">الأجهزة والمواقع الحديثة التي تم تسجيل الدخول منها إلى حسابك.</p>
                <div style="border: 1px solid var(--settings-border); border-radius: 8px; overflow: hidden;">
                    <div style="padding: 1.5rem; border-bottom: 1px solid var(--settings-border); font-size: 1.4rem; color: var(--settings-text); display: flex; justify-content: space-between;">
                        <span><i class="fas fa-desktop"></i> Windows PC - Chrome</span>
                        <span style="color: #2ecc71;">Current Session</span>
                    </div>
                    <div style="padding: 1.5rem; font-size: 1.4rem; color: var(--settings-label); display: flex; justify-content: space-between;">
                        <span><i class="fas fa-mobile-alt"></i> iPhone 13 - Safari</span>
                        <span>Yesterday, Cairo, Egypt</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Pane -->
        <div id="pane-payment" class="tab-pane" style="display: none;">
            <h2 class="section-title">طرق الدفع</h2>
            <form id="payment-form" class="settings-form">
                <div id="payment-message" class="profile-message"></div>

                <div class="settings-card">
                    <h3>إضافة بطاقة ائتمان/خصم</h3>
                    <div class="form-row">
                        <div class="form-group" style="flex: 100%;">
                            <label>رقم البطاقة</label>
                            <input type="text" name="card_number" class="settings-input required-field" placeholder="0000 0000 0000 0000" maxlength="19">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>تاريخ الانتهاء</label>
                            <input type="text" name="expiry" class="settings-input required-field" placeholder="MM/YY" maxlength="5">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                        <div class="form-group">
                            <label>CVV</label>
                            <input type="text" name="cvv" class="settings-input required-field" placeholder="123" maxlength="4">
                            <span class="error-msg">هذا الحقل مطلوب</span>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button type="submit" class="btn-save saveBtn">حفظ البطاقة</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- footer section starts  -->
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>روابط سريعة</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> الرئيسية</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> حول</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> الباقات</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> الحجز</a>
      </div>
      <div class="box">
         <h3>روابط إضافية</h3>
         <a href="about.php"> <i class="fas fa-angle-right"></i> حول</a>
         <a href="faq.php"> <i class="fas fa-angle-right"></i> الأسئلة الشائعة </a>
         <a href="terms.php"> <i class="fas fa-angle-right"></i> شروط الاستخدام</a>
         <a href="privacy.php"> <i class="fas fa-angle-right"></i> سياسة الخصوصية</a>
      </div>
      <div class="box">
         <h3>معلومات الاتصال</h3>
         <a href="#"> <i class="fas fa-phone"></i> +020-000-0000 </a>
         <a href="https://wa.me/+201014130237"> <i class="fab fa-whatsapp"></i> +201014130237 </a>
         <a href="https://mail.google.com"> <i class="fas fa-envelope"></i> example@email.com </a>
         <a href="https://maps.app.goo.gl/22352352352352352"> <i class="fas fa-map"></i> cairo, Egypt  </a>
      </div>
      <div class="box">
         <h3>تابعنا</h3>
         <a href="https://www.facebook.com"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.X.com"> <i class="fab fa-twitter"></i> twitter/X </a>
         <a href="https://www.instagram.com"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://www.linkedin.com"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>
   </div>
   <div class="credit"> تصميم <span>فريق 21</span> | جميع الحقوق محفوظة! </div>
</section>

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

<script>
$(document).ready(function() {
    // Tab Switching Logic
    $('.tab-link').on('click', function(e) {
        e.preventDefault();
        $('.tab-link').removeClass('active');
        $(this).addClass('active');
        
        const targetPane = $(this).data('target');
        $('.tab-pane').hide();
        $('#' + targetPane).fadeIn(300);
    });

    // Form Validation and Submission (Generic for all `.settings-form`)
    $('.settings-form').on('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        const form = $(this);
        
        // Remove prior errors in this form
        form.find('.settings-input').removeClass('error');
        
        // Validate required fields in this form
        form.find('.required-field:not([readonly])').each(function() {
            if ($(this).val().trim() === '') {
                $(this).addClass('error');
                isValid = false;
            }
        });

        if (!isValid) return;

        // Custom password check for security form
        if (form.attr('id') === 'security-form') {
            const pass = $('#new_password').val();
            const conf = $('#confirm_password').val();
            if (pass !== conf) {
                $('#new_password, #confirm_password').addClass('error');
                $('#security-message').removeClass('msg-success').addClass('msg-error').text('Passwords do not match.').show();
                return;
            }
        }

        const submitBtn = form.find('.saveBtn');
        const originalText = submitBtn.text();
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        
        // We simulate saving logic for purely UI portions, or submit if it's the profile form or security form
        if (form.attr('id') === 'profile-form' || form.attr('id') === 'security-form') {
            const formData = new FormData(this);
            $.ajax({
                url: '../../update_profile.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    const msgBox = form.find('.profile-message');
                    msgBox.removeClass('msg-error msg-success').show();
                    
                    if (response.success) {
                        msgBox.addClass('msg-success').text(response.message);
                        if(response.user && response.user.Full_name) {
                            $('#sidebar-user-name').text(response.user.Full_name);
                        }
                        if (form.attr('id') === 'security-form') {
                            form[0].reset();
                        }
                    } else {
                        msgBox.addClass('msg-error').text(response.message || 'Error saving changes.');
                    }
                },
                error: function() {
                    const msgBox = form.find('.profile-message');
                    msgBox.removeClass('msg-success').addClass('msg-error').text('Connection error. Please try again.').show();
                },
                complete: function() {
                    submitBtn.prop('disabled', false).text(originalText);
                    setTimeout(() => { form.find('.profile-message').fadeOut(); }, 5000);
                }
            });
        } else {
            // Fake submission for Payment
            setTimeout(() => {
                const msgBox = form.find('.profile-message');
                msgBox.removeClass('msg-error').addClass('msg-success').text('Card saved successfully!').show();
                submitBtn.prop('disabled', false).text(originalText);
                form[0].reset();
                setTimeout(() => { msgBox.fadeOut(); }, 5000);
            }, 1000);
        }
    });

    // Remove error class on typing
    $('.settings-input').on('input', function() {
        if ($(this).hasClass('error') && $(this).val().trim() !== '') {
            $(this).removeClass('error');
        }
    });
});
</script>

</body>
</html>
