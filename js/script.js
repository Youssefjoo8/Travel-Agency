let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

if (menu) {
   menu.onclick = () => {
      menu.classList.toggle('fa-times');
      navbar.classList.toggle('active');
   };
}

// Active Link Highlighting
const currentDetails = location.pathname.split('/').pop();
// Handle URL encoding for filenames with spaces
const currentFile = decodeURIComponent(currentDetails);
const navLinks = document.querySelectorAll('.header .navbar a');

navLinks.forEach(link => {
   const linkHref = link.getAttribute('href');
   // Remove query params for comparison
   const cleanHref = linkHref.split('?')[0];

   if (currentFile === cleanHref || (currentFile === '' && cleanHref === 'home.php')) {
      link.classList.add('active');
   } else {
      link.classList.remove('active');
   }
});

// Menu handler will be merged into window.onscroll at the bottom

// Theme Management
const themeToggleBtn = document.querySelector('#theme-btn');

function applyTheme(theme) {
   if (theme === 'dark') {
      document.body.setAttribute('data-theme', 'dark');
      if (themeToggleBtn) {
         themeToggleBtn.classList.remove('fa-moon');
         themeToggleBtn.classList.add('fa-sun');
      }
   } else {
      document.body.removeAttribute('data-theme');
      if (themeToggleBtn) {
         themeToggleBtn.classList.remove('fa-sun');
         themeToggleBtn.classList.add('fa-moon');
      }
   }
}

function getPreferredTheme() {
   const storedTheme = localStorage.getItem('theme');
   if (storedTheme) {
      return storedTheme;
   }
   return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
}

// Initial Load
(function () {
   const currentTheme = getPreferredTheme();
   applyTheme(currentTheme);
})();


if (themeToggleBtn) {
   themeToggleBtn.onclick = () => {
      const currentTheme = document.body.getAttribute('data-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      applyTheme(newTheme);
      localStorage.setItem('theme', newTheme);
   };
}

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
   if (!localStorage.getItem('theme')) {
      const newTheme = event.matches ? 'dark' : 'light';
      applyTheme(newTheme);
   }
});

var swiper = new Swiper(".home-slider", {
   loop: true,
   navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
   },
});

var swiper = new Swiper(".reviews-slider", {
   loop: true,
   grabCursor: true,
   spaceBetween: 20,
   autoplay: {
      delay: 2500,
      disableOnInteraction: false,
      pauseOnMouseEnter: true, // Pause on hover
   },
   breakpoints: {
      640: {
         slidesPerView: 1,
      },
      768: {
         slidesPerView: 2,
      },
      1024: {
         slidesPerView: 3,
      },
   },
});

let loadMoreBtn = document.querySelector('.packages .load-more .btn');
if (loadMoreBtn) {
   let currentItem = 3;

   loadMoreBtn.onclick = () => {
      let boxes = [...document.querySelectorAll('.packages .box-container .box')];
      for (var i = currentItem; i < currentItem + 3; i++) {
         boxes[i].style.display = 'inline-block';
      };
      currentItem += 3;
      if (currentItem >= boxes.length) {
         loadMoreBtn.style.display = 'none';
      }
   }
}

// FAQ Accordion
let accordions = document.querySelectorAll('.faq .accordion-container .accordion');

accordions.forEach(accordion => {
   accordion.onclick = () => {
      accordions.forEach(acc => {
         if (acc !== accordion) {
            acc.classList.remove('active');
            let body = acc.querySelector('.accordion-body');
            body.style.height = 0;
            // Reset icon if needed, CSS handles rotation via .active
         }
      });

      accordion.classList.toggle('active');
      let body = accordion.querySelector('.accordion-body');
      if (accordion.classList.contains('active')) {
         body.style.height = body.scrollHeight + 'px';
         // Icon rotation handled by CSS .active
      } else {
         body.style.height = 0;
      }
   }
});

// Scroll to Top
let scrollTopBtn = document.querySelector('.scroll-top');

if (scrollTopBtn) {
   scrollTopBtn.onclick = () => {
      window.scrollTo({
         top: 0,
         behavior: 'smooth'
      });
   };

   window.addEventListener('scroll', () => {
      // Also close menu on scroll as before
      if (menu && navbar) {
         menu.classList.remove('fa-times');
         navbar.classList.remove('active');
      }

      if (window.scrollY > 200) {
         scrollTopBtn.style.display = 'block';
      } else {
         scrollTopBtn.style.display = 'none';
      }
   });
}

