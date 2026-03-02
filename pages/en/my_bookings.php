<?php
session_start();

// If the user ID is not set in the session, they are not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php?login_required=true");
    exit();
}

include '../../config.php';
$user_id = $_SESSION['user_id'];
$q = "SELECT Full_name, email, Profile_image FROM users WHERE id = '$user_id'";
$res = mysqli_query($connection, $q);
$user_data = mysqli_fetch_assoc($res);

$user_email = $user_data['email'];
$page = basename($_SERVER['PHP_SELF']);

// Fetch user bookings based on email
$bookings_query = "SELECT * FROM book_form WHERE email = '$user_email' ORDER BY id DESC";
$bookings_res = mysqli_query($connection, $bookings_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Bookings :: Travel Agency</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   <style>
      /* Clean White / Booking UI Style */
      :root {
          --bookings-bg: #ffffff;
          --bookings-card-bg: #ffffff;
          --bookings-text: #333333;
          --bookings-text-muted: #666666;
          --bookings-border: #dddddd;
      }

      body {
          background-color: var(--bookings-bg);
          color: var(--bookings-text);
      }

      .bookings-container {
          min-height: 80vh;
          max-width: 1400px;
          margin: 0 auto;
          margin-top: 120px; /* offset for fixed header */
          padding: 2rem;
          margin-bottom: 50px;
      }

      .page-title {
          font-size: 3rem;
          color: var(--bookings-text);
          margin-bottom: 3rem;
          font-weight: 800;
          text-transform: uppercase;
          letter-spacing: 1px;
          border-bottom: 1px solid var(--bookings-border);
          padding-bottom: 1rem;
      }

      .booking-grid {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
          gap: 2.5rem;
      }

      .booking-card {
          background: var(--bookings-card-bg);
          border: 1px solid var(--bookings-border);
          border-radius: 12px;
          overflow: hidden;
          display: flex;
          flex-direction: column;
          transition: transform 0.3s, box-shadow 0.3s;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); /* subtle shadow */
      }

      .booking-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }

      .booking-thumbnail {
          width: 100%;
          height: 200px;
          object-fit: cover;
          border-bottom: 1px solid var(--bookings-border);
      }

      .booking-content {
          padding: 2rem;
          flex: 1;
          display: flex;
          flex-direction: column;
      }

      .booking-title {
          font-size: 2rem;
          font-weight: 700;
          margin-bottom: 1rem;
          color: var(--bookings-text);
      }

      .booking-detail {
          font-size: 1.4rem;
          color: var(--bookings-text-muted);
          margin-bottom: 0.8rem;
          display: flex;
          align-items: center;
          gap: 10px;
      }

      .badge {
          display: inline-block;
          padding: 0.5rem 1.2rem;
          font-size: 1.2rem;
          font-weight: 700;
          text-transform: uppercase;
          border-radius: 20px;
          margin-bottom: 1.5rem;
          align-self: flex-start;
          border: 1px solid transparent;
      }

      .badge-paid {
          background-color: rgba(46, 204, 113, 0.1);
          color: #2ecc71;
          border-color: #2ecc71;
      }

      .badge-unpaid {
          background-color: rgba(245, 158, 11, 0.1);
          color: #F59E0B; /* Orange/Yellow */
          border-color: #F59E0B;
      }

      .badge-cancelled {
          background-color: rgba(225, 29, 72, 0.1);
          color: #e11d48; /* Red */
          border-color: #e11d48;
      }

      .badge-expired {
          background-color: rgba(153, 153, 153, 0.1);
          color: #999999; /* Gray */
          border-color: #999999;
      }

      .badge-completed {
          background-color: rgba(102, 51, 153, 0.1);
          color: #8b5cf6; /* Vibrant Purple */
          border-color: #8b5cf6;
      }

      .booking-price {
          font-size: 2.2rem;
          font-weight: 800;
          color: #007bff; /* Bright Blue */
          margin-top: 1.5rem;
          margin-bottom: 1.5rem;
      }

      .btn-action {
          width: 100%;
          padding: 1.2rem;
          font-size: 1.5rem;
          font-weight: bold;
          text-align: center;
          border-radius: 8px;
          cursor: pointer;
          transition: filter 0.3s;
          border: none;
          text-decoration: none;
          display: inline-block;
      }
      
      .btn-primary-action {
          background-color: #007bff;
          color: #ffffff;
      }

      .btn-primary-action:hover {
          filter: brightness(1.1);
          color: #ffffff;
      }

      .no-bookings {
          font-size: 2rem;
          color: var(--bookings-text-muted);
          text-align: center;
          padding: 5rem 0;
          grid-column: 1 / -1;
      }
      
      .no-bookings i {
          font-size: 5rem;
          margin-bottom: 2rem;
          display: block;
      }

      /* Review Display block */
      .review-display {
          margin-top: 1.5rem;
          padding: 1rem;
          background: #f8fafc;
          border-radius: 8px;
          border: 1px solid var(--bookings-border);
      }
      .review-stars {
          color: #F59E0B;
          font-size: 1.2rem;
          margin-bottom: 0.5rem;
      }
      .review-text {
          font-size: 1.3rem;
          color: var(--bookings-text-muted);
          font-style: italic;
      }

      /* Payment Modal Styles */
      .modal-overlay {
          position: fixed;
          top: 0; left: 0;
          width: 100%; height: 100%;
          background: rgba(0,0,0,0.7);
          z-index: 10000;
          display: none;
          justify-content: center;
          align-items: center;
          backdrop-filter: blur(5px);
      }
      .modal-overlay.active { display: flex; }
      
      .payment-card {
          background: #1e1e1e;
          width: 90%;
          max-width: 450px;
          padding: 3rem;
          border-radius: 12px;
          position: relative;
          color: white;
          box-shadow: 0 20px 40px rgba(0,0,0,0.4);
      }
      .payment-card .close-btn {
          position: absolute;
          top: 20px; right: 20px;
          font-size: 2rem;
          cursor: pointer;
          color: #888;
      }
      .payment-card h2 { font-size: 1.8rem; margin-bottom: 2rem; text-align: center; color: white; }
      .payment-card .input-group { margin-bottom: 1.5rem; }
      .payment-card label { display: block; font-size: 1.1rem; color: #aaa; margin-bottom: 0.5rem; }
      .payment-card input {
          width: 100%;
          background: #2a2a2a;
          border: 1px solid #444;
          padding: 1rem;
          color: white;
          border-radius: 6px;
          font-size: 1.4rem;
      }
      .payment-card input:focus { border-color: #007bff; outline: none; }
      .payment-card .flex-row { display: flex; gap: 1.5rem; }
      
      .btn-pay-now {
          width: 100%;
          background: #007bff;
          color: white;
          padding: 1.2rem;
          font-size: 1.6rem;
          font-weight: bold;
          border: none;
          border-radius: 6px;
          cursor: pointer;
          margin-top: 1rem;
      }
      .btn-pay-now:hover { background: #0056b3; }

      /* Success Modal Styling from book.php */
      .checkmark-wrapper { text-align: center; margin-bottom: 2rem; }
      .checkmark { width: 80px; height: 80px; border-radius: 50%; display: block; stroke-width: 2; stroke: #2ecc71; stroke-miterlimit: 10; margin: 10% auto; box-shadow: inset 0px 0px 0px #2ecc71; animation: fill-green .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both; }
      .checkmark__circle { stroke-dasharray: 166; stroke-dashoffset: 166; stroke-width: 2; stroke-miterlimit: 10; stroke: #2ecc71; fill: none; animation: stroke-green 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards; }
      .checkmark__check { transform-origin: 50% 50%; stroke-dasharray: 48; stroke-dashoffset: 48; animation: stroke-green 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards; }
      @keyframes stroke-green { 100% { stroke-dashoffset: 0; } }
      @keyframes scale { 0%, 100% { transform: none; } 50% { transform: scale3d(1.1, 1.1, 1); } }
      @keyframes fill-green { 100% { box-shadow: inset 0px 0px 0px 40px #2ecc71; } }
      
      .btn-pdf { background: #2ecc71 !important; color: white !important; margin-bottom: 1rem; }
      .btn-home { background: #444 !important; color: white !important; }

      /* Dark Mode Feedback Modal */
      .feedback-modal-overlay {
          position: fixed;
          top: 0; left: 0; right: 0; bottom: 0;
          background: rgba(0, 0, 0, 0.8);
          display: none;
          justify-content: center;
          align-items: center;
          z-index: 10000;
      }
      .feedback-modal-overlay.active { display: flex; }

      .feedback-modal {
          background: #1A1A1A; /* Deep Black */
          color: #FFFFFF; /* Pure White */
          width: 90%;
          max-width: 500px;
          border-radius: 12px;
          padding: 3rem;
          position: relative;
          box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      }
      .feedback-modal h3 {
          font-size: 2.2rem;
          margin-bottom: 1rem;
          color: #FFFFFF;
      }
      .feedback-modal p {
          font-size: 1.4rem;
          color: #ccc;
          margin-bottom: 2.5rem;
      }
      .star-rating-input {
          display: flex;
          flex-direction: row-reverse;
          justify-content: flex-end;
          gap: 5px;
          margin-bottom: 2rem;
      }
      .star-rating-input input { display: none; }
      .star-rating-input label {
          font-size: 3rem;
          color: #444;
          cursor: pointer;
          transition: color 0.2s;
      }
      .star-rating-input input:checked ~ label,
      .star-rating-input label:hover,
      .star-rating-input label:hover ~ label {
          color: #f59e0b; /* Yellow/Orange */
      }
      .feedback-modal textarea {
          width: 100%;
          background: #333;
          border: 1px solid #444;
          color: #fff;
          padding: 1.5rem;
          font-size: 1.5rem;
          border-radius: 8px;
          margin-bottom: 2rem;
          min-height: 120px;
          resize: vertical;
          font-family: inherit;
      }
      .feedback-modal textarea:focus {
          outline: none;
          border-color: #0078f2;
      }
      .feedback-modal .close-btn {
          position: absolute;
          top: 2rem;
          right: 2rem;
          font-size: 2.5rem;
          color: #aaa;
          cursor: pointer;
      }
      .feedback-modal .close-btn:hover { color: #fff; }
   </style>
</head>
<body>
   
<!-- header section starts  -->
<section class="header">
   <a href="home.php" class="logo"> <i class="fas fa-globe-americas"></i> TRAVEL AGENCY </a>
   <nav class="navbar">
      <a href="home.php" class="<?php echo($page == 'home.php') ? 'active' : ''; ?>">home</a>
      <a href="about.php" class="<?php echo($page == 'about.php') ? 'active' : ''; ?>">about</a>
      <a href="package.php" class="<?php echo($page == 'package.php') ? 'active' : ''; ?>">package</a>
      <a href="book.php" class="<?php echo($page == 'book.php') ? 'active' : ''; ?>">book</a>
      <a href="gallery.php" class="<?php echo($page == 'gallery.php') ? 'active' : ''; ?>">gallery</a>
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
<!-- header section ends -->

<div class="bookings-container">
    <h2 class="page-title">My Bookings</h2>

    <div class="booking-grid">
        <?php
if (mysqli_num_rows($bookings_res) > 0) {
    while ($row = mysqli_fetch_assoc($bookings_res)) {
        $status = strtolower($row['status'] ?? 'pending');
        $badge_class = 'badge-unpaid';
        $badge_text = 'Pending';

        $current_date = date('Y-m-d');
        $is_completed = false;

        // Map the status to our badge logic
        if ($status == 'paid' || $status == 'confirmed' || $status == 'completed') {
            if ($status == 'completed' || (!empty($row['leaving']) && $current_date > $row['leaving'])) {
                $badge_class = 'badge-completed';
                $badge_text = 'Completed';
                $is_completed = true;
            }
            else {
                $badge_class = 'badge-paid';
                $badge_text = 'Paid';
            }
        }
        elseif ($status == 'cancelled') {
            $badge_class = 'badge-cancelled';
            $badge_text = 'Cancelled';
        }
        elseif ($status == 'expired') {
            $badge_class = 'badge-expired';
            $badge_text = 'Expired';
        }
        else {
            $badge_class = 'badge-unpaid';
            $badge_text = 'Pending (Unpaid)';
        }

        // Check if review exists for completed trips
        $has_review = false;
        $review_data = null;
        if ($is_completed) {
            $bk_id = $row['id'];
            $chk_rev = mysqli_query($connection, "SELECT rating, comment FROM reviews WHERE booking_id = '$bk_id' AND user_id = '$user_id'");
            if (mysqli_num_rows($chk_rev) > 0) {
                $has_review = true;
                $review_data = mysqli_fetch_assoc($chk_rev);
            }
        }

        // Determine image based on package. Fallback if package is empty (Custom request)
        $package_name = !empty($row['package']) ? $row['package'] : $row['location']; // Fallback to destination if no package

        // Simple logic to assign images based on package arabic.php mapping
        $image_path = '../../images/img-1.jpg'; // default (Dubai)
        if (strpos(strtolower($package_name), 'india') !== false || strpos(strtolower($package_name), 'الهند') !== false) {
            $image_path = '../../images/img-2.jpg';
        }
        elseif (strpos(strtolower($package_name), 'dubai') !== false || strpos(strtolower($package_name), 'دبي') !== false) {
            $image_path = '../../images/img-1.jpg';
        }
        elseif (strpos(strtolower($package_name), 'japan') !== false || strpos(strtolower($package_name), 'اليابان') !== false) {
            $image_path = '../../images/img-3.jpg';
        }
        elseif (empty($row['package'])) {
            $image_path = '../../images/img-1.jpg'; // Different default for custom manual bookings
        }

        $arrivals = $row['arrivals'];
        $leaving = $row['leaving'];

        // Robust Custom Request Detection
        $is_custom_package = (empty($row['package']) ||
            strtolower(trim($row['package'])) === 'custom request' ||
            trim($row['package']) === 'طلب مخصص');

        // Price Display Logic
        if ($is_custom_package) {
            $total_price = (!empty($row['total_price']) && $row['total_price'] > 0) ? '$' . number_format($row['total_price'], 2) : 'Awaiting Quote';
        }
        else {
            $total_price = (!empty($row['total_price']) && $row['total_price'] > 0) ? '$' . number_format($row['total_price'], 2) : '';
        }

?>
                <div class="booking-card">
                    <img src="<?php echo $image_path; ?>" alt="Destination" class="booking-thumbnail">
                    <div class="booking-content">
                        <span class="badge <?php echo $badge_class; ?>"><?php echo $badge_text; ?></span>
                        <h3 class="booking-title"><?php echo htmlspecialchars($package_name); ?></h3>
                        
                        <div class="booking-detail">
                            <i class="fas fa-calendar-alt"></i>
                            <span><?php echo $arrivals; ?> to <?php echo $leaving; ?></span>
                        </div>
                        <div class="booking-detail">
                            <i class="fas fa-users"></i>
                            <span><?php echo htmlspecialchars($row['guests']); ?> Guest(s)</span>
                        </div>
                        <?php if ($badge_text != 'Cancelled') { ?>
                            <div class="booking-price"><?php echo $total_price; ?></div>
                        <?php
        }
        else { ?>
                            <div style="height: 1.5rem; margin-top: 1.5rem; margin-bottom: 1.5rem;"></div> <!-- Spacing placeholder -->
                        <?php
        }?>
                        <div style="margin-top: auto;">
                            <?php
        if ($is_custom_package) {
?>
                                <p style="font-size: 1.3rem; color: var(--bookings-text-muted); margin-bottom: 1rem; line-height: 1.5;">Your request has been received. Our team will contact you shortly.</p>
                                <a href="https://wa.me/+201014130237?text=Hello, I am inquiring about my Custom Booking (ID: <?php echo $row['id']; ?>)." target="_blank" class="btn-action btn-primary-action">Contact Support</a>
                            <?php
        }
        else {
            // It's a Standard Package, so we determine buttons based on Status

            if ($badge_text == 'Cancelled') { ?>
                                <span class="btn-action" style="background-color: #f3f4f6; color: #9ca3af; cursor: not-allowed; border: 1px solid #d1d5db; margin-bottom: 1rem;">Non-Refundable</span>
            <?php
            }
            elseif ($is_completed) {
                // Standard Packages: Show PDF Receipt even if completed
                echo '<a href="../../generate_receipt.php?id=' . $row['id'] . '" class="btn-action" style="background-color: #10B981; color: white; display: block; margin-bottom: 1rem;"><i class="fas fa-file-pdf"></i> Download PDF Receipt</a>';

                // COMPLETED Packages: Show Feedback / Ratings Only
                if ($has_review) { ?>
                                <div class="review-display">
                                    <div class="review-stars">
                                        <?php for ($i = 1; $i <= 5; $i++) {
                        echo($i <= $review_data['rating']) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                    }?>
                                    </div>
                                    <div class="review-text">"<?php echo htmlspecialchars($review_data['comment']); ?>"</div>
                                </div>
                <?php
                }
                else { ?>
                                <button type="button" class="btn-action" style="background-color: #3b82f6; color: white; display: block;" data-id="<?php echo $row['id']; ?>" data-title="<?php echo htmlspecialchars($package_name); ?>" onclick="openFeedbackModal(this)">Give Rating</button>
                                
                                <script>
                                    // Make sure modal attaches correctly if script logic is missing
                                    function openFeedbackModal(el) {
                                        document.getElementById('feedbackBookingId').value = el.getAttribute('data-id');
                                        document.getElementById('feedbackTripName').innerText = el.getAttribute('data-title');
                                        document.getElementById('feedbackModal').classList.add('active');
                                    }
                                </script>
                <?php
                }
            }
            else {
                // PENDING / PAID Packages: Show PDF & Support Buttons
                echo '<a href="../../generate_receipt.php?id=' . $row['id'] . '" class="btn-action" style="background-color: #10B981; color: white; display: block; margin-bottom: 1rem;"><i class="fas fa-file-pdf"></i> Download PDF Receipt</a>';

                if ($badge_text == 'Pending (Unpaid)') { ?>
                                <button type="button" class="btn-action btn-primary-action btn-pay-trigger" style="margin-bottom: 1rem;" data-id="<?php echo $row['id']; ?>" data-title="<?php echo htmlspecialchars($package_name); ?>">Pay Now</button>
                <?php
                }?>
                
                                <a href="https://wa.me/+201014130237?text=Hello, I am inquiring about my Site Package (ID: <?php echo $row['id']; ?>)." target="_blank" class="btn-action btn-primary-action" style="background-color: #007bff;">Contact Support</a>
            <?php
            }
        }?>
                        </div>
                    </div>
                </div>
                <?php
    }
}
else {
?>
            <div class="no-bookings">
                <i class="fas fa-suitcase-rolling"></i>
                <p>You haven't made any bookings yet!</p>
                <a href="package.php" class="btn" style="background: #007bff; color: #fff; margin-top: 2rem;">Explore Packages</a>
            </div>
            <?php
}
?>
    </div>
</div>

<!-- Feedback Modal -->
<div class="feedback-modal-overlay" id="feedbackModal">
    <div class="feedback-modal">
        <i class="fas fa-times close-btn" id="closeFeedback"></i>
        <h3>Rate Your Trip</h3>
        <p id="feedbackTripName">Destination</p>
        
        <form id="feedbackForm">
            <input type="hidden" name="booking_id" id="feedbackBookingId">
            <div class="star-rating-input">
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"><i class="fas fa-star"></i></label>
            </div>
            <textarea name="comment" placeholder="Tell us about your experience! (Optional)"></textarea>
            
            <button type="submit" class="btn-action btn-primary-action" id="submitFeedbackBtn">Submit Review</button>
            <div id="feedbackResponse" style="margin-top: 15px; font-size: 1.3rem; text-align: center; display: none;"></div>
        </form>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal-overlay" id="paymentModal">
    <div class="payment-card">
        <i class="fas fa-times close-btn" id="closePayment"></i>
        <h2>Secure Checkout</h2>
        <p style="text-align: center; margin-top: -10px; margin-bottom: 20px; font-size: 1.3rem; color: #007bff;" id="paymentTripName"></p>
        
        <form id="paymentForm">
            <input type="hidden" name="booking_id" id="paymentBookingId">
            <input type="hidden" name="status" value="Paid">
            
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
            
            <button type="submit" class="btn-pay-now" id="confirmPayBtn">Confirm & Pay</button>
            <div id="paymentResponse" style="margin-top: 15px; font-size: 1.3rem; text-align: center; display: none;"></div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="modal-overlay" id="successModal">
    <div class="payment-card" style="text-align: center;">
        <i class="fas fa-times close-btn" id="closeSuccess"></i>
        <div class="checkmark-wrapper">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
        </div>
        <h2 style="color: #2ecc71; margin-bottom: 1rem;">Payment Successful!</h2>
        <p style="font-size: 1.4rem; color: #aaa; margin-bottom: 2rem;">Your booking has been confirmed successfully. Click below to download your receipt and return home.</p>
        
        <a href="#" id="successDownloadPdf" class="btn-action btn-pdf" style="display: block; text-decoration: none;">
            <i class="fas fa-file-pdf"></i> Download PDF & Go Home
        </a>
        
        <button type="button" class="btn-action btn-home" onclick="window.location.href='home.php'">
            Return Home Now
        </button>
    </div>
</div>
<iframe id="downloadHub" style="display:none;"></iframe>
<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

<section class="footer">
   <div class="box-container">
      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>
      <div class="box">
         <h3>extra links</h3>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="faq.php"> <i class="fas fa-angle-right"></i> FAQ </a>
         <a href="terms.php"> <i class="fas fa-angle-right"></i> terms of use</a>
         <a href="privacy.php"> <i class="fas fa-angle-right"></i> privacy policy</a>
      </div>
      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +020-000-0000 </a>
         <a href="https://wa.me/+201014130237"> <i class="fab fa-whatsapp"></i> +201014130237 </a>
         <a href="https://mail.google.com"> <i class="fas fa-envelope"></i> example@email.com </a>
         <a href="https://maps.app.goo.gl/22352352352352352"> <i class="fas fa-map"></i> cairo, Egypt  </a>
      </div>
      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="https://www.X.com"> <i class="fab fa-twitter"></i> twitter/X </a>
         <a href="https://www.instagram.com"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://www.linkedin.com"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>
   </div>
   <div class="credit"> designed by <span>Team 21</span> | all rights reserved! </div>
</section>

<!-- footer section ends -->
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

<script>
$(document).ready(function() {
    // Open Feedback Modal
    $('.btn-give-feedback').on('click', function(e) {
        e.preventDefault();
        $('#feedbackBookingId').val($(this).data('id'));
        $('#feedbackTripName').text($(this).data('title'));
        $('#feedbackForm')[0].reset();
        $('#feedbackResponse').hide();
        $('#feedbackModal').addClass('active');
    });

    // Close Modal
    $('#closeFeedback, .feedback-modal-overlay').on('click', function(e) {
        if(e.target !== this) return; // prevent closing when clicking inside modal box
        $('#feedbackModal').removeClass('active');
    });

    // Submit Feedback API
    $('#feedbackForm').on('submit', function(e) {
        e.preventDefault();
        
        if (!$('input[name="rating"]:checked').val()) {
            $('#feedbackResponse').css('color', '#ff4d4d').text('Please select a star rating.').fadeIn();
            return;
        }

        const btn = $('#submitFeedbackBtn');
        const origText = btn.text();
        btn.prop('disabled', true).text('Submitting...');

        $.ajax({
            url: '../../submit_feedback.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if(resp.success) {
                    $('#feedbackResponse').css('color', '#2ecc71').text('Review submitted successfully! Refreshing...').fadeIn();
                    setTimeout(() => location.reload(), 1500);
                } else {
                    $('#feedbackResponse').css('color', '#ff4d4d').text(resp.message).fadeIn();
                    btn.prop('disabled', false).text(origText);
                }
            },
            error: function() {
                $('#feedbackResponse').css('color', '#ff4d4d').text('Network error.').fadeIn();
                btn.prop('disabled', false).text(origText);
            }
        });
    });

    // --- Payment Logic ---
    $('.btn-pay-trigger').on('click', function() {
        $('#paymentBookingId').val($(this).data('id'));
        $('#paymentTripName').text($(this).data('title'));
        $('#paymentForm')[0].reset();
        $('#paymentResponse').hide();
        $('#paymentModal').addClass('active');
    });

    $('#closePayment, #paymentModal').on('click', function(e) {
        if(e.target !== this) return;
        $('#paymentModal').removeClass('active');
    });

    $('#closeSuccess, #successModal').on('click', function(e) {
        if(e.target !== this) return;
        window.location.href = 'home.php';
    });

    $('#successDownloadPdf').on('click', function(e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (url === '#') return;

        // Trigger download via hidden iframe
        $('#downloadHub').attr('src', url);

        // Show downloading state
        const btn = $(this);
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Downloading...');

        // Wait 2 seconds then redirect
        setTimeout(() => {
            window.location.href = 'home.php';
        }, 2000);
    });

    $('#paymentForm').on('submit', function(e) {
        e.preventDefault();
        const btn = $('#confirmPayBtn');
        const bookingId = $('#paymentBookingId').val();
        btn.prop('disabled', true).text('Processing...');

        $.ajax({
            url: '../../update_booking_status.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if(resp.success) {
                    $('#paymentResponse').css('color', '#2ecc71').text('Payment successful!').fadeIn();
                    
                    // Show Success Modal
                    setTimeout(() => {
                        $('#paymentModal').removeClass('active');
                        $('#successDownloadPdf').attr('href', '../../generate_receipt.php?booking_id=' + resp.booking_id);
                        $('#successModal').addClass('active');
                    }, 500);
                } else {
                    $('#paymentResponse').css('color', '#ff4d4d').text(resp.message).fadeIn();
                    btn.prop('disabled', false).text('Confirm & Pay');
                }
            },
            error: function() {
                $('#paymentResponse').css('color', '#ff4d4d').text('Network error.').fadeIn();
                btn.prop('disabled', false).text('Confirm & Pay');
            }
        });
    });
});
</script>
</body>
</html>
