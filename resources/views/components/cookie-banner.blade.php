<!-- Cookie Banner -->
<div id="cookieBanner" class="cookie-banner" style="display: none;">
  <div class="cookie-content">
    <div class="cookie-icon">
      <i class="fa-solid fa-cookie-bite"></i>
    </div>
    <div class="cookie-text">
      <h4>Cookie Preferences</h4>
      <p>We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies.</p>
    </div>
    <div class="cookie-actions">
      <button id="acceptAllCookies" class="btn btn-accept">Accept All</button>
      <button id="manageCookies" class="btn btn-manage">Manage Preferences</button>
      <button id="rejectAllCookies" class="btn btn-reject">Reject All</button>
    </div>
  </div>
</div>

<!-- Cookie Preferences Modal -->
<div id="cookieModal" class="cookie-modal" style="display: none;">
  <div class="cookie-modal-content">
    <div class="cookie-modal-header">
      <h3>Cookie Preferences</h3>
      <button id="closeCookieModal" class="close-modal">&times;</button>
    </div>
    
    <div class="cookie-modal-body">
      <div class="cookie-description">
        <h4>About Cookies</h4>
        <p>Cookies help us provide you with a better experience. You can choose which types of cookies you want to allow.</p>
      </div>

      <div class="cookie-categories">
        <!-- Essential Cookies -->
        <div class="cookie-category">
          <div class="category-header">
            <div class="category-info">
              <h5>Essential Cookies</h5>
              <p>These cookies are necessary for the website to function and cannot be switched off.</p>
            </div>
            <div class="category-toggle">
              <label class="toggle-switch">
                <input type="checkbox" id="essentialCookies" checked disabled>
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>

        <!-- Analytics Cookies -->
        <div class="cookie-category">
          <div class="category-header">
            <div class="category-info">
              <h5>Analytics Cookies</h5>
              <p>Help us understand how visitors interact with our website by collecting anonymous information.</p>
            </div>
            <div class="category-toggle">
              <label class="toggle-switch">
                <input type="checkbox" id="analyticsCookies">
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>

        <!-- Marketing Cookies -->
        <div class="cookie-category">
          <div class="category-header">
            <div class="category-info">
              <h5>Marketing Cookies</h5>
              <p>Used to track visitors across websites to display relevant advertisements.</p>
            </div>
            <div class="category-toggle">
              <label class="toggle-switch">
                <input type="checkbox" id="marketingCookies">
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>

        <!-- Functional Cookies -->
        <div class="cookie-category">
          <div class="category-header">
            <div class="category-info">
              <h5>Functional Cookies</h5>
              <p>Enable enhanced functionality and personalization, such as videos and live chats.</p>
            </div>
            <div class="category-toggle">
              <label class="toggle-switch">
                <input type="checkbox" id="functionalCookies">
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="cookie-modal-footer">
      <button id="savePreferences" class="btn btn-save">Save Preferences</button>
      <button id="acceptAllModal" class="btn btn-accept">Accept All</button>
    </div>
  </div>
</div>

<!-- Floating Cookie Settings Button -->
<div id="cookieFloatingBtn" class="cookie-floating-btn" style="display: none;">
  <button onclick="manageCookies()" title="Manage Cookie Preferences">
    <i class="fa-solid fa-cookie-bite"></i>
  </button>
</div>

