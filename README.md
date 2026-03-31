<div align="center">
  <h1>🏍️ Bikes By Fazenda - E-Commerce Platform</h1>
  <p>A comprehensive motorcycle and accessories e-commerce web application built with Laravel 11.</p>

  <!-- Badges -->
  <p>
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11" />
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+" />
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS" />
    <img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine.js" />
    <img src="https://img.shields.io/badge/Stripe-626CD9?style=for-the-badge&logo=Stripe&logoColor=white" alt="Stripe" />
  </p>
</div>

<br/>

## 📖 About the Project

**Bikes By Fazenda** is a fully functional, end-to-end e-commerce platform specifically designed for motorcycle enthusiasts in Portugal. The application provides a seamless shopping experience, allowing users to browse a deeply detailed catalog of motorcycles and related products, manage their carts, securely process payments, and track their orders.

## ✨ Key Features

### 🛒 For Customers
- **Extensive Catalogs:** Advanced browsing and filtering for motorcycles (with deep technical specs) and accessories.
- **Shopping Cart & Checkout:** Seamless product and motorcycle cart additions.
- **Secure Payments:** Full integration with the Stripe API for safe transactions.
- **Wishlist Management:** Save favorite motorcycles and products for future purchases.
- **Loyalty Program:** Earn and spend reward points during purchases.
- **User Dashboard:** Comprehensive profile, order history, and point management.
- **Authentication:** Registration, login, password reset, and rigorous email verification.

### 🛡️ For Administrators
- **Comprehensive Dashboard:** Interactive reporting and analytics via Chart.js.
- **Inventory Management:** Full CRUD capabilities for Products, Motorcycles, Categories, and Brands.
- **Deep Motorcycle Specs:** Manage precise technical details (engine, transmission, suspension, mechanics, required licenses).
- **Order Processing:** Track and dynamically update order/shipping statuses.
- **Invoice & Reporting:** Automatic generation of PDF invoices and detailed sales reports.
- **Review Moderation:** Oversee and manage customer product ratings and reviews.
- **Notification System:** Automated email alerts and interactive UI popups powered by Toastr/Flasher.

## 🧰 Tech Stack

### Backend
- **Framework:** Laravel 11 (PHP 8.2+)
- **Database:** MySQL 8.0+
- **Authentication:** Laravel Breeze
- **PDF Generation:** barryvdh/laravel-dompdf
- **Payment Gateway:** Stripe PHP SDK

### Frontend
- **Templating:** Blade Templates
- **Styling:** Tailwind CSS 3
- **Interactivity:** Alpine.js & Vanilla JavaScript
- **Charting:** Chart.js
- **Notifications:** PHP Flasher
- **Asset Bundling:** Vite

## 🚀 Getting Started

Follow these instructions to set up the project locally.

### Prerequisites
Make sure you have the following installed on your machine:
- **PHP 8.2+** (with OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo, GD extensions)
- **Composer**
- **Node.js (v18+) & NPM**
- **MySQL 8.0+**
- **Stripe Account** (for local payment processing)

### Installation Guide

1. **Clone the repository**
   ```bash
   git clone https://github.com/fazenda451/Bikes-By-Fazenda---Website.git
   cd Bikes-By-Fazenda---Website
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install NPM dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   ```
   Open the `.env` file and configure your local database credentials, Stripe keys, and Mail configurations:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bikes_fazenda
   DB_USERNAME=root
   DB_PASSWORD=

   STRIPE_KEY=your_stripe_public_key
   STRIPE_SECRET=your_stripe_secret_key
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**
   *(Note: This project contains over 30 complex migrations defining relational data).*
   ```bash
   php artisan migrate
   ```

7. **Compile Frontend Assets**
   ```bash
   npm run build
   ```
   *(For development with Hot Module Replacement, you can use `npm run dev`)*

8. **Start the Development Server**
   ```bash
   php artisan serve
   ```
   
   The application will be accessible at `http://localhost:8000`. You can also use the included Windows batch files (`!!!start-server.bat`) for immediate automated bootup.

## 🔐 Security & Best Practices
- **Data Protection:** Form inputs are strictly validated. CSRF protection is active across all endpoints.
- **SQL Injection Prevention:** Eloquent ORM is heavily utilized to safely parameterize database queries.
- **Authentication:** Secure password hashing (Bcrypt) and modern session handling.
- **Environment Variables:** Sensitive keys and credentials are safely excluded via `.gitignore` to prevent exposure.

## 🤝 Contributing
Contributions are what make the open-source community an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License
Distributed under the MIT License. See the `LICENSE` file for more information (if included).

## 📬 Contact & Support
**Bikes By Fazenda**
- 📧 Email: [website@bikesbyfazenda.pt](mailto:website@bikesbyfazenda.pt)
- 🌐 Website: [www.bikesbyfazenda.pt](https://www.bikesbyfazenda.pt)
- 💻 GitHub: [fazenda451/Bikes-By-Fazenda---Website](https://github.com/fazenda451/Bikes-By-Fazenda---Website)

---
*Built with ❤️ in Portugal.*
