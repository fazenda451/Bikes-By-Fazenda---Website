<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style type="text/css">
    /* Reset and Base */
    .product-details {
      background-color: #ffffff;
      padding: 40px 0;
      min-height: 100vh;
    }

    .product-container {
      max-width: 1200px;
      margin: 0 auto;
      background: #ffffff;
      padding: 0;
    }

    /* Product Header */
    .product-header {
      border-bottom: 1px solid #e5e5e5;
      padding-bottom: 20px;
      margin-bottom: 40px;
    }

    .product-title {
      font-size: 1.75rem;
      font-weight: 600;
      color: #111;
      margin-bottom: 8px;
      line-height: 1.3;
    }

    .product-ref {
      font-size: 0.875rem;
      color: #757575;
      margin-bottom: 0;
    }

    /* Product Image */
    .product-image-container {
      position: relative;
      background: #f7f7f7;
      border-radius: 8px;
      padding: 40px;
      margin-bottom: 0;
      min-height: 500px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .product-image {
      width: 100%;
      height: auto;
      max-height: 420px;
      object-fit: contain;
    }

    /* Pricing Section */
    .pricing-section {
      margin-bottom: 24px;
    }

    .price-main {
      font-size: 1.5rem;
      font-weight: 600;
      color: #111;
      margin-bottom: 4px;
    }

    .price-discount {
      background: #ff4444;
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 16px;
      font-size: 0.875rem;
      font-weight: 600;
    }

    .price-discount .discount-icon {
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
    }

    .price-original {
      color: #757575;
      text-decoration: line-through;
      font-size: 1.125rem;
      margin-right: 12px;
    }

    .price-current {
      color: #111;
      font-size: 1.5rem;
      font-weight: 600;
    }

    .price-save {
      color: #16a34a;
      font-size: 0.875rem;
      font-weight: 500;
      margin-top: 4px;
    }

    .price-tax {
      color: #757575;
      font-size: 0.875rem;
      margin-top: 8px;
    }

    /* Rating Section */
    .rating-section {
      margin-bottom: 24px;
      padding-bottom: 24px;
      border-bottom: 1px solid #e5e5e5;
    }

    .rating-container {
      display: flex;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
    }

    .rating-circle {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(135deg, #9935dc 0%, #8024c0 100%);
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
    }

    .rating-value {
      font-size: 1.25rem;
      line-height: 1;
    }

    .rating-label {
      font-size: 0.625rem;
      opacity: 0.8;
    }

    .rating-stars {
      display: flex;
      align-items: center;
      gap: 2px;
    }

    .rating-stars i {
      color: #ffc107;
      font-size: 1.125rem;
    }

    .rating-count {
      color: #757575;
      font-size: 0.875rem;
      margin-left: 8px;
    }

    /* Availability Section */
    .availability-section {
      margin-bottom: 24px;
    }

    .availability-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 16px;
      background: #f0fdf4;
      border: 1px solid #22c55e;
      border-radius: 6px;
      color: #15803d;
      font-size: 0.875rem;
      font-weight: 500;
    }

    .availability-badge.out-of-stock {
      background: #fef2f2;
      border-color: #ef4444;
      color: #7f1d1d;
    }

    /* Product Options */
    .product-options {
      margin-bottom: 32px;
    }

    .option-group {
      margin-bottom: 24px;
    }

    .option-label {
      font-size: 0.875rem;
      font-weight: 600;
      color: #111;
      margin-bottom: 12px;
      display: block;
    }

    /* Size Options */
    .size-options {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 16px;
    }

    .size-option {
      display: none;
    }

    .size-label {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 44px;
      height: 44px;
      padding: 0 12px;
      background: #ffffff;
      border: 1px solid #e5e5e5;
      border-radius: 6px;
      color: #111;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .size-option:checked + .size-label {
      background: #9935dc;
      border-color: #9935dc;
      color: white;
    }

    .size-label:hover {
      border-color: #9935dc;
    }

    .size-guide-link {
      color: #757575;
      font-size: 0.875rem;
      text-decoration: underline;
      cursor: pointer;
      margin-top: 8px;
      display: inline-block;
    }

    .size-guide-link:hover {
      color: #111;
    }

    /* Quantity Selector */
    .quantity-group {
      margin-bottom: 32px;
    }

    .quantity-selector {
      display: flex;
      align-items: center;
      border: 1px solid #e5e5e5;
      border-radius: 6px;
      width: fit-content;
      background: white;
    }

    .quantity-btn {
      background: none;
      border: none;
      color: #757575;
      width: 44px;
      height: 44px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      transition: color 0.2s ease;
    }

    .quantity-btn:hover {
      color: #9935dc;
    }

    .quantity-btn:disabled {
      color: #d1d5db;
      cursor: not-allowed;
    }

    .quantity-input {
      width: 60px;
      height: 44px;
      border: none;
      border-left: 1px solid #e5e5e5;
      border-right: 1px solid #e5e5e5;
      text-align: center;
      font-weight: 500;
      color: #111;
    }

    .quantity-input:focus {
      outline: none;
    }

    /* Action Buttons */
    .action-buttons {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .btn-add-cart {
      width: 100%;
      background: #9935dc;
      color: white;
      padding: 16px 24px;
      border: none;
      border-radius: 6px;
      font-size: 0.9375rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      text-transform: none;
      letter-spacing: 0;
      box-shadow: 0 4px 15px rgba(153, 53, 220, 0.3);
    }

    .btn-add-cart:hover {
      background: #8024c0;
      text-decoration: none;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(153, 53, 220, 0.4);
    }

    .btn-add-cart:disabled {
      background: #e5e7eb;
      color: #9ca3af;
      cursor: not-allowed;
    }

    .btn-wishlist {
      width: 100%;
      background: white;
      color: #111;
      padding: 16px 24px;
      border: 1px solid #e5e5e5;
      border-radius: 6px;
      font-size: 0.9375rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      text-decoration: none;
    }

    .btn-wishlist:hover {
      background: #f9fafb;
      border-color: #9935dc;
      text-decoration: none;
      color: #9935dc;
    }

    /* Product Features */
    .product-features {
      margin-top: 48px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 16px;
    }

    .feature-item {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 20px;
      background: #f9fafb;
      border-radius: 8px;
      border: 1px solid #f3f4f6;
    }

    .feature-icon {
      width: 40px;
      height: 40px;
      background: #9935dc;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.125rem;
      flex-shrink: 0;
      box-shadow: 0 3px 10px rgba(153, 53, 220, 0.3);
    }

    .feature-text {
      color: #111;
      font-size: 0.875rem;
      line-height: 1.5;
    }

    .feature-text strong {
      font-weight: 600;
      display: block;
      margin-bottom: 2px;
    }

    /* Product Tabs */
    .product-tabs {
      margin-top: 48px;
      border-top: 1px solid #e5e5e5;
      padding-top: 48px;
    }

    .nav-tabs {
      border: none;
      border-bottom: 1px solid #e5e5e5;
      margin-bottom: 32px;
    }

    .nav-tabs .nav-link {
      border: none;
      border-bottom: 2px solid transparent;
      color: #757575;
      font-weight: 500;
      padding: 12px 0;
      margin-right: 40px;
      background: none;
      border-radius: 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-tabs .nav-link:hover {
      border-color: #9935dc;
      color: #9935dc;
    }

    .nav-tabs .nav-link.active {
      color: #9935dc;
      border-color: #9935dc;
    }

    .tab-content {
      color: #111;
      line-height: 1.6;
    }

    .description-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 16px;
    }

    .product-description {
      font-size: 0.9375rem;
      line-height: 1.6;
      color: #374151;
    }

    .product-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      margin-top: 24px;
      padding-top: 24px;
      border-top: 1px solid #e5e5e5;
    }

    .meta-item {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .meta-label {
      font-size: 0.75rem;
      color: #757575;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      font-weight: 500;
    }

    .meta-value {
      font-size: 0.875rem;
      font-weight: 500;
      color: #111;
    }

    /* Reviews Section */
    .product-rating-form {
      background: #f9fafb;
      border-radius: 8px;
      padding: 24px;
      margin-bottom: 32px;
      border: 1px solid #e5e7eb;
    }

    .star-rating-input-animated {
      display: flex;
      flex-direction: row-reverse;
      gap: 4px;
      margin-bottom: 16px;
    }

    .star-rating-input-animated input {
      display: none;
    }

    .star-rating-input-animated label {
      font-size: 1.5rem;
      color: #d1d5db;
      cursor: pointer;
      transition: color 0.2s ease;
    }

    .star-rating-input-animated label:hover,
    .star-rating-input-animated label:hover ~ label {
      color: #fbbf24;
    }

    .star-rating-input-animated input:checked ~ label {
      color: #fbbf24;
    }

    .avatar-circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, #9935dc 0%, #8024c0 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.875rem;
      font-weight: 600;
      flex-shrink: 0;
      box-shadow: 0 2px 8px rgba(153, 53, 220, 0.2);
    }

    .card {
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      background: white;
    }

    .card-body {
      padding: 16px;
    }

    /* Form Elements */
    .form-control {
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      padding: 12px 16px;
      font-size: 0.875rem;
      transition: border-color 0.2s ease;
    }

    .form-control:focus {
      border-color: #9935dc;
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(153, 53, 220, 0.25);
    }

    .btn-purple {
      background: #9935dc;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 6px;
      font-size: 0.875rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 3px 10px rgba(153, 53, 220, 0.3);
    }

    .btn-purple:hover {
      background: #8024c0;
      color: white;
      text-decoration: none;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(153, 53, 220, 0.4);
    }

    /* Loading Overlay */
    .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s, visibility 0.3s;
    }
    
    .loading-overlay.active {
      opacity: 1;
      visibility: visible;
    }
    
    .loading-image {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .product-container {
        padding: 0 16px;
      }

      .product-title {
        font-size: 1.5rem;
      }

      .rating-container {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
      }

      .price-main, .price-current {
        font-size: 1.25rem;
      }

      .product-image-container {
        min-height: 300px;
        padding: 20px;
      }

      .product-image {
        max-height: 260px;
      }

      .size-options {
        gap: 6px;
      }

      .size-label {
        min-width: 40px;
        height: 40px;
        font-size: 0.875rem;
      }

      .nav-tabs .nav-link {
        margin-right: 24px;
        font-size: 0.875rem;
      }

      .product-features {
        grid-template-columns: 1fr;
        gap: 12px;
      }

      .feature-item {
        padding: 16px;
      }
    }

    @media (max-width: 480px) {
      .product-container {
        padding: 0 12px;
      }

      .product-header {
        padding-bottom: 16px;
        margin-bottom: 24px;
      }

      .product-title {
        font-size: 1.375rem;
      }

      .pricing-section, .rating-section, .availability-section {
        margin-bottom: 20px;
      }

      .nav-tabs .nav-link {
        margin-right: 16px;
        padding: 8px 0;
      }
    }
    }

    /* Alert Styles */
    .alert {
      border-radius: 8px;
      border: 1px solid transparent;
      padding: 16px;
      margin-bottom: 24px;
      font-size: 0.875rem;
    }

    .alert-success {
      background-color: #f0fdf4;
      border-color: #bbf7d0;
      color: #166534;
    }

    .alert-dismissible .btn-close {
      position: absolute;
      top: 0;
      right: 0;
      padding: 1rem;
      background: transparent;
      border: 0;
      font-size: 1.25rem;
      cursor: pointer;
      color: inherit;
      opacity: 0.5;
    }

    .alert-dismissible .btn-close:hover {
      opacity: 1;
    }

    /* Modal Styles */
    .modal-header {
      border-bottom: 1px solid #e5e7eb;
      padding: 24px;
    }

    .modal-footer {
      border-top: 1px solid #e5e7eb;
      padding: 24px;
    }

    .modal-content {
      border: none;
      border-radius: 8px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .modal-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: #111;
    }

    .btn-close {
      background: none;
      border: none;
      font-size: 1.25rem;
      line-height: 1;
      color: #9ca3af;
      cursor: pointer;
      transition: opacity 0.2s ease;
    }

    .btn-close:hover {
      opacity: 0.75;
    }

    .table {
      border-collapse: collapse;
      width: 100%;
      font-size: 0.875rem;
    }

    .table th,
    .table td {
      padding: 12px;
      border: 1px solid #e5e7eb;
      text-align: left;
    }

    .table th {
      background-color: #f9fafb;
      font-weight: 600;
      color: #111;
    }

    .table-responsive {
      overflow-x: auto;
    }

    .btn-secondary {
      background: #6b7280;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 0.875rem;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .btn-secondary:hover {
      background: #4b5563;
      color: white;
      text-decoration: none;
    }

    /* Responsividade Mobile Completa Melhorada */
    @media (max-width: 768px) {
      /* Container mobile */
      .product-container {
        padding: 0 0.75rem;
      }

      /* Layout mobile stack */
      .row {
        flex-direction: column;
      }

      .col-md-6 {
        width: 100%;
        margin-bottom: 1.5rem;
      }

      /* Header mobile */
      .product-header {
        text-align: center;
        padding-bottom: 1rem;
        margin-bottom: 1.5rem;
      }

      .product-title {
        font-size: 1.5rem;
        line-height: 1.3;
      }

      .product-ref {
        font-size: 0.8rem;
      }

      /* Imagem mobile */
      .product-image-container {
        min-height: 350px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
      }

      .product-image {
        max-height: 320px;
      }

      /* Pricing mobile */
      .pricing-section {
        text-align: center;
        margin-bottom: 1.5rem;
      }

      .price-discount {
        justify-content: center;
        margin-bottom: 1rem;
      }

      .price-main,
      .price-current {
        font-size: 1.5rem;
      }

      .price-original {
        font-size: 1.1rem;
      }

      /* Rating mobile */
      .rating-container {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        text-align: center;
      }

      .rating-circle {
        width: 80px;
        height: 80px;
      }

      .rating-value {
        font-size: 1.5rem;
      }

      /* Availability mobile */
      .availability-section {
        text-align: center;
        margin-bottom: 1.5rem;
      }

      .availability-badge {
        display: inline-flex;
        padding: 10px 20px;
      }

      /* Form mobile */
      .product-options {
        margin-bottom: 2rem;
      }

      .option-label {
        text-align: center;
        font-size: 1rem;
        margin-bottom: 1rem;
      }

      /* Size options mobile */
      .size-options {
        justify-content: center;
        gap: 8px;
        margin-bottom: 1rem;
      }

      .size-label {
        min-width: 44px;
        height: 44px;
        font-size: 0.9rem;
        touch-action: manipulation;
      }

      .size-guide-link {
        text-align: center;
        display: block;
        font-size: 0.9rem;
        margin-top: 1rem;
      }

      /* Quantity mobile */
      .quantity-group {
        text-align: center;
        margin-bottom: 2rem;
      }

      .quantity-selector {
        margin: 0 auto;
      }

      .quantity-btn {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
        touch-action: manipulation;
      }

      .quantity-input {
        width: 80px;
        height: 50px;
        font-size: 1.1rem;
      }

      /* Action buttons mobile */
      .action-buttons {
        gap: 15px;
        margin-bottom: 2rem;
      }

      .btn-add-cart,
      .btn-wishlist {
        padding: 18px 24px;
        font-size: 1rem;
        border-radius: 8px;
        touch-action: manipulation;
        min-height: 56px;
      }

      .btn-add-cart {
        box-shadow: 0 4px 20px rgba(153, 53, 220, 0.4);
      }

      /* Tabs mobile */
      .product-tabs {
        margin-top: 2rem;
        padding-top: 2rem;
      }

      .nav-tabs {
        border: none;
        margin-bottom: 1.5rem;
        overflow-x: auto;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .nav-tabs .nav-link {
        margin-right: 20px;
        padding: 15px 0;
        font-size: 0.95rem;
        white-space: nowrap;
      }

      .nav-tabs .nav-link.active {
        border-bottom: 3px solid #9935dc;
      }

      /* Tab content mobile */
      .tab-content {
        padding: 0 0.5rem;
      }

      .description-title {
        font-size: 1.25rem;
        text-align: center;
        margin-bottom: 1.5rem;
      }

      .product-description {
        font-size: 1rem;
        line-height: 1.6;
        text-align: justify;
      }

      .product-meta {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
      }

      .meta-item {
        background: #f9fafb;
        padding: 1rem;
        border-radius: 8px;
      }

      /* Features mobile */
      .product-features {
        grid-template-columns: 1fr;
        gap: 15px;
        margin-top: 2rem;
      }

      .feature-item {
        padding: 1.5rem;
        text-align: center;
        flex-direction: column;
      }

      .feature-icon {
        margin-bottom: 1rem;
        width: 50px;
        height: 50px;
        font-size: 1.5rem;
      }

      .feature-text {
        text-align: center;
      }

      /* Reviews mobile */
      .product-rating-form {
        padding: 1.5rem;
        margin-bottom: 2rem;
      }

      .star-rating-input-animated {
        justify-content: center;
        margin-bottom: 1.5rem;
      }

      .star-rating-input-animated label {
        font-size: 2rem;
        margin: 0 5px;
      }

      .form-control {
        padding: 15px;
        font-size: 1rem;
        border-radius: 8px;
      }

      .btn-purple {
        width: 100%;
        padding: 15px;
        font-size: 1rem;
        border-radius: 8px;
      }

      .product-rating-list .row {
        flex-direction: column;
      }

      .product-rating-list .col-md-6,
      .product-rating-list .col-lg-4 {
        width: 100%;
        margin-bottom: 1rem;
      }

      .card {
        border-radius: 12px;
      }

      .card-body {
        padding: 1.5rem;
      }

      .avatar-circle {
        width: 50px;
        height: 50px;
        font-size: 1rem;
      }
    }

    @media (max-width: 576px) {
      /* Ajustes para telas muito pequenas */
      .product-container {
        padding: 0 0.5rem;
      }

      .product-title {
        font-size: 1.25rem;
      }

      .product-image-container {
        min-height: 280px;
        padding: 1rem;
      }

      .product-image {
        max-height: 250px;
      }

      .price-main,
      .price-current {
        font-size: 1.25rem;
      }

      .rating-circle {
        width: 70px;
        height: 70px;
      }

      .rating-value {
        font-size: 1.25rem;
      }

      .size-label {
        min-width: 40px;
        height: 40px;
        font-size: 0.85rem;
      }

      .quantity-btn {
        width: 44px;
        height: 44px;
        font-size: 1rem;
      }

      .quantity-input {
        width: 70px;
        height: 44px;
        font-size: 1rem;
      }

      .btn-add-cart,
      .btn-wishlist {
        padding: 15px 20px;
        font-size: 0.95rem;
        min-height: 50px;
      }

      .nav-tabs .nav-link {
        margin-right: 15px;
        font-size: 0.9rem;
        padding: 12px 0;
      }

      .description-title {
        font-size: 1.1rem;
      }

      .product-description {
        font-size: 0.95rem;
      }

      .feature-item {
        padding: 1rem;
      }

      .feature-icon {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
      }

      .product-rating-form {
        padding: 1rem;
      }

      .star-rating-input-animated label {
        font-size: 1.75rem;
      }

      .btn-purple {
        padding: 12px;
        font-size: 0.95rem;
      }

      .avatar-circle {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
      }
    }

    /* Modal mobile */
    @media (max-width: 768px) {
      .modal-dialog {
        margin: 1rem;
        max-width: calc(100% - 2rem);
      }

      .modal-header,
      .modal-footer {
        padding: 1.5rem;
      }

      .modal-body {
        padding: 1.5rem;
      }

      .table-responsive {
        font-size: 0.85rem;
      }

      .table th,
      .table td {
        padding: 8px;
      }
    }

    /* Touch device optimizations */
    @media (hover: none) {
      .size-label:hover,
      .btn-add-cart:hover,
      .btn-wishlist:hover,
      .btn-purple:hover {
        transform: none;
        box-shadow: inherit;
      }

      .quantity-btn:hover {
        color: #9935dc;
      }

      .nav-tabs .nav-link:hover {
        border-color: transparent;
        color: #757575;
      }

      .nav-tabs .nav-link.active:hover {
        color: #9935dc;
        border-color: #9935dc;
      }
    }

    /* Melhorias para orientação landscape em tablets */
    @media (max-width: 1024px) and (orientation: landscape) {
      .row {
        flex-direction: row;
      }

      .col-md-6 {
        width: 50%;
      }

      .product-features {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    /* Acessibilidade melhorada */
    @media (prefers-reduced-motion: reduce) {
      .btn-add-cart:hover,
      .btn-wishlist:hover,
      .btn-purple:hover,
      .quantity-btn:hover,
      .size-label:hover {
        transition: none;
        transform: none;
      }
    }

    /* Melhorias para loading em mobile */
    @media (max-width: 768px) {
      .loading-image {
        width: 80px;
        height: 80px;
      }
    }
  </style>

</head>

<body>
  <!-- Loading Overlay -->
  <div class="loading-overlay">
    <img src="{{ asset('images/loading.gif') }}" alt="Loading..." class="loading-image">
  </div>
  
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
  </div>
  
  <!-- Products details start -->
  <section class="product-details">
    <div class="container">
      <div class="product-container">
        <div class="row">
          <div class="col-md-6">
            <div class="product-image-container">
              <img src="/products/{{$data->image}}" alt="{{$data->title}}" class="product-image">
            </div>
          </div>

          <div class="col-md-6">
            <div class="product-header">
              <h1 class="product-title">{{$data->title}}</h1>
              <div class="product-ref">Ref: PROD-{{$data->id}}</div>
            </div>
            
            <!-- Pricing Section -->
            <div class="pricing-section">
              @if($data->hasDiscount())
                <div class="price-discount">
                  <div class="discount-icon">
                    <i class="fas fa-bolt"></i>
                  </div>
                  <span>{{ number_format($data->discount_percentage, 0) }}% OFF</span>
                </div>
                
                <div class="price-original">{{number_format($data->price, 2)}}€</div>
                <div class="price-current">{{number_format($data->getDiscountedPrice(), 2)}}€</div>
                <div class="price-save">You save {{ number_format($data->getDiscountAmount(), 2) }}€</div>
              @else
                <div class="price-main">{{number_format($data->price, 2)}}€</div>
              @endif
              <div class="price-tax">Taxes included</div>
            </div>
            
            <!-- Rating Section -->
            <div class="rating-section">
              <div class="rating-container">
                <div class="rating-circle">
                  <div class="rating-value">{{ number_format($averageRating, 1) }}</div>
                  <div class="rating-label">Average</div>
                </div>
                <div>
                  <div class="rating-stars">
                    @php $media = round($averageRating, 1); @endphp
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($media >= $i)
                        <i class="fas fa-star"></i>
                      @elseif ($media >= $i - 0.5)
                        <i class="fas fa-star-half-alt"></i>
                      @else
                        <i class="far fa-star"></i>
                      @endif
                    @endfor
                    <span class="rating-count">{{ $ratingsCount }} ratings</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Availability Section -->
            <div class="availability-section">
              @if($data->Quantity > 0)
                <div class="availability-badge">
                  <i class="fas fa-check-circle"></i>
                  <span>In stock - {{$data->Quantity}} units available</span>
                </div>
              @else
                <div class="availability-badge out-of-stock">
                  <i class="fas fa-times-circle"></i>
                  <span>Out of stock</span>
                </div>
              @endif
            </div>

            <form action="{{ url('add_cart_with_size', $data->id) }}" method="POST">
              @csrf
              
              <div class="product-options">
                @if($data->size)
                  <div class="option-group">
                    <label class="option-label">Size</label>
                    <div class="size-options">
                      @php
                        $availableSizes = explode(',', $data->size);
                      @endphp
                      
                      @foreach($availableSizes as $index => $size)
                        <input type="radio" name="size" id="size-{{$index}}" value="{{ trim($size) }}" class="size-option" {{ $index === 0 ? 'checked' : '' }}>
                        <label for="size-{{$index}}" class="size-label">{{ trim($size) }}</label>
                      @endforeach
                    </div>
                    
                    <span class="size-guide-link" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                      Size Guide
                    </span>
                  </div>
                @else
                  <input type="hidden" name="size" value="One Size">
                @endif
                
                <div class="quantity-group">
                  <label class="option-label">Quantity</label>
                  <div class="quantity-selector">
                    <button type="button" class="quantity-btn" onclick="decrementQuantity()">-</button>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{$data->Quantity}}" class="quantity-input">
                    <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                  </div>
                </div>
              </div>
              
              <div class="action-buttons">
                <button type="submit" class="btn-add-cart" {{ $data->Quantity <= 0 ? 'disabled' : '' }}>
                  <i class="fas fa-shopping-cart"></i>
                  Add to Cart
                </button>
              </div>
            </form>
            
            <div class="action-buttons">
              <a href="{{ route('add.to.wishlist', $data->id) }}" class="btn-wishlist">
                <i class="fas fa-heart"></i>
                Add to Wishlist
              </a>
            </div>
          </div>
        </div>
        
        <!-- Product Information Tabs -->
        <div class="product-tabs">
          <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
                <i class="fas fa-info-circle"></i>
                Description
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button" role="tab" aria-controls="features" aria-selected="false">
                <i class="fas fa-star"></i>
                Features
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="reviews-tab"  data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">
                <i class="fas fa-comments"></i>
                Reviews
              </button>
            </li>
          </ul>
          
          <div class="tab-content" id="productTabsContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <h2 class="description-title">Product Details</h2>
              <div class="product-description">
                {{$data->description}}
              </div>
              
              <div class="product-meta">
                <div class="meta-item">
                  <div class="meta-label">Category</div>
                  <div class="meta-value">{{$data->category ? $data->category->category_name : 'No category'}}</div>
                </div>
                
                @if($data->size)
                <div class="meta-item">
                  <div class="meta-label">Available Sizes</div>
                  <div class="meta-value">{{$data->size}}</div>
                </div>
                @endif
              </div>
            </div>
            
            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
              <div class="product-features">
                <div class="feature-item">
                  <div class="feature-icon">
                    <i class="fas fa-truck"></i>
                  </div>
                  <div class="feature-text">
                    <strong>Fast Delivery</strong>
                    2-4 business days
                  </div>
                </div>
                
                <div class="feature-item">
                  <div class="feature-icon">
                    <i class="fas fa-undo"></i>
                  </div>
                  <div class="feature-text">
                    <strong>Free Returns</strong>
                    Up to 30 days
                  </div>
                </div>
                
                <div class="feature-item">
                  <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                  </div>
                  <div class="feature-text">
                    <strong>Quality Guarantee</strong>
                    Certified Products
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <!-- Formulário de Avaliação -->
              @if(Auth::check())
                <div class="product-rating-form p-4 bg-light rounded-4 shadow-sm mb-4">
                  <form action="{{ route('product.rating', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="rating" class="form-label">Your rating:</label><br>
                      <div class="star-rating-input-animated d-flex justify-content-end">
                        @for ($i = 5; $i >= 1; $i--)
                          <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required style="display:none;">
                          <label for="star{{ $i }}" title="{{ $i }} estrelas">&#9733;</label>
                        @endfor
                      </div>
                    </div>
                    <div class="mb-3">
                                                      <textarea name="comment" class="form-control" placeholder="Leave a comment (optional)" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-purple">Submit Rating</button>
                  </form>
                </div>
              @endif

              <!-- Lista de Avaliações -->
              <div class="product-rating-list">
                <h6 class="mb-3">What customers say:</h6>
                <div class="row g-3">
                  @forelse($data->ratings as $rating)
                    <div class="col-md-6 col-lg-4">
                      <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body d-flex align-items-center gap-3">
                          <div class="avatar-circle">
                            <span>{{ strtoupper(mb_substr($rating->user->name ?? 'U', 0, 1)) }}</span>
                          </div>
                          <div>
                            <div class="mb-1" style="color: #FFD700; font-size:1.2rem;">
                              @for ($i = 1; $i <= 5; $i++)
                                @if ($rating->rating >= $i)
                                  <i class="fas fa-star"></i>
                                @else
                                  <i class="far fa-star"></i>
                                @endif
                              @endfor
                            </div>
                                                            <strong>{{ $rating->user->name ?? 'User' }}</strong>
                            <span class="text-muted small ms-2">{{ $rating->created_at->format('d/m/Y') }}</span>
                            <div class="mt-2">{{ $rating->comment }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @empty
                    <div class="col-12"><p>Be the first to rate this product!</p></div>
                  @endforelse
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Size Guide Modal -->
  <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="border-radius: 1rem; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
        <div class="modal-header">
          <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>European Size</th>
                  <th>Brazilian Size</th>
                  <th>Foot Length (cm)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>38</td>
                  <td>36</td>
                  <td>24.5</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>37</td>
                  <td>25.0</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>38</td>
                  <td>25.5</td>
                </tr>
                <tr>
                  <td>41</td>
                  <td>39</td>
                  <td>26.0</td>
                </tr>
                <tr>
                  <td>42</td>
                  <td>40</td>
                  <td>26.5</td>
                </tr>
                <tr>
                  <td>43</td>
                  <td>41</td>
                  <td>27.0</td>
                </tr>
                <tr>
                  <td>44</td>
                  <td>42</td>
                  <td>27.5</td>
                </tr>
                <tr>
                  <td>45</td>
                  <td>43</td>
                  <td>28.0</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- end Products details -->

  <!-- info section -->
  @include('home.footer')

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function incrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      const maxQuantity = parseInt(quantityInput.getAttribute('max'));
      let currentValue = parseInt(quantityInput.value);
      
      if (currentValue < maxQuantity) {
        quantityInput.value = currentValue + 1;
      }
    }
    
    function decrementQuantity() {
      const quantityInput = document.getElementById('quantity');
      let currentValue = parseInt(quantityInput.value);
      
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    }
    
    // Loading overlay
    document.addEventListener('DOMContentLoaded', function() {
      const loadingOverlay = document.querySelector('.loading-overlay');
      
      // Ativar loading overlay para o formulário de adicionar ao carrinho
      const addToCartForm = document.querySelector('form[action*="add_cart"]');
      if (addToCartForm && loadingOverlay) {
        addToCartForm.addEventListener('submit', function() {
          loadingOverlay.classList.add('active');
        });
      }
      
      // Ativar loading overlay para os links de navegação
      const navigationLinks = document.querySelectorAll('a:not([href="#"])');
      navigationLinks.forEach(link => {
        if (!link.getAttribute('href').startsWith('#') && !link.hasAttribute('data-bs-toggle')) {
          link.addEventListener('click', function() {
            loadingOverlay.classList.add('active');
          });
        }
      });
    });

    // Corrige o loading infinito ao voltar no histórico
    window.addEventListener('pageshow', function(event) {
      const loadingOverlay = document.querySelector('.loading-overlay');
      if (loadingOverlay) {
        loadingOverlay.classList.remove('active');
      }
    });
  </script>
  
    <!-- PHPFlasher para notificações -->
  @flasher_render
  
  <!-- Toastr Assets -->
  @include('home.toastr_assets')

</body>

</html>