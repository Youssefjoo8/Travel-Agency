<?php
include '../../config.php';
session_start();
$page = basename($_SERVER['PHP_SELF']);

if (!isset($_GET['booking_id'])) {
   header('location:book.php');
   exit();
}

$booking_id = $_GET['booking_id'];

if (isset($_POST['pay'])) {
   // Mock success - update status to 'Paid'
   $update_status = "UPDATE `book_form` SET status = 'Paid' WHERE id = '$booking_id'";
   mysqli_query($connection, $update_status);

   $_SESSION['success_message'] = "Payment successful! Your booking is confirmed.";
   header('location:book.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Secure Payment - Travel Agency</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <style>
      :root {
         --bg-color: #121212;
         --card-bg: #1e1e1e;
         --accent: #0078f2; /* Epic Games Blue */
         --text-primary: #ffffff;
         --text-secondary: #b5b5b5;
      }

      body {
         background-color: var(--bg-color);
         color: var(--text-primary);
         font-family: 'Inter', 'Segoe UI', sans-serif;
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         margin: 0;
      }

      .payment-card {
         background: var(--card-bg);
         width: 100%;
         max-width: 450px;
         padding: 2.5rem;
         border-radius: 4px;
         box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      }

      .logo {
         text-align: center;
         margin-bottom: 2rem;
         font-size: 1.5rem;
         font-weight: bold;
         letter-spacing: 1px;
      }

      h2 {
         font-size: 1.2rem;
         margin-bottom: 1.5rem;
         text-transform: uppercase;
         letter-spacing: 1px;
         text-align: center;
      }

      .input-group {
         margin-bottom: 1.2rem;
      }

      .input-group label {
         display: block;
         font-size: 0.8rem;
         color: var(--text-secondary);
         margin-bottom: 0.5rem;
         text-transform: uppercase;
      }

      .input-group input {
         width: 100%;
         background: #2a2a2a;
         border: 1px solid #333;
         padding: 0.8rem;
         color: #fff;
         border-radius: 4px;
         box-sizing: border-box;
         font-size: 1rem;
         transition: border-color 0.3s;
      }

      .input-group input:focus {
         outline: none;
         border-color: var(--accent);
      }

      .flex-row {
         display: flex;
         gap: 1rem;
      }

      .btn-pay {
         width: 100%;
         background: var(--accent);
         color: #fff;
         border: none;
         padding: 1rem;
         font-size: 1rem;
         font-weight: bold;
         text-transform: uppercase;
         margin-top: 1.5rem;
         cursor: pointer;
         border-radius: 4px;
         transition: filter 0.3s;
      }

      .btn-pay:hover {
         filter: brightness(1.1);
      }

      .footer-note {
         margin-top: 1.5rem;
         text-align: center;
         font-size: 0.8rem;
         color: var(--text-secondary);
      }
      
      .secure-icon {
          color: #2ecc71;
          margin-right: 5px;
      }
   </style>
</head>
<body>
<!-- header section starts  -->
<section class="header">
   <a href="home.php" class="logo"> <i class="fas fa-globe-americas"></i> TRAVEL AGENCY </a>
   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <a href="book.php" class="active">book</a>
      <a href="gallery.php">gallery</a>
   </nav>
   <div class="icons">
      <?php
      $pg = basename($_SERVER["PHP_SELF"]);
      $map = [
          "home.php" => "home arabic.php",
          "about.php" => "about arabic.php",
          "package.php" => "package arabic.php",
          "book.php" => "book arabic.php",
          "gallery.php" => "gallery arabic.php",
          "my_bookings.php" => "bookings_ar.php",
          "settings.php" => "settings_ar.php",
          "profile.php" => "profile_ar.php"
      ];
      $ar_dest = isset($map[$pg]) ? $map[$pg] : "home arabic.php";
      ?>
      <?php
      $pg = basename($_SERVER["PHP_SELF"]);
      $map = [
          "home.php" => "home arabic.php",
          "about.php" => "about arabic.php",
          "package.php" => "package arabic.php",
          "book.php" => "book arabic.php",
          "gallery.php" => "gallery arabic.php",
          "my_bookings.php" => "bookings_ar.php",
          "settings.php" => "settings_ar.php",
          "profile.php" => "profile_ar.php"
      ];
      $ar_dest = isset($map[$pg]) ? $map[$pg] : "home arabic.php";
      ?>
      <a href="../ar/<?php echo $ar_dest; ?>" class="fas fa-globe"></a>
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
<?php include '../../user_sidebar.php'; ?>
   <div class="payment-card">
      <div class="logo">TRAVEL AGENCY</div>
      <h2>Secure Checkout</h2>
      
      <form action="" method="post">
         <div class="input-group">
            <label>Cardholder Name</label>
            <input type="text" placeholder="Your Name" required>
         </div>
         
         <div class="input-group">
            <label>Card Number</label>
            <input type="text" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" required>
         </div>
         
         <div class="flex-row">
            <div class="input-group" style="flex: 2;">
               <label>Expiration Date</label>
               <input type="text" placeholder="MM/YY" maxlength="5" required>
            </div>
            <div class="input-group" style="flex: 1;">
               <label>CVV</label>
               <input type="password" placeholder="***" maxlength="3" required>
            </div>
         </div>
         
         <button type="submit" name="pay" class="btn-pay">Pay & Confirm Booking</button>
      </form>
      
      <div class="footer-note">
         <i class="fas fa-lock secure-icon"></i> SSL Secure Payment
      </div>
   </div>
</body>
</html>