<style>
/* ===== COOKIE BANNER STYLES ===== */
.cookie-banner {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  background: #fff;
  box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.15);
  z-index: 9999;
  padding: 20px;
  border-top: 3px solid #9935dc;
  animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
  from {
    transform: translateY(100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.cookie-content {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  gap: 20px;
}

.cookie-icon {
  font-size: 2.5rem;
  color: #9935dc;
  flex-shrink: 0;
}

.cookie-text {
  flex: 1;
}

.cookie-text h4 {
  margin: 0 0 8px 0;
  color: #2d3748;
  font-size: 1.2rem;
  font-weight: 600;
}

.cookie-text p {
  margin: 0;
  color: #4a5568;
  font-size: 0.95rem;
  line-height: 1.5;
}

.cookie-actions {
  display: flex;
  gap: 12px;
  flex-shrink: 0;
}

.cookie-actions .btn {
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  font-size: 0.9rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.btn-accept {
  background: #9935dc;
  color: white;
  box-shadow: 0 2px 8px rgba(153, 53, 220, 0.3);
}

.btn-accept:hover {
  background: #8024c0;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(153, 53, 220, 0.4);
}

.btn-manage {
  background: #f7fafc;
  color: #4a5568;
  border: 1px solid #e2e8f0;
}

.btn-manage:hover {
  background: #edf2f7;
  border-color: #9935dc;
  color: #9935dc;
}

.btn-reject {
  background: #fed7d7;
  color: #c53030;
  border: 1px solid #feb2b2;
}

.btn-reject:hover {
  background: #fbb6ce;
  border-color: #f56565;
}

/* ===== COOKIE MODAL STYLES ===== */
.cookie-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 10000;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.cookie-modal-content {
  background: white;
  border-radius: 12px;
  max-width: 600px;
  width: 100%;
  max-height: 80vh;
  overflow-y: auto;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
  animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
  from {
    transform: scale(0.9) translateY(-20px);
    opacity: 0;
  }
  to {
    transform: scale(1) translateY(0);
    opacity: 1;
  }
}

.cookie-modal-header {
  padding: 24px 24px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #e2e8f0;
  margin-bottom: 24px;
}

.cookie-modal-header h3 {
  margin: 0;
  color: #2d3748;
  font-size: 1.5rem;
  font-weight: 600;
}

.close-modal {
  background: none;
  border: none;
  font-size: 1.5rem;
  color: #9ca3af;
  cursor: pointer;
  padding: 4px;
  border-radius: 4px;
  transition: all 0.2s ease;
}

.close-modal:hover {
  color: #9935dc;
  background: rgba(153, 53, 220, 0.1);
}

.cookie-modal-body {
  padding: 0 24px;
}

.cookie-description h4 {
  color: #2d3748;
  font-size: 1.1rem;
  font-weight: 600;
  margin: 0 0 8px 0;
}

.cookie-description p {
  color: #4a5568;
  font-size: 0.95rem;
  line-height: 1.6;
  margin: 0 0 24px 0;
}

.cookie-categories {
  space-y: 16px;
}

.cookie-category {
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  padding: 16px;
  margin-bottom: 16px;
  transition: border-color 0.2s ease;
}

.cookie-category:hover {
  border-color: #9935dc;
}

.category-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 16px;
}

.category-info {
  flex: 1;
}

.category-info h5 {
  margin: 0 0 4px 0;
  color: #2d3748;
  font-size: 1rem;
  font-weight: 600;
}

.category-info p {
  margin: 0;
  color: #6b7280;
  font-size: 0.875rem;
  line-height: 1.5;
}

.category-toggle {
  flex-shrink: 0;
}

/* ===== TOGGLE SWITCH ===== */
.toggle-switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
  cursor: pointer;
}

.toggle-switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #cbd5e0;
  transition: 0.3s;
  border-radius: 24px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: 0.3s;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

input:checked + .slider {
  background-color: #9935dc;
}

input:checked + .slider:before {
  transform: translateX(26px);
}

input:disabled + .slider {
  background-color: #9935dc;
  opacity: 0.6;
  cursor: not-allowed;
}

/* ===== MODAL FOOTER ===== */
.cookie-modal-footer {
  padding: 24px;
  border-top: 1px solid #e2e8f0;
  display: flex;
  gap: 12px;
  justify-content: flex-end;
}

.btn-save {
  background: #f7fafc;
  color: #4a5568;
  border: 1px solid #e2e8f0;
}

.btn-save:hover {
  background: #edf2f7;
  border-color: #9935dc;
  color: #9935dc;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (max-width: 768px) {
  .cookie-banner {
    padding: 16px;
  }

  .cookie-content {
    flex-direction: column;
    gap: 16px;
    text-align: center;
  }

  .cookie-icon {
    font-size: 2rem;
  }

  .cookie-actions {
    flex-direction: column;
    width: 100%;
  }

  .cookie-actions .btn {
    width: 100%;
    justify-content: center;
  }

  .cookie-modal {
    padding: 12px;
  }

  .cookie-modal-content {
    max-height: 90vh;
  }

  .cookie-modal-header,
  .cookie-modal-body,
  .cookie-modal-footer {
    padding-left: 16px;
    padding-right: 16px;
  }

  .category-header {
    flex-direction: column;
    gap: 12px;
  }

  .cookie-modal-footer {
    flex-direction: column;
  }

  .cookie-modal-footer .btn {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .cookie-text h4 {
    font-size: 1.1rem;
  }

  .cookie-text p {
    font-size: 0.9rem;
  }

  .cookie-actions .btn {
    padding: 12px 16px;
    font-size: 0.85rem;
  }
}

/* ===== FLOATING COOKIE BUTTON ===== */
.cookie-floating-btn {
  position: fixed;
  bottom: 20px;
  left: 20px;
  z-index: 9998;
  opacity: 0.8;
  transition: opacity 0.3s ease;
}

.cookie-floating-btn:hover {
  opacity: 1;
}

.cookie-floating-btn button {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #9935dc;
  color: white;
  border: none;
  font-size: 1.2rem;
  cursor: pointer;
  box-shadow: 0 4px 12px rgba(153, 53, 220, 0.4);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.cookie-floating-btn button:hover {
  background: #8024c0;
  transform: scale(1.05);
  box-shadow: 0 6px 16px rgba(153, 53, 220, 0.5);
}

@media (max-width: 768px) {
  .cookie-floating-btn {
    bottom: 80px;
    right: 20px;
    left: auto;
  }

  .cookie-floating-btn button {
    width: 45px;
    height: 45px;
    font-size: 1.1rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cookie Management System
    const CookieManager = {
        // Cookie names
        CONSENT_COOKIE: 'bikes_fazenda_consent',
        PREFERENCES_COOKIE: 'bikes_fazenda_preferences',
        
        // Default preferences
        defaultPreferences: {
            essential: true,
            analytics: false,
            marketing: false,
            functional: false
        },

        // Check if user has already consented
        hasConsented: function() {
            return this.getCookie(this.CONSENT_COOKIE) !== null;
        },

        // Get cookie value
        getCookie: function(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return null;
        },

        // Set cookie
        setCookie: function(name, value, days = 365) {
            const expires = new Date();
            expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
        },

        // Get user preferences
        getPreferences: function() {
            const saved = this.getCookie(this.PREFERENCES_COOKIE);
            if (saved) {
                try {
                    return JSON.parse(saved);
                } catch (e) {
                    return this.defaultPreferences;
                }
            }
            return this.defaultPreferences;
        },

        // Save preferences
        savePreferences: function(preferences) {
            this.setCookie(this.PREFERENCES_COOKIE, JSON.stringify(preferences));
            this.setCookie(this.CONSENT_COOKIE, 'true');
            this.applyPreferences(preferences);
        },

        // Apply preferences (load scripts, etc.)
        applyPreferences: function(preferences) {
            // Google Analytics
            if (preferences.analytics) {
                this.loadGoogleAnalytics();
            }

            // Marketing scripts
            if (preferences.marketing) {
                this.loadMarketingScripts();
            }

            // Functional scripts
            if (preferences.functional) {
                this.loadFunctionalScripts();
            }

            console.log('Cookie preferences applied:', preferences);
        },

        // Load Google Analytics
        loadGoogleAnalytics: function() {
            // Add your GA tracking ID here
            const GA_ID = 'GA_MEASUREMENT_ID'; // Replace with your actual GA ID
            
            if (!window.gtag && GA_ID !== 'GA_MEASUREMENT_ID') {
                const script = document.createElement('script');
                script.async = true;
                script.src = `https://www.googletagmanager.com/gtag/js?id=${GA_ID}`;
                document.head.appendChild(script);

                script.onload = function() {
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    window.gtag = gtag;
                    gtag('js', new Date());
                    gtag('config', GA_ID);
                };
            }
        },

        // Load marketing scripts
        loadMarketingScripts: function() {
            // Add Facebook Pixel, Google Ads, etc.
            console.log('Marketing scripts loaded');
        },

        // Load functional scripts
        loadFunctionalScripts: function() {
            // Add chat widgets, etc.
            console.log('Functional scripts loaded');
        },

        // Show banner
        showBanner: function() {
            const banner = document.getElementById('cookieBanner');
            const floatingBtn = document.getElementById('cookieFloatingBtn');
            if (banner) {
                banner.style.display = 'block';
            }
            if (floatingBtn) {
                floatingBtn.style.display = 'none';
            }
        },

        // Hide banner
        hideBanner: function() {
            const banner = document.getElementById('cookieBanner');
            const floatingBtn = document.getElementById('cookieFloatingBtn');
            if (banner) {
                banner.style.display = 'none';
            }
            if (floatingBtn) {
                floatingBtn.style.display = 'block';
            }
        },

        // Show modal
        showModal: function() {
            const modal = document.getElementById('cookieModal');
            if (modal) {
                modal.style.display = 'flex';
                this.loadPreferencesInModal();
            }
        },

        // Hide modal
        hideModal: function() {
            const modal = document.getElementById('cookieModal');
            if (modal) {
                modal.style.display = 'none';
            }
        },

        // Load preferences in modal
        loadPreferencesInModal: function() {
            const preferences = this.getPreferences();
            
            document.getElementById('essentialCookies').checked = preferences.essential;
            document.getElementById('analyticsCookies').checked = preferences.analytics;
            document.getElementById('marketingCookies').checked = preferences.marketing;
            document.getElementById('functionalCookies').checked = preferences.functional;
        },

        // Get preferences from modal
        getPreferencesFromModal: function() {
            return {
                essential: document.getElementById('essentialCookies').checked,
                analytics: document.getElementById('analyticsCookies').checked,
                marketing: document.getElementById('marketingCookies').checked,
                functional: document.getElementById('functionalCookies').checked
            };
        },

        // Accept all cookies
        acceptAll: function() {
            const allPreferences = {
                essential: true,
                analytics: true,
                marketing: true,
                functional: true
            };
            this.savePreferences(allPreferences);
            this.hideBanner();
            this.hideModal();
        },

        // Reject all cookies (except essential)
        rejectAll: function() {
            this.savePreferences(this.defaultPreferences);
            this.hideBanner();
            this.hideModal();
        },

        // Save custom preferences
        saveCustomPreferences: function() {
            const preferences = this.getPreferencesFromModal();
            this.savePreferences(preferences);
            this.hideModal();
            this.hideBanner();
        },

        // Initialize
        init: function() {
            // Show banner if user hasn't consented
            if (!this.hasConsented()) {
                setTimeout(() => this.showBanner(), 1000);
            } else {
                // Apply saved preferences
                this.applyPreferences(this.getPreferences());
                // Show floating button
                const floatingBtn = document.getElementById('cookieFloatingBtn');
                if (floatingBtn) {
                    floatingBtn.style.display = 'block';
                }
            }

            // Event listeners
            this.setupEventListeners();
        },

        // Setup event listeners
        setupEventListeners: function() {
            // Banner buttons
            const acceptAllBtn = document.getElementById('acceptAllCookies');
            const manageCookiesBtn = document.getElementById('manageCookies');
            const rejectAllBtn = document.getElementById('rejectAllCookies');

            if (acceptAllBtn) {
                acceptAllBtn.addEventListener('click', () => this.acceptAll());
            }

            if (manageCookiesBtn) {
                manageCookiesBtn.addEventListener('click', () => this.showModal());
            }

            if (rejectAllBtn) {
                rejectAllBtn.addEventListener('click', () => this.rejectAll());
            }

            // Modal buttons
            const savePreferencesBtn = document.getElementById('savePreferences');
            const acceptAllModalBtn = document.getElementById('acceptAllModal');
            const closeModalBtn = document.getElementById('closeCookieModal');

            if (savePreferencesBtn) {
                savePreferencesBtn.addEventListener('click', () => this.saveCustomPreferences());
            }

            if (acceptAllModalBtn) {
                acceptAllModalBtn.addEventListener('click', () => this.acceptAll());
            }

            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', () => this.hideModal());
            }

            // Click outside modal to close
            const modal = document.getElementById('cookieModal');
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        this.hideModal();
                    }
                });
            }
        }
    };

    // Initialize Cookie Manager
    CookieManager.init();

    // Global function to manage cookies (can be called from anywhere)
    window.manageCookies = function() {
        CookieManager.showModal();
    };

    // Global function to check if specific cookie type is allowed
    window.isCookieAllowed = function(type) {
        const preferences = CookieManager.getPreferences();
        return preferences[type] || false;
    };
});
</script> 