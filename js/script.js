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
