<?php

session_start();

// If the user ID is not set in the session, they are not logged in
if (!isset($_SESSION['user_id'])) {
   // Redirect them to the home page or trigger the login popup
   header("Location: home.php?login_required=true");
   exit();
}
?>

<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css?v=<?php echo time(); ?>">
   <!-- intl-tel-input CSS v23 -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.1/build/css/intlTelInput.css">
   <style>
      .iti { width: 100%; }
      
      /* Modal Styles */
      .payment-modal {
         display: none;
         position: fixed;
         z-index: 1000;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0,0,0,0.8);
         backdrop-filter: blur(5px);
         justify-content: center;
         align-items: center;
      }

      .payment-modal.active {
         display: flex;
      }

      .payment-card {
         background: #1e1e1e;
         width: 100%;
         max-width: 450px;
         padding: 2.5rem;
         border-radius: 4px;
         box-shadow: 0 10px 30px rgba(0,0,0,0.5);
         color: #fff;
         position: relative;
      }

      .payment-card .logo {
         text-align: center;
         margin-bottom: 2rem;
         font-size: 1.5rem;
         font-weight: bold;
         letter-spacing: 1px;
         color: #fff;
      }

      .payment-card h2 {
         font-size: 1.2rem;
         margin-bottom: 1.5rem;
         text-transform: uppercase;
         letter-spacing: 1px;
         text-align: center;
      }

      .input-group {
         margin-bottom: 1.2rem;
         text-align: left;
      }

      .input-group label {
         display: block;
         font-size: 0.8rem;
         color: #b5b5b5;
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
         font-size: 1.1rem;
         transition: border-color 0.3s;
      }

      .input-group input:focus {
         outline: none;
         border-color: #0078f2;
      }

      .flex-row {
         display: flex;
         gap: 1rem;
      }

      .btn-pay {
         width: 100%;
         background: #0078f2;
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

      .close-modal {
         position: absolute;
         top: 10px;
         right: 15px;
         font-size: 2rem;
         color: #b5b5b5;
         cursor: pointer;
      }
   </style>


   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


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

<div class="heading" style="background:url(../../images/header-bg-3.png) no-repeat">
   <h1>book now</h1>
</div>

<!-- booking section starts  -->

<section class="booking">

   <h1 class="heading-title">book your trip!</h1>

   <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
      <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
      <?php
   unset($_SESSION['success_message']);
}
?>

   <form action="book_form.php" method="post" class="book-form" id="bookingForm">

      <div class="flex">
         <div class="inputBox">
            <span>name :</span>
            <input type="text" placeholder="enter your name" name="name" id="name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>">
            <span class="error-message" id="nameError">This field is required</span>
         </div>
         <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="enter your email" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <span class="error-message" id="emailError">Please enter a valid email</span>
         </div>
         <div class="inputBox">
            <span>phone :</span>
            <input type="tel" placeholder="enter your number" name="phone" id="phone">
            <span class="error-message" id="phoneError">Phone must be exactly 11 digits</span>
         </div>
         <div class="inputBox">
            <span>address :</span>
            <input type="text" placeholder="enter your address" name="address" id="address">
            <span class="error-message" id="addressError">This field is required</span>
         </div>
         <div class="inputBox">
            <span>where to :</span>
            <input type="text" placeholder="place you want to visit" name="location" id="location">
            <span class="error-message" id="locationError">This field is required</span>
         </div>
         <div class="inputBox">
            <span>how many :</span>
            <input type="number" placeholder="number of guests" name="guests" id="guests" min="1" value="1">
            <span class="error-message" id="guestsError">This field is required</span>
         </div>
         <div class="inputBox" id="pricingDisplay" style="display: none;">
            <span>pricing details :</span>
            <div style="background: var(--light-bg); padding: 1rem; border-radius: .5rem; font-size: 1.5rem; color: var(--light-color);">
                <div>Unit Price: <strong id="liveUnitPrice" style="color: var(--black);">Eg 0</strong></div>
                <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid rgba(0,0,0,0.1);">
                    Total Price: <strong id="liveTotalPrice" style="color: var(--black);">Eg 0</strong>
                </div>
            </div>
         </div>
         <div class="inputBox">
            <span>arrivals :</span>
            <input type="date" name="arrivals" id="arrivals">
            <span class="error-message" id="arrivalsError">This field is required</span>
         </div>
         <div class="inputBox">
            <span>leaving :</span>
            <input type="date" name="leaving" id="leaving">
            <span class="error-message" id="leavingError">This field is required</span>
         </div>
      </div>

      <!-- Hidden fields for package and total price -->
      <input type="hidden" name="package_name" id="packageName">
      <input type="hidden" name="total_amount" id="totalAmount">

      <input type="button" value="submit" class="btn" name="send" id="submitBtn">

   </form>
