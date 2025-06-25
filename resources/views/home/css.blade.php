 <!-- Basic -->
 <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

  <title>
    Bikes By Fazenda
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />  
  
  <!-- Mobile Navigation Fixes -->
  <link href="{{asset('css/mobile-fixes.css')}}" rel="stylesheet" />

  <!-- Mobile Global CSS - Fix navegação entre páginas -->
  <style>
    /* Reset global para mobile - Evita conflitos entre páginas */
    @media (max-width: 768px) {
      /* Reset básico */
      * {
        box-sizing: border-box;
      }
      
      body {
        font-size: 16px !important;
        line-height: 1.6 !important;
        overflow-x: hidden !important;
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
      }

      /* Container global mobile */
      .container, .container-fluid {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
        max-width: 100% !important;
      }

      /* Reset de margens e padding globais */
      .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }

      [class*="col-"] {
        padding-left: 0.5rem !important;
        padding-right: 0.5rem !important;
      }

      /* Header mobile global */
      .header_section {
        position: relative !important;
        z-index: 1000 !important;
      }

      /* Navbar mobile global */
      .navbar {
        padding: 0.5rem 1rem !important;
      }

      .navbar-brand {
        font-size: 1.25rem !important;
      }

      .navbar-toggler {
        border: none !important;
        padding: 0.25rem !important;
      }

      /* Cards globais mobile */
      .card {
        margin-bottom: 1rem !important;
        border-radius: 12px !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
      }

      .card-body {
        padding: 1rem !important;
      }

      /* Botões globais mobile */
      .btn {
        min-height: 44px !important;
        padding: 12px 20px !important;
        font-size: 0.95rem !important;
        border-radius: 8px !important;
        touch-action: manipulation !important;
        user-select: none !important;
      }

      .btn-primary {
        background-color: #9935dc !important;
        border-color: #9935dc !important;
      }

      /* Forms globais mobile */
      .form-control {
        min-height: 44px !important;
        padding: 12px 16px !important;
        font-size: 1rem !important;
        border-radius: 8px !important;
        border: 1px solid #ced4da !important;
        touch-action: manipulation !important;
      }

      .form-control:focus {
        border-color: #9935dc !important;
        box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25) !important;
      }

      /* Tabelas globais mobile */
      .table-responsive {
        border-radius: 8px !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
      }

      /* Loading overlay global */
      .loading-overlay {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        background-color: rgba(255, 255, 255, 0.9) !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        z-index: 9999 !important;
        opacity: 0 !important;
        visibility: hidden !important;
        transition: opacity 0.3s ease, visibility 0.3s ease !important;
      }

      .loading-overlay.active {
        opacity: 1 !important;
        visibility: visible !important;
      }

      /* Footer mobile global */
      .footer {
        margin-top: 2rem !important;
      }

             /* Scroll behavior - removed smooth to prevent conflicts */
       html {
         scroll-behavior: auto !important;
       }

      /* Remove outline em touch devices */
      *:focus {
        outline: none !important;
      }

      /* Melhor tap highlight */
      * {
        -webkit-tap-highlight-color: rgba(153, 53, 220, 0.1) !important;
      }
    }

    @media (max-width: 576px) {
      body {
        font-size: 14px !important;
      }

      .container, .container-fluid {
        padding-left: 0.75rem !important;
        padding-right: 0.75rem !important;
      }

      [class*="col-"] {
        padding-left: 0.25rem !important;
        padding-right: 0.25rem !important;
      }

      .btn {
        min-height: 40px !important;
        padding: 10px 16px !important;
        font-size: 0.9rem !important;
      }

      .form-control {
        min-height: 40px !important;
        padding: 10px 14px !important;
        font-size: 0.95rem !important;
      }
    }

    /* Reset específico para iOS */
    @supports (-webkit-touch-callout: none) {
      @media (max-width: 768px) {
        .form-control, .btn {
          -webkit-appearance: none !important;
          appearance: none !important;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        textarea,
        select {
          -webkit-appearance: none !important;
          appearance: none !important;
          border-radius: 8px !important;
        }
      }
    }

    /* Prevent zoom on double tap */
    @media (max-width: 768px) {
      input, button, select, textarea {
        touch-action: manipulation !important;
      }
    }

    /* Global mobile navigation fixes */
    @media (max-width: 768px) {
      .nav-tabs {
        overflow-x: auto !important;
        white-space: nowrap !important;
        -webkit-overflow-scrolling: touch !important;
        scrollbar-width: none !important;
        -ms-overflow-style: none !important;
      }

      .nav-tabs::-webkit-scrollbar {
        display: none !important;
      }

      .nav-link {
        white-space: nowrap !important;
        touch-action: manipulation !important;
      }
    }

    /* Accessibility improvements */
    @media (prefers-reduced-motion: reduce) {
      * {
        transition: none !important;
        animation: none !important;
      }
    }

    /* High contrast support */
    @media (prefers-contrast: high) {
      .btn, .form-control {
        border-width: 2px !important;
      }
    }
  </style>  

  <!-- Mobile Global JavaScript - Fix navegação entre páginas -->
  <script>
    // Global Mobile Navigation Fixes
    (function() {
      'use strict';
      
      // Viewport Fix para iOS
      function fixViewport() {
        const viewport = document.querySelector('meta[name="viewport"]');
        if (viewport) {
          viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover');
        }
      }
      
      // Reset Loading States
      function resetLoadingStates() {
        const loadingOverlays = document.querySelectorAll('.loading-overlay');
        loadingOverlays.forEach(overlay => {
          overlay.classList.remove('active');
          overlay.style.opacity = '0';
          overlay.style.visibility = 'hidden';
        });
      }
      
      // Reset Mobile Menu States
      function resetMobileMenus() {
        const navbarTogglers = document.querySelectorAll('.navbar-toggler');
        const navbarCollapses = document.querySelectorAll('.navbar-collapse');
        
        navbarTogglers.forEach(toggler => {
          toggler.setAttribute('aria-expanded', 'false');
          toggler.classList.add('collapsed');
        });
        
        navbarCollapses.forEach(collapse => {
          collapse.classList.remove('show');
        });
        
        // Remove backdrop se existir
        const backdrops = document.querySelectorAll('.modal-backdrop, .navbar-backdrop');
        backdrops.forEach(backdrop => backdrop.remove());
      }
      
             // Reset Scroll Position (Only on page load, not during usage)
       function resetScrollPosition() {
         // Don't reset if user is actively scrolling
         if (userIsScrolling) {
           return;
         }
         
         // Only reset scroll on actual page navigation, not during normal usage
         const navigationTypes = ['navigate', 'reload'];
         if (window.performance && window.performance.navigation && 
             navigationTypes.includes(window.performance.navigation.type)) {
           if (window.innerWidth <= 768) {
             setTimeout(() => {
               // Double check user isn't scrolling before resetting
               if (!userIsScrolling) {
                 window.scrollTo(0, 0);
               }
             }, 100);
           }
         }
       }
      
      // Fix iOS Bounce
      function fixIOSBounce() {
        if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
          document.body.style.overflowX = 'hidden';
          document.body.addEventListener('touchmove', function(e) {
            if (e.scale !== 1) {
              e.preventDefault();
            }
          }, { passive: false });
        }
      }
      
      // Reset Form States
      function resetFormStates() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
          // Remove loading states de botões
          const buttons = form.querySelectorAll('.btn');
          buttons.forEach(btn => {
            btn.disabled = false;
            btn.innerHTML = btn.innerHTML.replace(/spinner|loading/gi, '');
            btn.classList.remove('loading', 'disabled');
          });
          
          // Reset form validation
          form.classList.remove('was-validated');
          const invalidInputs = form.querySelectorAll('.is-invalid');
          invalidInputs.forEach(input => input.classList.remove('is-invalid'));
        });
      }
      
             // Initialize on DOM Content Loaded
       function initialize() {
         fixViewport();
         resetLoadingStates();
         resetMobileMenus();
         resetFormStates();
         fixIOSBounce();
         
         // Only reset scroll on initial page load if needed
         if (document.readyState === 'loading' || window.performance.navigation.type === 1) {
           setTimeout(resetScrollPosition, 150);
         }
       }
      
      // Initialize on page load
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initialize);
      } else {
        initialize();
      }
      
      // Reset states on page show (back/forward navigation)
      window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
          initialize();
        }
      });
      
             // Reset states on orientation change (without scroll reset)
       window.addEventListener('orientationchange', function() {
         setTimeout(function() {
           resetLoadingStates();
           resetMobileMenus();
           // Removed automatic scroll reset on orientation change
         }, 300);
       });
      
      // Global loading overlay management
      window.mobileUtils = {
        showLoading: function() {
          const overlay = document.querySelector('.loading-overlay');
          if (overlay) {
            overlay.classList.add('active');
          }
        },
        
        hideLoading: function() {
          const overlay = document.querySelector('.loading-overlay');
          if (overlay) {
            overlay.classList.remove('active');
          }
        },
        
        resetPage: function() {
          initialize();
        }
      };
      
    })();
    
    // Fix para problemas específicos de touch
    if ('ontouchstart' in window) {
      document.addEventListener('DOMContentLoaded', function() {
        // Remove hover states em touch devices
        const hoverElements = document.querySelectorAll('[class*="hover"], .btn, .card');
        hoverElements.forEach(element => {
          element.addEventListener('touchstart', function() {
            this.classList.add('touch-active');
          });
          
          element.addEventListener('touchend', function() {
            setTimeout(() => {
              this.classList.remove('touch-active');
            }, 300);
          });
        });
      });
    }
  </script>  

  <!-- Enhanced Mobile Navigation JavaScript -->
  <script>
    // Enhanced mobile navigation fixes
    (function() {
      'use strict';
      
             // Prevent double-tap zoom and track user scrolling
       let userIsScrolling = false;
       let scrollTimeout;
       
       function preventDoubleTabZoom() {
         let lastTouchEnd = 0;
         document.addEventListener('touchend', function (event) {
           const now = (new Date()).getTime();
           if (now - lastTouchEnd <= 300) {
             event.preventDefault();
           }
           lastTouchEnd = now;
         }, false);
       }
       
       // Track when user is actively scrolling
       function trackUserScrolling() {
         let scrollTimer;
         
         window.addEventListener('scroll', function() {
           userIsScrolling = true;
           clearTimeout(scrollTimer);
           
           scrollTimer = setTimeout(function() {
             userIsScrolling = false;
           }, 150);
         }, { passive: true });
         
         // Track touch scrolling
         window.addEventListener('touchmove', function() {
           userIsScrolling = true;
           clearTimeout(scrollTimeout);
           
           scrollTimeout = setTimeout(function() {
             userIsScrolling = false;
           }, 150);
         }, { passive: true });
       }
      
      // Fix viewport on resize
      function fixViewportOnResize() {
        let resizeTimer;
        window.addEventListener('resize', function() {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(function() {
            if (window.innerWidth <= 768) {
              const viewport = document.querySelector('meta[name="viewport"]');
              if (viewport) {
                viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no');
              }
              
              // Reset any stuck states
              window.mobileUtils.resetPage();
            }
          }, 250);
        });
      }
      
      // Fix touch events that get stuck
      function fixStuckTouchEvents() {
        document.addEventListener('touchstart', function() {
          // Clear any stuck hover states
          const stuckElements = document.querySelectorAll('.hover, :hover');
          stuckElements.forEach(el => {
            if (el.classList.contains('hover')) {
              el.classList.remove('hover');
            }
          });
        });
      }
      
      // Fix Bootstrap conflicts
      function fixBootstrapConflicts() {
        // Ensure Bootstrap modals work properly
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
          modal.addEventListener('shown.bs.modal', function() {
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
          });
          
          modal.addEventListener('hidden.bs.modal', function() {
            document.body.style.position = '';
            document.body.style.width = '';
          });
        });
        
        // Fix navbar toggle
        const navbarTogglers = document.querySelectorAll('.navbar-toggler');
        navbarTogglers.forEach(toggler => {
          toggler.addEventListener('click', function() {
            setTimeout(() => {
              const navbar = document.querySelector('.navbar-collapse');
              if (navbar && navbar.classList.contains('show')) {
                document.body.style.overflow = 'hidden';
              } else {
                document.body.style.overflow = '';
              }
            }, 300);
          });
        });
      }
      
      // Fix form submission issues
      function fixFormSubmissions() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
          form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            if (submitBtn) {
              submitBtn.disabled = true;
              setTimeout(() => {
                if (submitBtn) {
                  submitBtn.disabled = false;
                }
              }, 3000);
            }
          });
        });
      }
      
      // Fix image loading issues
      function fixImageLoading() {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
          if (img.complete) {
            img.style.opacity = '1';
          } else {
            img.style.opacity = '0';
            img.addEventListener('load', function() {
              this.style.opacity = '1';
            });
            img.addEventListener('error', function() {
              this.style.display = 'none';
            });
          }
        });
      }
      
             // Fix scroll restoration (improved)
       function fixScrollRestoration() {
         if ('scrollRestoration' in history) {
           history.scrollRestoration = 'auto'; // Changed to auto for better UX
         }
         
         // Removed automatic scroll reset on beforeunload
         // This was causing the scroll to jump back to top
       }
      
      // Enhanced page reset
      function enhancedPageReset() {
        // Clear all timeouts and intervals
        const highestTimeoutId = setTimeout(";");
        for (let i = 0; i < highestTimeoutId; i++) {
          clearTimeout(i);
        }
        
        // Reset any stuck animations
        const animatedElements = document.querySelectorAll('[style*="transform"], [style*="transition"]');
        animatedElements.forEach(el => {
          el.style.transform = '';
          el.style.transition = '';
        });
        
        // Reset form states
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
          if (!form.getAttribute('data-preserve-state')) {
            form.reset();
          }
        });
        
        // Clear local storage of temporary data
        Object.keys(localStorage).forEach(key => {
          if (key.startsWith('temp_') || key.startsWith('mobile_')) {
            localStorage.removeItem(key);
          }
        });
      }
      
             // Initialize enhanced fixes
       function initializeEnhancedFixes() {
         preventDoubleTabZoom();
         trackUserScrolling(); // Track user scroll activity
         fixViewportOnResize();
         fixStuckTouchEvents();
         fixBootstrapConflicts();
         fixFormSubmissions();
         fixImageLoading();
         fixScrollRestoration();
       }
      
             // Extend mobileUtils
       window.mobileUtils = window.mobileUtils || {};
       Object.assign(window.mobileUtils, {
         enhancedReset: enhancedPageReset,
         fixImages: fixImageLoading,
         fixForms: fixFormSubmissions,
         
         // Utility to check if device is mobile
         isMobile: function() {
           return window.innerWidth <= 768;
         },
         
         // Check if user is currently scrolling
         isUserScrolling: function() {
           return userIsScrolling;
         },
         
         // Utility to safely navigate
         safeNavigate: function(url) {
           if (this.isMobile()) {
             this.showLoading();
             setTimeout(() => {
               window.location.href = url;
             }, 300);
           } else {
             window.location.href = url;
           }
         },
         
         // Safe scroll to top (only when user isn't scrolling)
         safeScrollToTop: function() {
           if (!userIsScrolling && this.isMobile()) {
             window.scrollTo(0, 0);
           }
         }
       });
      
      // Initialize on DOM ready
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeEnhancedFixes);
      } else {
        initializeEnhancedFixes();
      }
      
      // Re-initialize on page show
      window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
          initializeEnhancedFixes();
          enhancedPageReset();
        }
      });
      
    })();
    
    // Global error handler for mobile
    window.addEventListener('error', function(e) {
      if (window.mobileUtils && window.mobileUtils.isMobile()) {
        console.log('Mobile error caught:', e.error);
        // Hide any loading overlays on error
        window.mobileUtils.hideLoading();
      }
    });
    
    // Handle unhandled promise rejections
    window.addEventListener('unhandledrejection', function(e) {
      if (window.mobileUtils && window.mobileUtils.isMobile()) {
        console.log('Mobile promise rejection:', e.reason);
        window.mobileUtils.hideLoading();
      }
    });
  </script>  