// Sidebar Profile Logic
function switchSidebarTab(tabName) {
   // Remove active from all tabs and contents
   document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
   document.querySelectorAll('.sidebar-content-area').forEach(content => content.classList.remove('active'));

   // Add active to the clicked tab
   if (tabName === 'settings') {
      document.querySelectorAll('.tab-btn')[0].classList.add('active');
      document.getElementById('tab-settings').classList.add('active');
   } else if (tabName === 'bookings') {
      document.querySelectorAll('.tab-btn')[1].classList.add('active');
      document.getElementById('tab-bookings').classList.add('active');
   }
}

let profileSidebar = document.querySelector('.user-sidebar');
let profileBtn = document.querySelector('#profile-btn');
let sidebarClose = document.querySelector('#sidebar-close');

// Redirect parameter listener for Dashboard auto-open
document.addEventListener('DOMContentLoaded', () => {
   const urlParams = new URLSearchParams(window.location.search);
   if (urlParams.get('open_bookings') === 'true') {
      const profileBtn = document.getElementById('profile-btn');
      if (profileBtn) {
         profileBtn.click(); // Spawns the sidebar
         switchSidebarTab('bookings'); // Rapidly changes active array index
         window.history.replaceState({}, document.title, window.location.pathname); // Discretely strip the URL footprint
      }
   }
});

if (profileBtn) {
   profileBtn.onclick = () => {
      profileSidebar.classList.toggle('active');
   }
}

if (sidebarClose) {
   sidebarClose.onclick = () => {
      profileSidebar.classList.remove('active');
   }
}

// Function to close the profile sidebar when clicking outside
window.addEventListener('click', function (event) {
   // If the sidebar is open and the user clicks outside of it
   if (profileSidebar && profileSidebar.classList.contains('active') &&
      !profileSidebar.contains(event.target) &&
      (profileBtn && !profileBtn.contains(event.target))) {

      profileSidebar.classList.remove('active');
   }
});

// Cancel Booking Logic
function cancelBooking(bookingId) {
   if (confirm("Are you sure you want to cancel this trip?")) {
      let basePath = window.location.pathname.includes('/pages/') ? '../../' : '';

      fetch(basePath + 'cancel_booking.php', {
         method: 'POST',
         headers: {
            'Content-Type': 'application/json'
         },
         body: JSON.stringify({ booking_id: bookingId })
      })
         .then(response => response.json())
         .then(data => {
            if (data.success) {
               // Update UI
               let badge = document.getElementById('badge-' + bookingId);
               if (badge) {
                  badge.textContent = 'Cancelled';
                  badge.className = 'status-badge badge-cancelled';
               }
               // Remove Cancel Button
               let btn = document.querySelector('button[data-id="' + bookingId + '"]');
               if (btn) {
                  btn.remove();
               }
            } else {
               alert("Failed to cancel: " + data.message);
            }
         })
         .catch(err => {
            console.error("Error cancelling booking:", err);
            alert("An error occurred. Please try again.");
         });
   }
}

// Profile Image preview
let profileImgInput = document.querySelector('#profile_image_input');
if (profileImgInput) {
   profileImgInput.onchange = (e) => {
      if (e.target.files && e.target.files[0]) {
         let reader = new FileReader();
         reader.onload = function (e) {
            document.querySelector('#sidebar-profile-img').src = e.target.result;
         }
         reader.readAsDataURL(e.target.files[0]);
      }
   }
}

// Profile Form Submit
let profileForm = document.querySelector('#profile-form');
if (profileForm) {
   profileForm.onsubmit = (e) => {
      e.preventDefault();

      let formData = new FormData(profileForm);
      let messageEl = document.querySelector('#profile-message');

      const basePath = window.location.pathname.includes('/Travel-Agency/') ? '/Travel-Agency/' : '/';

      fetch(basePath + 'update_profile.php', {
         method: 'POST',
         body: formData
      })
         .then(res => res.json())
         .then(data => {
            messageEl.style.display = 'block';
            if (data.success) {
               messageEl.textContent = data.message;
               messageEl.className = 'message success';
               if (data.user) {
                  document.querySelector('#sidebar-user-name').textContent = data.user.full_name;
               }
               // Clear password if it was set
               document.querySelector('#password').value = '';
            } else {
               messageEl.textContent = data.message;
               messageEl.className = 'message error';
            }
            setTimeout(() => {
               messageEl.style.display = 'none';
            }, 4000);
         })
         .catch(error => {
            console.error('Error:', error);
            messageEl.style.display = 'block';
            messageEl.textContent = "Something went wrong";
            messageEl.className = 'message error';
         });
   }
}