</section>

<!-- Payment Modal -->
<div class="payment-modal" id="paymentModal">
   <div class="payment-card">
      <span class="close-modal" onclick="document.getElementById('paymentModal').classList.remove('active')">&times;</span>
      <div class="logo">TRAVEL AGENCY</div>
      <h2>Secure Checkout</h2>
      
      <form id="paymentForm">
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
         
         <button type="submit" class="btn-pay">Confirm & Pay</button>
      </form>
   </div>
</div>

<!-- Invoice Modal (Review Your Booking) -->
<div class="invoice-modal" id="invoiceModal">
   <div class="invoice-card">
      <div class="invoice-header">
         <h2>Review Your Booking</h2>
      </div>
      <div class="invoice-body">
         <div class="item">
            <span class="label">Package:</span>
            <span id="invoicePackage">Not Selected</span>
         </div>
         <div class="item">
            <span class="label">Guests:</span>
            <span id="invoiceGuests">0</span>
         </div>
         <div class="item">
            <span class="label">Price per Guest:</span>
            <span id="invoiceBasePrice">Eg 0</span>
         </div>
         <div class="promo-section">
            <input type="text" placeholder="Enter Promo Code" id="promoCode">
         </div>
         <div class="total">
            <span>Total Price:</span>
            <span id="invoiceTotal">Eg 0</span>
         </div>
      </div>
      <div class="invoice-footer">
         <button class="btn btn-secondary" onclick="document.getElementById('invoiceModal').classList.remove('active')">Back</button>
         <button class="btn btn-outline" id="bookPayLater">Book & Pay Later</button>
         <button class="btn btn-outline" id="requestBookingBtn" style="display: none;">Request Booking</button>
         <button class="btn" id="proceedToPay">Confirm & Pay</button>
      </div>
   </div>
</div>

<!-- Success Modal -->
<div class="success-modal" id="successModal">
   <div class="success-card">
      <div class="checkmark-wrapper">
         <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
         </svg>
      </div>
      <h2>Booking Successful!</h2>
      <p>Your trip has been booked successfully! Travel details will be sent to your email, and we will contact you within 24 business hours.</p>
      <button class="btn btn-pdf" id="downloadReceiptBtn"><i class="fas fa-file-pdf"></i> Download Receipt (PDF)</button>
      <div class="progress-container">
         <div class="progress-bar" id="progressBar"></div>
      </div>
   </div>
</div>

<button type="button" class="scroll-top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>
<!-- booking section ends -->
<!-- footer section starts  -->
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

<!-- intl-tel-input JS v23 -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.1/build/js/intlTelInput.min.js"></script>
<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     initialCountry: "auto",
     separateDialCode: true,
     geoIpLookup: function(callback) {
       fetch('https://ipinfo.io/json?token=YOUR_TOKEN_HERE', { headers: { 'Accept': 'application/json' }})
         .then((resp) => resp.json())
         .catch(() => { return { country: 'us' }; })
         .then((resp) => callback(resp.country));
     },
     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.1/build/js/utils.js",
   });
</script>

