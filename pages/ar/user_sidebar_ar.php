<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$is_logged_in = isset($_SESSION['user_id']);
$user_data = null;

if ($is_logged_in) {
    if (!isset($connection)) {
        include __DIR__ . '/../../config.php';
    }

    $user_id = $_SESSION['user_id'];
    $q = "SELECT Full_name, email, Profile_image FROM users WHERE id = '$user_id'";
    $res = mysqli_query($connection, $q);
    if ($res && mysqli_num_rows($res) > 0) {
        $user_data = mysqli_fetch_assoc($res);
    }
}

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/Travel-Agency";
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
/* Deep Dark Theme for Sidebar */
#user-sidebar.user-sidebar {
    background-color: rgba(18, 18, 18, 0.95); /* Deep Black / Dark Gray semi-transparent */
    color: #ffffff !important;
    border-right: 1px solid #333333 !important;
    display: flex;
    flex-direction: column;
}
#user-sidebar * {
    color: #ffffff;
}
#user-sidebar h3 {
    color: #ffffff !important;
}
#user-sidebar p, #user-sidebar .fas {
    color: #e0e0e0 !important;
}
#user-sidebar .logout-btn, #user-sidebar .logout-btn * {
    color: #ffffff !important;
}
#user-sidebar .nav-link {
    transition: background-color 0.3s, color 0.3s;
    border-radius: 8px; /* Rounded corners for links */
}
#user-sidebar .nav-link:hover {
    background-color: #333333 !important;
    color: #ffffff !important;
}
#user-sidebar .nav-link.active {
    background-color: #007bff !important; /* Bright Blue */
    color: #ffffff !important;
}
</style>

<!-- User Sidebar Profile Arabic -->
<div class="user-sidebar" id="user-sidebar" dir="rtl" style="text-align: right;">
    <div id="sidebar-close" class="fas fa-times" style="font-size: 2.5rem; cursor: pointer; position: absolute; top: 20px; left: 20px;"></div>
    
    <?php if ($is_logged_in && $user_data): ?>
    <div class="profile-header" style="text-align: center; margin-top: 40px; margin-bottom: 30px;">
        <div class="profile-img-container" style="width: 100px; height: 100px; margin: 0 auto 15px; border-radius: 50%; border: 3px solid #eeeeee; overflow: hidden;">
            <?php
    // Use base URL for profile image to safely support all include levels
    $profile_img = !empty($user_data['Profile_image']) ? $base_url . '/' . $user_data['Profile_image'] : $base_url . '/images/pic-1.png';
?>
            <img src="<?php echo htmlspecialchars($profile_img); ?>" alt="صورة الملف الشخصي" id="sidebar-profile-img" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <h3 id="sidebar-user-name" style="font-size: 1.8rem; margin-bottom: 5px; font-weight: bold;"><?php echo htmlspecialchars($user_data['Full_name']); ?></h3>
        <p id="sidebar-user-email" style="font-size: 1.3rem; color: #555555;"><?php echo htmlspecialchars($user_data['email']); ?></p>
    </div>

    <div class="sidebar-nav" style="display: flex; flex-direction: column; gap: 10px; flex: 1; margin-bottom: 20px;">
        <a href="settings_ar.php" class="nav-link <?php echo($current_page == 'settings_ar.php') ? 'active' : ''; ?>" style="padding: 15px 20px; text-decoration: none; font-size: 1.5rem; display: flex; align-items: center; gap: 15px; border-radius: 8px;">
            <i class="fas fa-cog" style="font-size: 1.8rem; width: 25px; text-align: center;"></i> اعدادات الحساب
        </a>
        <a href="bookings_ar.php" class="nav-link <?php echo($current_page == 'bookings_ar.php') ? 'active' : ''; ?>" style="padding: 15px 20px; text-decoration: none; font-size: 1.5rem; display: flex; align-items: center; gap: 15px; border-radius: 8px; font-weight: bold;">
            <i class="fas fa-book" style="font-size: 1.8rem; width: 25px; text-align: center;"></i> حجوزاتي
        </a>
        <a href="https://wa.me/+201014130237" class="nav-link" style="padding: 15px 20px; text-decoration: none; font-size: 1.5rem; display: flex; align-items: center; gap: 15px; border-radius: 8px;">
            <i class="fas fa-headset" style="font-size: 1.8rem; width: 25px; text-align: center;"></i> الدعم
        </a>
    </div>
    
    <div class="profile-footer" style="padding-top: 20px; border-top: 1px solid #333333; margin-top: auto; position: static; background: transparent;">
        <a href="../../logout.php" class="btn logout-btn" style="display: block; width: 100%; padding: 15px; background-color: #e11d48 !important; text-align: center; text-decoration: none; font-size: 1.5rem; font-weight: bold; border-radius: 8px; border: none; transition: filter 0.3s;" onmouseover="this.style.filter='brightness(1.1)'" onmouseout="this.style.filter='none'">
            <i class="fas fa-sign-out-alt" style="margin-left: 8px;"></i> تسجيل خروج
        </a>
    </div>
    
    <?php
else: ?>
        <div class="profile-header" style="text-align: center; margin-top: 60px;">
            <h3 style="font-size: 1.8rem; margin-bottom: 10px;">غير مسجل دخول</h3>
            <p style="font-size: 1.3rem; color: #555555;">يرجى تسجيل الدخول اولا.</p>
        </div>
    <?php
endif; ?>
</div>
