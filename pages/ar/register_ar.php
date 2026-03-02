<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: home arabic.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل حساب جديد :: وكاله سياحيه</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        :root {
            --glass-bg: rgba(18, 18, 18, 0.6);
            --glass-border: rgba(255, 255, 255, 0.1);
            --text-color: #e0e0e0;
            --input-bg: rgba(30, 30, 30, 0.6);
            --input-border: rgba(255, 255, 255, 0.1);
            --accent-color: #0078f2;
            --error-bg: rgba(255, 75, 75, 0.15);
            --error-text: #ff4b4b;
        }

        body {
            background: #121212;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-color);
            padding: 20px;
            box-sizing: border-box;
        }

        .login-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            width: 100%;
            max-width: 450px;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        .login-card .logo {
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 2rem;
        }

        .login-card .logo i {
            color: var(--accent-color);
            margin-left: 10px;
        }

        .login-card h2 {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .login-input-group {
            margin-bottom: 1.5rem;
            text-align: right;
        }

        .login-input-group label {
            display: block;
            font-size: 0.85rem;
            color: var(--text-color);
            opacity: 0.8;
            margin-bottom: 0.6rem;
            font-weight: 600;
            margin-right: 5px;
        }

        .login-input-group input {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--input-border);
            padding: 1.1rem;
            border-radius: 12px;
            color: var(--text-color);
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .login-input-group input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(0,120,242,0.1);
        }

        .btn-login {
            width: 100%;
            padding: 1.2rem;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,120,242,0.3);
        }

        .login-footer {
            margin-top: 2rem;
            font-size: 0.95rem;
            opacity: 0.8;
        }

        .login-footer a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
        }

        #authError {
            color: var(--error-text);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            display: none;
            padding: 1rem;
            background: var(--error-bg);
            border-radius: 10px;
            border: 1px solid rgba(255, 75, 75, 0.1);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="logo"><i class="fas fa-globe-americas"></i>TRAVEL</div>
    
    <div id="authError"></div>

    <h2>تسجيل حساب جديد</h2>
    <form id="registerForm">
        <div class="login-input-group">
            <label>الاسم بالكامل</label>
            <input type="text" name="full_name" placeholder="الاسم بالكامل" required>
        </div>
        <div class="login-input-group">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        </div>
        <div class="login-input-group">
            <label>رقم الهاتف</label>
            <input type="tel" name="phone" placeholder="رقم الهاتف" required>
        </div>
        <div class="login-input-group">
            <label>كلمة المرور</label>
            <input type="password" name="password" placeholder="كلمة المرور" required>
        </div>
        <div class="login-input-group">
            <label>تأكيد كلمة المرور</label>
            <input type="password" name="confirm_password" placeholder="تأكيد كلمة المرور" required>
        </div>
        <button type="submit" class="btn-login" id="registerSubmitBtn">إنشاء حساب</button>
    </form>
    <div class="login-footer">
        لديك حساب بالفعل؟ <a href="login_ar.php">سجل الدخول هنا</a>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        const btn = $('#registerSubmitBtn');
        const originalText = btn.text();
        btn.html('<i class="fas fa-spinner fa-spin"></i>').prop('disabled', true);
        
        $.ajax({
            type: 'POST',
            url: '../../register_action.php', // Assuming this handles the unified registration fields
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = 'home arabic.php';
                } else {
                    $('#authError').text(response.message).slideDown();
                    btn.html(originalText).prop('disabled', false);
                }
            },
            error: function() {
                $('#authError').text('حدث خطأ في الاتصال بالخدمة.').slideDown();
                btn.html(originalText).prop('disabled', false);
            }
        });
    });
});
</script>

</body>
</html>

