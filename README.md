<div align="center">
  <!-- If you have a banner or logo, feel free to uncomment and use the line below! -->
  <!-- <img src="public/images/logo.png" alt="Bikes By Fazenda Logo" height="120" /> -->

  # 🏍️ Bikes By Fazenda
  
  <p><b>Full-Stack E-Commerce Platform for Motorcycle Enthusiasts</b></p>
  
  <p>A fully functional, end-to-end e-commerce web application built with <strong>Laravel 11</strong>, designed for browsing, purchasing, and managing motorcycles and accessories in the Portuguese market.</p>

  <br>

  <p>
    <img src="https://img.shields.io/badge/STATUS-ACADEMIC%20PROJECT-blueviolet?style=for-the-badge" alt="Academic Project" />
    <img src="https://img.shields.io/badge/LICENSE-MIT-10B981?style=for-the-badge" alt="MIT License" />
  </p>

  <p>
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
    <img src="https://img.shields.io/badge/PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
    <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind" />
    <img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine" />
    <img src="https://img.shields.io/badge/Stripe-626CD9?style=for-the-badge&logo=Stripe&logoColor=white" alt="Stripe" />
    <img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite" />
  </p>
  
</div>

---

## 📖 About

**Bikes By Fazenda** is an academic e-commerce project developed as a final coursework submission. The platform covers the full lifecycle of an online store — from product browsing and cart management to payment processing and order tracking — with a dedicated admin panel for back-office operations.

> **Note:** This is an academic project and is not actively maintained. It was built as a learning exercise and portfolio piece.

---

## ✨ Features

### 🛒 Customer Experience
- **Product Catalog** — Advanced filtering and browsing for motorcycles (with deep technical specs) and accessories.
- **Shopping Cart & Checkout** — Seamless add-to-cart flow for both products and motorcycles.
- **Secure Payments** — Full Stripe API integration for safe, real-world transactions.
- **Wishlist** — Save favourite motorcycles and products for later.
- **Loyalty Points** — Earn and redeem reward points on purchases.
- **User Dashboard** — Profile management, order history, and points overview.
- **Authentication** — Registration, login, password reset, and email verification via Laravel Breeze.

### 🛡️ Admin Dashboard
- **Analytics** — Interactive charts and reporting via Chart.js.
- **Inventory Management** — Full CRUD for products, motorcycles, categories, and brands.
- **Deep Motorcycle Specs** — Manage engine, transmission, suspension, mechanics, and required license details.
- **Order Management** — Track and update order and shipping statuses in real-time.
- **PDF Invoices** — Auto-generated invoices and sales reports via `barryvdh/laravel-dompdf`.
- **Review Moderation** — Approve and manage customer ratings and reviews.
- **Notification System** — Automated email alerts and UI popups via PHP Flasher / Toastr.

---

## 🧰 Tech Stack

| Component | Technology |
|---|---|
| **Framework** | Laravel 11 (PHP 8.2+) |
| **Database** | MySQL 8.0+ |
| **Authentication** | Laravel Breeze |
| **Styling** | Tailwind CSS 3 |
| **Interactivity** | Alpine.js & Vanilla JS |
| **Templating** | Blade Templates |
| **Asset Bundling** | Vite |
| **Charting** | Chart.js |
| **PDF Generation** | `barryvdh/laravel-dompdf` |
| **Payments** | Stripe PHP SDK |
| **Notifications** | PHP Flasher |

---

## 🚀 Local Setup

### Prerequisites

Ensure your system meets the following requirements:
- **PHP 8.2+** with extensions: `OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo, GD`
- **Composer**
- **Node.js v18+ & NPM**
- **MySQL 8.0+**
- A [Stripe](https://stripe.com) account for payment testing

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/fazenda451/Bikes-By-Fazenda---Website.git
   cd Bikes-By-Fazenda---Website
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Set up environment**
   ```bash
   cp .env.example .env
   ```
   Edit the `.env` file with your local credentials:
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

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Run migrations**
   *(Note: This project contains over 30 complex migrations defining relational data).*
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets**
   ```bash
   npm run build
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

The app will be available at [`http://localhost:8000`](http://localhost:8000).

> 💡 **Tip:** Windows users can also use the included `!!!start-server.bat` for automated startup.

---

## 🔐 Security Highlights

- **CSRF Protection:** Active across all form endpoints.
- **SQL Injection Prevention:** Eloquent ORM used throughout to prevent direct queries.
- **Secure Authentication:** Bcrypt password hashing with secure session handling.
- **Environment Variables:** Sensitive keys excluded via `.gitignore`.
- **Input Validation:** Strict rules applied to all user-submitted data via FormRequests.

---

## 📁 Project Structure (Overview)

```text
bikes-by-fazenda/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/               # Eloquent models
│   └── Policies/             # Authorization policies
├── database/
│   ├── migrations/           # 30+ schema migrations
│   └── seeders/              # Database seeders for test data
├── resources/
│   ├── views/                # Blade templates
│   └── js/                   # Alpine.js & frontend logic
├── routes/
│   ├── web.php               # Web platform routes
│   └── api.php               # API endpoints
└── public/                   # Publicly accessible assets (images, css, js)
```

---

## 📄 License

Distributed under the **MIT License**. See [`LICENSE`](LICENSE) for more information.

---

<div align="center">
  <sub>Built with ❤️ as an academic project • Laravel 11 • PHP 8.2+</sub>
</div>
