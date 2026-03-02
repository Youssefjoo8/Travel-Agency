<?php
// login_modal.php upgraded with Adaptive Glassmorphism UI
?>
<style>
:root {
    --glass-bg: rgba(255, 255, 255, 0.4);
    --glass-border: rgba(255, 255, 255, 0.2);
    --text-color: #121212;
    --input-bg: rgba(255, 255, 255, 0.5);
    --input-border: rgba(0, 0, 0, 0.1);
    --accent-color: #0078f2;
    --error-bg: rgba(255, 75, 75, 0.1);
    --error-text: #d32f2f;
}

@media (prefers-color-scheme: dark) {
    :root {
        --glass-bg: rgba(18, 18, 18, 0.6);
        --glass-border: rgba(255, 255, 255, 0.1);
        --text-color: #e0e0e0;
        --input-bg: rgba(30, 30, 30, 0.6);
        --input-border: rgba(255, 255, 255, 0.1);
        --error-bg: rgba(255, 75, 75, 0.15);
        --error-text: #ff4b4b;
    }
}

/* Glassmorphism Styles */
.login-modal {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(15px);
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.login-modal.active {
    display: flex;
}

.login-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    width: 100%;
    max-width: 420px;
    padding: 3rem;
    border-radius: 20px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    color: var(--text-color);
    position: relative;
    text-align: center;
    transition: transform 0.3s ease;
}

.login-card .logo {
    font-size: 2.2rem;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 2rem;
}

.login-card .logo i {
    color: var(--accent-color);
    margin-right: 10px;
}

.login-card h2 {
    font-size: 1.5rem;
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.login-input-group {
    margin-bottom: 1.5rem;
    text-align: left;
}

.login-input-group label {
    display: block;
    font-size: 12px;
    color: var(--text-color);
    opacity: 0.8;
    margin-bottom: 0.6rem;  
    text-transform: uppercase;
    font-weight: 600;
}

.login-input-group input {
    width: 100%;
    background: var(--input-bg);
    border: 1px solid var(--input-border);
    padding: 1.1rem;
    color: var(--text-color);
    border-radius: 12px;
    box-sizing: border-box;
    font-size: 15px;
    transition: all 0.3s ease;
}

.login-input-group input:focus {
    outline: none;
    border-color: var(--accent-color);
    box-shadow: 0 0 0 4px rgba(0, 120, 242, 0.1);
}

.btn-login {
    width: 100%;
    background: var(--accent-color);
    color: #fff;
    border: none;
    padding: 1.2rem;
    font-size: 1.1rem;
    font-weight: 700;
    text-transform: uppercase;
    margin-top: 1rem;
    cursor: pointer;
    border-radius: 12px;
    transition: all 0.3s;
    letter-spacing: 1px;
}

.btn-login:hover {
    filter: brightness(1.1);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 120, 242, 0.3);
}

.close-login {
    position: absolute;
    top: 20px;
    right: 25px;
    font-size: 2.2rem;
    color: var(--text-color);
    opacity: 0.5;
    cursor: pointer;
    transition: opacity 0.3s;
}