<!-- custom js file link  -->
<script src="../../js/script.js?v=<?php echo time(); ?>"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
   const arrivalsInput = document.getElementById('arrivals');
   const leavingInput = document.getElementById('leaving');
   const guestsInput = document.getElementById('guests');
   const locationInput = document.getElementById('location');
   const packageNameHidden = document.getElementById('packageName');
   const totalAmountHidden = document.getElementById('totalAmount');
   const downloadReceiptBtn = document.getElementById('downloadReceiptBtn');

   window.downloadAndHome = function(bookingId) {
       // Trigger download in a hidden way
       const link = document.createElement('a');
       link.href = '../../generate_receipt.php?booking_id=' + bookingId;
       link.target = '_blank'; // Opens in background or new tab
       link.download = 'Receipt_' + bookingId + '.pdf';
       document.body.appendChild(link);
       link.click();
       document.body.removeChild(link);

       // Redirect to home after 1.5 seconds
       setTimeout(() => {
           window.location.href = 'home.php';
       }, 1500);
   };

   // Handle Package URL Parameters
   const urlParams = new URLSearchParams(window.location.search);
   const pkgName = urlParams.get('p');
   const pkgPrice = urlParams.get('price');

   if (pkgName) {
      locationInput.value = pkgName;
      packageNameHidden.value = pkgName;
   }

   // Dynamic Pricing Logic
   const pricingDisplay = document.getElementById('pricingDisplay');
   const liveUnitPrice = document.getElementById('liveUnitPrice');
   const liveTotalPrice = document.getElementById('liveTotalPrice');
   const proceedToPayBtn = document.getElementById('proceedToPay');
   const bookPayLaterBtn = document.getElementById('bookPayLater');
   const requestBookingBtn = document.getElementById('requestBookingBtn');
   const invoiceBasePrice = document.getElementById('invoiceBasePrice');
   const invoiceTotal = document.getElementById('invoiceTotal');
   const invoicePackage = document.getElementById('invoicePackage');
   const promoSection = document.querySelector('.promo-section');

   let basePrice = parseInt(pkgPrice) || 0;

   if (basePrice > 0) {
      pricingDisplay.style.display = 'block';
      liveUnitPrice.textContent = 'Eg ' + basePrice.toLocaleString();
      updateTotalPrice();
   } else {
      // Manual/Custom Booking Logic
      if (proceedToPayBtn) proceedToPayBtn.style.display = 'none';
      if (bookPayLaterBtn) bookPayLaterBtn.style.display = 'none';
      if (requestBookingBtn) requestBookingBtn.style.display = 'inline-block';
      
      // Hide pricing details in invoice
      if (invoiceBasePrice) invoiceBasePrice.parentElement.style.display = 'none';
      if (invoiceTotal) invoiceTotal.parentElement.style.display = 'none';
      if (promoSection) promoSection.style.display = 'none';
      
      // Update package text
      if (invoicePackage) invoicePackage.textContent = 'Custom Request';
   }

   function updateTotalPrice() {
      let guestsCount = parseInt(guestsInput.value) || 1;
      let total = guestsCount * basePrice;
      liveTotalPrice.textContent = 'Eg ' + total.toLocaleString();
      totalAmountHidden.value = total;
   }

   guestsInput.addEventListener('input', updateTotalPrice);

   // Set minimum arrival date to today
   const today = new Date().toISOString().split('T')[0];
   arrivalsInput.setAttribute('min', today);

   // Update leaving date minimum when arrival date changes
   arrivalsInput.addEventListener('change', () => {
      if (arrivalsInput.value) {
         const arrivalDate = new Date(arrivalsInput.value);
         arrivalDate.setDate(arrivalDate.getDate() + 1);
         const nextDay = arrivalDate.toISOString().split('T')[0];
         leavingInput.setAttribute('min', nextDay);
         
         // Clear leaving date if it's now invalid
         if (leavingInput.value && leavingInput.value < nextDay) {
            leavingInput.value = '';
         }
      }
   });
   const paymentModal = document.getElementById('paymentModal');
   const paymentForm = document.getElementById('paymentForm');
   const submitBtn = document.getElementById('submitBtn');

   const validateField = (id, errorId, validationFn, errorMessage) => {
      const field = document.getElementById(id);
      const errorSpan = document.getElementById(errorId);
      const value = field.value.trim();
      
      if (!validationFn(value)) {
         field.classList.add('invalid');
         errorSpan.textContent = errorMessage || 'This field is required';
         errorSpan.classList.add('active');
         return false;
      } else {
         field.classList.remove('invalid');
         errorSpan.classList.remove('active');
         return true;
      }
   };

   const isNotEmpty = value => value !== '';
   const isValidEmail = value => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
   const isValidPhone = value => /^\d{11}$/.test(value.replace(/\D/g, ''));

   submitBtn.addEventListener('click', (e) => {
      let isValid = true;

      isValid &= validateField('name', 'nameError', isNotEmpty, 'This field is required');
      isValid &= validateField('email', 'emailError', (v) => isNotEmpty(v) && isValidEmail(v), isNotEmpty(document.getElementById('email').value) ? 'Invalid email format' : 'This field is required');
      isValid &= validateField('phone', 'phoneError', (v) => isNotEmpty(v) && isValidPhone(v), isNotEmpty(document.getElementById('phone').value) ? 'Phone must be exactly 11 digits' : 'This field is required');
      isValid &= validateField('address', 'addressError', isNotEmpty, 'This field is required');
      isValid &= validateField('location', 'locationError', isNotEmpty, 'This field is required');
      isValid &= validateField('guests', 'guestsError', isNotEmpty, 'This field is required');
      isValid &= validateField('arrivals', 'arrivalsError', isNotEmpty, 'This field is required');
      isValid &= validateField('leaving', 'leavingError', (v) => {
         if (!isNotEmpty(v)) return false;
         if (arrivalsInput.value && v <= arrivalsInput.value) {
            return false;
         }
         return true;
      }, isNotEmpty(document.getElementById('leaving').value) ? 'Leaving date must be after the arrival date' : 'This field is required');

      if (isValid) {
         // Calculate and Populate Invoice
         const guests = parseInt(guestsInput.value) || 1;
         const basePrice = parseInt(pkgPrice) || 5000; // Default if no package selected
         const total = guests * basePrice;

         document.getElementById('invoicePackage').textContent = pkgName || locationInput.value;
         document.getElementById('invoiceGuests').textContent = guests;
         document.getElementById('invoiceBasePrice').textContent = 'Eg ' + basePrice.toLocaleString();
         document.getElementById('invoiceTotal').textContent = 'Eg ' + total.toLocaleString();

         // Set hidden fields
         packageNameHidden.value = pkgName || locationInput.value;
         totalAmountHidden.value = total;

         // Show Invoice Modal
         document.getElementById('invoiceModal').classList.add('active');
      }
   });

   // Proceed from Invoice to Payment
   document.getElementById('proceedToPay').addEventListener('click', () => {
      document.getElementById('invoiceModal').classList.remove('active');
      paymentModal.classList.add('active');
   });

   // Book & Pay Later Logic
   document.getElementById('bookPayLater').addEventListener('click', (e) => {
      e.preventDefault();
      
      const formData = new FormData(bookingForm);
      formData.append('send', 'submit');
      formData.append('payment_status', 'Pending'); // Ensure this writes Pending to database

      const payLaterBtn = document.getElementById('bookPayLater');
      payLaterBtn.disabled = true;
      payLaterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

      fetch('book_form.php', {
         method: 'POST',
         body: formData
      })
      .then(response => response.json())
      .then(data => {
         if (data.success) {
            document.getElementById('invoiceModal').classList.remove('active');
            
            const successModal = document.getElementById('successModal');
            successModal.classList.add('active');

             if (downloadReceiptBtn && data.booking_id) {
                downloadReceiptBtn.onclick = () => downloadAndHome(data.booking_id);
             }

            const progressBar = document.getElementById('progressBar');
            progressBar.style.animation = 'none';
            progressBar.offsetHeight; 
            progressBar.style.animation = null;

             // Auto-redirect to home after 5 seconds
             setTimeout(() => {
                window.location.href = 'home.php';
             }, 5000);
         } else {
            alert('Error: ' + data.message);
            payLaterBtn.disabled = false;
            payLaterBtn.innerText = 'Book & Pay Later';
         }
      })
      .catch(error => {
         console.error('Error:', error);
         alert('Connection error occurred.');
         payLaterBtn.disabled = false;
         payLaterBtn.innerText = 'Book & Pay Later';
      });
   });

   // Request Booking Logic (Custom Try)
   if (document.getElementById('requestBookingBtn')) {
      document.getElementById('requestBookingBtn').addEventListener('click', (e) => {
         e.preventDefault();
         
         const formData = new FormData(bookingForm);
         formData.append('send', 'submit');
         formData.append('payment_status', 'Pending');
         formData.append('package_name', 'Custom Request');

         const reqBtn = document.getElementById('requestBookingBtn');
         reqBtn.disabled = true;
         reqBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

         fetch('book_form.php', {
            method: 'POST',
            body: formData
         })
         .then(response => response.json())
         .then(data => {
            if (data.success) {
               document.getElementById('invoiceModal').classList.remove('active');
               
               const successModal = document.getElementById('successModal');
               // Modify text
               successModal.querySelector('h2').textContent = 'Thank you!';
               successModal.querySelector('p').textContent = 'Our customer service team will contact you shortly.';
               successModal.classList.add('active');

                if (downloadReceiptBtn && data.booking_id) {
                   downloadReceiptBtn.onclick = () => downloadAndHome(data.booking_id);
                }

               const progressBar = document.getElementById('progressBar');
               progressBar.style.animation = 'none';
               progressBar.offsetHeight; 
               progressBar.style.animation = null;

                // Auto-redirect to home after 5 seconds
                setTimeout(() => {
                   window.location.href = 'home.php';
                }, 5000);
            } else {
               alert('Error: ' + data.message);
               reqBtn.disabled = false;
               reqBtn.innerText = 'Request Booking';
            }
         })
         .catch(error => {
            console.error('Error:', error);
            alert('Connection error occurred.');
            reqBtn.disabled = false;
            reqBtn.innerText = 'Request Booking';
         });
      });
   }

   paymentForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      const formData = new FormData(bookingForm);
      formData.append('send', 'submit');
      formData.append('payment_status', 'Paid');
      
      const payBtn = paymentForm.querySelector('.btn-pay');
      payBtn.disabled = true;
      payBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
      
      fetch('book_form.php', {
         method: 'POST',
         body: formData
      })
      .then(response => response.json())
      .then(data => {
         if (data.success) {
            paymentModal.classList.remove('active');
            const successModal = document.getElementById('successModal');
            successModal.classList.add('active');
            
             if (downloadReceiptBtn && data.booking_id) {
                downloadReceiptBtn.onclick = () => downloadAndHome(data.booking_id);
             }

            // Trigger progress bar animation
            const progressBar = document.getElementById('progressBar');
            progressBar.style.animation = 'none';
            progressBar.offsetHeight; // trigger reflow
            progressBar.style.animation = null;
            
             // Auto-redirect to home after 5 seconds
             setTimeout(() => {
                window.location.href = 'home.php';
             }, 5000);
         } else {
            alert('Error: ' + data.message);
            payBtn.disabled = false;
            payBtn.innerText = 'Confirm & Pay';
         }
      })
      .catch(error => {
         console.error('Error:', error);
         alert('An error occurred while processing your booking.');
         payBtn.disabled = false;
         payBtn.innerText = 'Confirm & Pay';
      });
   });

   // Input focus listener to remove invalid state
   const inputs = bookingForm.querySelectorAll('input');
   inputs.forEach(input => {
      input.addEventListener('input', () => {
         input.classList.remove('invalid');
         const errorSpan = document.getElementById(input.id + 'Error');
         if (errorSpan) errorSpan.classList.remove('active');
      });
   });
});
</script>
</body>
</html>
