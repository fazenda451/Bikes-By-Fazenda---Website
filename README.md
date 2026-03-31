<div align="center">

<img src="https://img.shields.io/badge/STATUS-ACADEMIC%20PROJECT-blueviolet?style=for-the-badge" alt="Academic Project" />

# 🏍️ Bikes By Fazenda

### Full-Stack E-Commerce Platform for Motorcycle Enthusiasts

A fully functional, end-to-end e-commerce web application built with **Laravel 11**, designed for browsing, purchasing, and managing motorcycles and accessories in the Portuguese market.

<p>
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11" />
  <img src="https://img.shields.io/badge/PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+" />
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS" />
  <img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine.js" />
  <img src="https://img.shields.io/badge/Stripe-626CD9?style=for-the-badge&logo=Stripe&logoColor=white" alt="Stripe" />
  <img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite" />
</p>

<p>
  <img src="https://img.shields.io/badge/license-MIT-green?style=flat-square" />
  <img src="https://img.shields.io/badge/Laravel-11.x-red?style=flat-square" />
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square" />
</p>

</div>

---

## 📖 About

**Bikes By Fazenda** is an academic e-commerce project developed as a final coursework submission. The platform covers the full lifecycle of an online store — from product browsing and cart management to payment processing and order tracking — with a dedicated admin panel for back-office operations.

> ⚠️ This is an academic project and is not actively maintained. It was built as a learning exercise and portfolio piece.

---

## ✨ Features

### 🛒 Customer Side
- **Product Catalog** — Advanced filtering and browsing for motorcycles (with deep technical specs) and accessories
- **Shopping Cart & Checkout** — Seamless add-to-cart flow for both products and motorcycles
- **Secure Payments** — Full Stripe API integration for safe, real-world transactions
- **Wishlist** — Save favourite motorcycles and products for later
- **Loyalty Points** — Earn and redeem reward points on purchases
- **User Dashboard** — Profile management, order history, and points overview
- **Authentication** — Registration, login, password reset, and email verification via Laravel Breeze

### 🛡️ Admin Panel
- **Dashboard & Analytics** — Interactive charts and reporting via Chart.js
- **Inventory Management** — Full CRUD for products, motorcycles, categories, and brands
- **Deep Motorcycle Specs** — Manage engine, transmission, suspension, mechanics, and required licence details
- **Order Management** — Track and update order and shipping statuses in real time
- **PDF Invoices** — Auto-generated invoices and sales reports via `barryvdh/laravel-dompdf`
- **Review Moderation** — Approve and manage customer ratings and reviews
- **Notification System** — Automated email alerts and UI popups via PHP Flasher / Toastr

---

## 🧰 Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 11 (PHP 8.2+) |
| Database | MySQL 8.0+ |
| Authentication | Laravel Breeze |
| Frontend Styling | Tailwind CSS 3 |
| Frontend Interactivity | Alpine.js + Vanilla JS |
| Templating | Blade Templates |
| Asset Bundling | Vite |
| Charting | Chart.js |
| PDF Generation | barryvdh/laravel-dompdf |
| Payments | Stripe PHP SDK |
| Notifications | PHP Flasher |

---

## 🚀 Local Setup

### Prerequisites

- PHP 8.2+ with extensions: `OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo, GD`
- Composer
- Node.js v18+ & NPM
- MySQL 8.0+
- A [Stripe](https://stripe.com) account for payment testing

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/fazenda451/Bikes-By-Fazenda---Website.git
cd Bikes-By-Fazenda---Website

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Set up environment
cp .env.example .env
```

Edit `.env` with your local credentials:

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

```bash
# 5. Generate application key
php artisan key:generate

# 6. Run migrations (30+ relational migrations)
php artisan migrate

# 7. Build frontend assets
npm run build

# 8. Start development server
php artisan serve
```

The app will be available at **http://localhost:8000**.

> 💡 Windows users can also use the included `!!!start-server.bat` for automated startup.

---

## 🔐 Security Highlights

- **CSRF Protection** active across all form endpoints
- **Eloquent ORM** used throughout to prevent SQL injection
- **Bcrypt** password hashing with secure session handling
- **Environment Variables** — sensitive keys excluded via `.gitignore`
- **Input Validation** on all user-submitted data

---

## 📁 Project Structure (simplified)

```
bikes-by-fazenda/
├── app/
│   ├── Http/Controllers/     # Application controllers
│   ├── Models/               # Eloquent models
│   └── Policies/             # Authorization policies
├── database/
│   ├── migrations/           # 30+ schema migrations
│   └── seeders/
├── resources/
│   ├── views/                # Blade templates
│   └── js/                   # Alpine.js & frontend logic
├── routes/
│   ├── web.php
│   └── api.php
└── public/
```

---

## 📄 License

Distributed under the **MIT License**. See [`LICENSE`](LICENSE) for more information.

---

<div align="center">
  <sub>Built with ❤️ as an academic project · Laravel 11 · PHP 8.2+</sub>
</div>