.close-login:hover {
    opacity: 1;
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

.form-toggle {
    cursor: pointer;
}
</style>

<div class="login-modal" id="loginModal">
    <div class="login-card">
        <span class="close-login" id="closeLogin">&times;</span>
        <div class="logo"><i class="fas fa-globe-americas"></i>TRAVEL</div>
        
        <div id="authError"></div>

        <!-- Login Form -->
        <div id="loginFormSection">
            <h2>Sign In</h2>
            <form id="loginForm">
                <div class="login-input-group">
                    <label>Email or Phone Number</label>
                    <input type="text" name="login_id" id="loginId" placeholder="Email or Phone Number" required>
                </div>
                <div class="login-input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn-login" id="loginSubmitBtn">Login</button>
            </form>
            <div class="login-footer">
                Don't have an account? <a href="#" class="form-toggle" data-target="register">Register here</a>
            </div>
        </div>

        <!-- Register Form -->
        <div id="registerFormSection" style="display: none;">
            <h2>Create Account</h2>
            <form id="registerForm">
                <div class="login-input-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" id="regName" placeholder="Enter your full name" required>
                </div>
                <div class="login-input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" id="regEmail" placeholder="Create your email" required>
                </div>
                <div class="login-input-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone_number" id="regPhone" class="numeric-auth-input" placeholder="Enter your phone number" required>
                </div>
                <div class="login-input-group">
                    <label>Password</label>
                    <input type="password" name="password" id="regPassword" placeholder="Choose a password" required>
                </div>
                <div class="login-input-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" id="regConfirmPassword" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn-login" id="registerSubmitBtn">Register</button>
            </form>
            <div class="login-footer">
                Already have an account? <a href="#" class="form-toggle" data-target="login">Sign in here</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    const loginModal = $('#loginModal');
    const authError = $('#authError');

     const isUserLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

    // Auto-open if URL has login_required
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('login_required') === 'true') {
        loginModal.addClass('active');
        let toastMsg = window.location.pathname.includes('arabic') ? "يرجى تسجيل الدخول لحجز رحلتك." : "Please log in to your account to complete your booking.";
        let toast = $('<div class="login-toast">' + toastMsg + '</div>');
        $('body').append(toast);
        setTimeout(() => { toast.fadeOut(300, function(){ $(this).remove(); }); }, 4000);
        
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    // Intercept book.php clicks
    $('a[href*="book.php"], a[href*="book%20arabic.php"], a[href*="book arabic.php"]').on('click', function(e) {
        if (!isUserLoggedIn) {
            e.preventDefault();
            const redirectUrl = $(this).attr('href');
            sessionStorage.setItem('intended_booking_url', redirectUrl);
            
            loginModal.addClass('active');
            let toastMsg = window.location.pathname.includes('arabic') ? "يرجى تسجيل الدخول لحجز رحلتك." : "Please log in to your account to complete your booking.";
            let toast = $('<div class="login-toast">' + toastMsg + '</div>');
            $('body').append(toast);
            setTimeout(() => { toast.fadeOut(300, function(){ $(this).remove(); }); }, 4000);
        }
    });

    // Open login modal
    $(document).on('click', '#login-btn', function(e) {
        e.preventDefault();
        loginModal.addClass('active');
    });

    // Close login modal
    $('#closeLogin').click(function() {
        loginModal.removeClass('active');
        authError.hide();
        $('#loginForm')[0].reset();
        $('#registerForm')[0].reset();
    });

    // Toggle between Login and Register
    $('.form-toggle').click(function(e) {
        e.preventDefault();
        const target = $(this).data('target');
        authError.hide();
        
        if (target === 'register') {
            $('#loginFormSection').fadeOut(300, function() {
                $('#registerFormSection').fadeIn(300);
            });
        } else {
            $('#registerFormSection').fadeOut(300, function() {
                $('#loginFormSection').fadeIn(300);
            });
        }
    });

    // Unified AJAX function
    function handleAuth(formId, url, btnId, originalText) {
        $(`#${formId}`).on('submit', function(e) {
            e.preventDefault();

            // Password confirmation check for registration
            if (formId === 'registerForm') {
                const pass = $('#regPassword').val();
                const confirm = $('#regConfirmPassword').val();
                if (pass !== confirm) {
                    authError.text('Passwords do not match!').fadeIn();
                    return;
                }
            }

            const submitBtn = $(`#${btnId}`);
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
            authError.hide();

            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const intendedUrl = sessionStorage.getItem('intended_booking_url');
                        if (intendedUrl) {
                            sessionStorage.removeItem('intended_booking_url');
                            window.location.href = intendedUrl;
                        } else {
                            window.location.href = '../../' + response.redirect;
                        }
                    } else {
                        authError.text(response.message).fadeIn();
                        submitBtn.prop('disabled', false).text(originalText);
                    }
                },
                error: function() {
                    authError.text('Connection error. Please try again.').fadeIn();
                    submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });
    }

    handleAuth('loginForm', '../../login_process.php', 'loginSubmitBtn', 'Login');
    handleAuth('registerForm', '../../register_action.php', 'registerSubmitBtn', 'Register');

    // Numeric Validation Interceptor for auth forms
    $('.numeric-auth-input').on('keydown', function(e) {
        // Allow: backspace, delete, tab, escape, enter
        if ($.inArray(e.keyCode, [8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A / Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return; // let it happen
        }
        // Disallow if not a number
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $('.numeric-auth-input').on('paste', function(e) {
        let paste = (e.originalEvent.clipboardData || window.clipboardData).getData('text');
        if (/[^0-9]/.test(paste)) {
            e.preventDefault();
            let stripped = paste.replace(/[^0-9]/g, '');
            document.execCommand('insertText', false, stripped);
        }
    });

    // Close on outside click
    $(window).click(function(e) {
        if ($(e.target).is(loginModal)) {
            $('#closeLogin').click();
        }
    });
});
</script>
