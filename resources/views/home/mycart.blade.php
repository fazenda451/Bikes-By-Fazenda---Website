<!DOCTYPE html>
<html>

<head>
 
  @include('home.css')

  <style>
    /* Estilos gerais */
    .cart-section {
      padding: 3rem 0;
      background-color: #f8f9fa;
      min-height: 80vh;
      background-image: linear-gradient(to bottom, #f8f9fa, #f0f0f0);
    }

    .cart-container, .cart-summary, .checkout-form {
      background: white;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      transition: transform 0.3s, box-shadow 0.3s;
      position: relative;
      overflow: hidden;
    }

    .cart-container:hover, .cart-summary:hover, .checkout-form:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }

    .cart-container::before, .cart-summary::before, .checkout-form::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, #9935dc, #7b2cbf);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.5s ease;
    }

    .cart-container:hover::before, .cart-summary:hover::before, .checkout-form:hover::before {
      transform: scaleX(1);
    }

    /* Estilos da tabela */
    .cart-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 8px;
      overflow: hidden;
    }

    .cart-table thead {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
    }

    .cart-table th {
      border-right: 1px solid rgba(255, 255, 255, 0.1);
      background: transparent;
      color: white;
      padding: 1rem;
      text-align: left;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 0.85rem;
    }

    .cart-table th:last-child {
      border-right: none;
      width: 80px;
      text-align: center;
    }

    .cart-table th:nth-child(2), 
    .cart-table th:nth-child(4) {
      width: 100px;
      text-align: center;
    }

    .cart-table th:nth-child(3) {
      width: 120px;
      text-align: center;
    }

    .cart-table td {
      padding: 1rem;
      border-bottom: 1px solid #eaeaea;
      vertical-align: middle;
      transition: background-color 0.2s;
    }

    .cart-table td:nth-child(2), 
    .cart-table td:nth-child(4) {
      text-align: center;
      font-weight: 600;
      color: #333;
    }

    .cart-table td:nth-child(3) {
      text-align: center;
    }

    .cart-table td:last-child {
      text-align: center;
    }

    .cart-table tr:last-child td {
      border-bottom: none;
    }

    .cart-table tr:hover td {
      background-color: #f9f5ff;
    }

    /* Estilos dos itens */
    .d-flex.align-items-center {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .item-image {
      width: 70px;
      height: 70px;
      object-fit: contain;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
      background-color: #f9f9f9;
      padding: 5px;
    }

    .item-image:hover {
      transform: scale(1.05);
    }

    .item-title {
      font-weight: 600;
      color: #333;
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
      line-height: 1.3;
      max-width: 200px;
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .item-info {
      display: flex;
      flex-direction: column;
    }

    .item-meta {
      margin-top: 0.5rem;
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .item-meta-item {
      background-color: #f0f0f0;
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.75rem;
      color: #555;
      display: inline-flex;
      align-items: center;
      transition: background-color 0.2s;
    }

    .item-meta-item:hover {
      background-color: #e6e6e6;
    }

    .item-meta-item i {
      margin-right: 0.4rem;
      color: #9935dc;
    }

    /* Badge para quantidade fixa */
    .badge.bg-secondary {
      background-color: #6c757d;
      color: white;
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    /* Estilos para disponibilidade */
    .disponivel-badge {
      display: inline-block;
      background-color: #f0f7ff;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-size: 0.75rem;
      color: #0d6efd;
      margin-top: 0.5rem;
    }

    /* Estilos para tamanho */
    .tamanho-badge {
      display: inline-block;
      background-color: #f0f0f0;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-size: 0.75rem;
      color: #6c757d;
      margin-top: 0.5rem;
      margin-left: 0.5rem;
    }

    /* Controles de quantidade */
    .quantity-stepper {
      display: inline-flex;
      align-items: center;
      border: 1px solid #e0e0e0;
      border-radius: 30px;
      overflow: hidden;
      width: fit-content;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      transition: all 0.3s;
      margin: 0 auto;
    }

    .quantity-stepper:hover {
      border-color: #9935dc;
      box-shadow: 0 4px 8px rgba(153, 53, 220, 0.15);
    }

    .auto-update-form {
      margin-bottom: 0;
    }

    .quantity-stepper button {
      background: #f8f9fa;
      border: none;
      width: 36px;
      height: 36px;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
      color: #555;
    }

    .quantity-stepper button:hover {
      background: #9935dc;
      color: white;
    }

    .quantity-stepper button:active {
      transform: scale(0.95);
    }

    .quantity-stepper input {
      width: 40px;
      text-align: center;
      border: none;
      padding: 0.25rem;
      font-weight: 600;
      background: transparent;
      transition: all 0.3s;
    }

    .quantity-stepper input:focus {
      outline: none;
      background-color: #f9f5ff;
    }

    .quantity-stepper input:hover {
      border-color: #9935dc;
    }

    /* Seletor de tamanho */
    .size-selector {
      position: relative;
      width: fit-content;
      margin-top: 0.75rem;
    }

    .size-selector select {
      appearance: none;
      padding: 0.5rem 2.5rem 0.5rem 1rem;
      border: 1px solid #e0e0e0;
      border-radius: 30px;
      background-color: white;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.2s;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .size-selector select:focus {
      border-color: #9935dc;
      outline: none;
      box-shadow: 0 0 0 3px rgba(153, 53, 220, 0.2);
    }

    .size-selector select:hover {
      border-color: #9935dc;
      box-shadow: 0 4px 8px rgba(153, 53, 220, 0.15);
    }

    .size-selector::after {
      content: '\f078';
      font-family: 'Font Awesome 5 Free';
      font-weight: 900;
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
      color: #9935dc;
      transition: transform 0.3s;
    }

    .size-selector:hover::after {
      transform: translateY(-50%) rotate(180deg);
    }

    /* Estilos para preços */
    .price-value {
      font-weight: 600;
      color: #333;
      white-space: nowrap;
    }

    .total-value {
      font-weight: 700;
      color: #9935dc;
      white-space: nowrap;
    }

    /* Estilos para o botão de remover */
    .remove-btn {
      background: #fff;
      color: #dc3545;
      border: 1px solid #dc3545;
      padding: 0.5rem;
      border-radius: 50%;
      width: 32px;
      height: 32px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
      position: relative;
      overflow: hidden;
    }

    .remove-btn:hover {
      background: #dc3545;
      color: white;
      transform: rotate(90deg);
      box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
    }

    /* Estilos para o cabeçalho do carrinho */
    .my-cart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .cart-items-count {
      background-color: #f0f0f0;
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.85rem;
      color: #555;
      display: inline-flex;
      align-items: center;
    }

    .cart-items-count i {
      margin-right: 0.4rem;
      color: #9935dc;
    }

    /* Resumo do pedido */
    .cart-title, .order-summary-title {
      font-size: 1.3rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 1.5rem;
      text-transform: uppercase;
      position: relative;
      padding-bottom: 0.75rem;
      display: inline-block;
      letter-spacing: 1px;
    }

    .cart-title::after, .order-summary-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, #9935dc, transparent);
      border-radius: 3px;
      transition: width 0.3s ease;
    }

    .cart-container:hover .cart-title::after, 
    .cart-summary:hover .order-summary-title::after {
      width: 50%;
    }

    .summary-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1rem;
      font-size: 1rem;
      padding: 0.5rem 0;
      transition: all 0.3s;
    }

    .summary-item:hover {
      transform: translateX(5px);
      color: #9935dc;
    }

    .summary-item.total {
      font-size: 1.4rem;
      font-weight: 700;
      border-top: 2px solid #eaeaea;
      padding-top: 1rem;
      margin-top: 1rem;
      color: #9935dc;
    }

    .summary-item.total:hover {
      transform: translateX(0);
      color: #7b2cbf;
    }

    .summary-item.original-price {
      text-decoration: line-through;
      color: #6c757d;
      font-size: 0.9rem;
    }

    .shipping-info {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
      color: #28a745;
      background-color: rgba(40, 167, 69, 0.1);
      padding: 1rem;
      border-radius: 8px;
      border-left: 4px solid #28a745;
      transition: all 0.3s;
    }

    .shipping-info:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 10px rgba(40, 167, 69, 0.2);
    }

    .shipping-info i {
      margin-right: 0.75rem;
      font-size: 1.2rem;
      animation: truck 2s infinite;
    }

    @keyframes truck {
      0% { transform: translateX(0); }
      50% { transform: translateX(5px); }
      100% { transform: translateX(0); }
    }

    /* Sistema de pontos de fidelidade */
    .loyalty-points {
      background-color: #f0f7ff;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1.5rem;
      border-left: 4px solid #9935dc;
      transition: all 0.3s;
    }

    .loyalty-points:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 10px rgba(153, 53, 220, 0.2);
    }

    .badge.bg-primary {
      background-color: #9935dc !important;
      font-size: 0.9rem;
      padding: 0.4rem 0.8rem;
      border-radius: 20px;
      transition: all 0.3s;
    }

    .loyalty-points:hover .badge.bg-primary {
      transform: scale(1.1);
      box-shadow: 0 2px 5px rgba(153, 53, 220, 0.3);
    }

    .possible-discount {
      color: #28a745;
      font-weight: 500;
    }

    .total-with-discount {
      font-weight: 600;
      color: #9935dc;
    }

    .use-points-check {
      background-color: #f9f5ff;
      padding: 1rem;
      border-radius: 8px;
      border-left: 4px solid #9935dc;
      margin: 1.5rem 0;
      transition: background-color 0.2s;
    }

    .use-points-check:hover {
      background-color: #f3eaff;
      transform: translateY(-3px);
      box-shadow: 0 5px 10px rgba(153, 53, 220, 0.2);
    }

    .form-check-input:checked {
      background-color: #9935dc;
      border-color: #9935dc;
    }

    .loyalty-info {
      background-color: #f9f5ff;
      padding: 1rem;
      border-radius: 8px;
      font-size: 0.9rem;
      color: #555;
      border-left: 4px solid #9935dc;
      margin-top: 1.5rem;
      transition: all 0.3s;
    }

    .loyalty-info:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 10px rgba(153, 53, 220, 0.2);
    }

    .loyalty-info i {
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }

    .points-preview .alert {
      padding: 1rem;
      margin-bottom: 0;
      font-size: 0.9rem;
      border-radius: 8px;
      border-left: 4px solid #17a2b8;
      transition: all 0.3s;
    }

    .points-preview .alert:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 10px rgba(23, 162, 184, 0.2);
    }

    .points-preview .alert-info {
      background-color: rgba(23, 162, 184, 0.1);
      border-color: #17a2b8;
      color: #0c5460;
    }

    /* Formulário de checkout */
    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: #333;
      transition: all 0.3s;
    }

    .form-group:hover .form-label {
      color: #9935dc;
      transform: translateX(5px);
    }

    .form-control {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      transition: all 0.3s;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .form-control:focus {
      border-color: #9935dc;
      box-shadow: 0 0 0 3px rgba(153, 53, 220, 0.2);
      outline: none;
    }

    .form-control:hover {
      border-color: #9935dc;
    }

    .form-row {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .form-col {
      flex: 1;
    }

    /* Botões de pagamento */
    .payment-options {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-top: 2rem;
    }

    .btn-payment {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
      font-weight: 600;
      text-align: center;
      border-radius: 8px;
      transition: all 0.3s;
      cursor: pointer;
      margin-right: 0;
      text-decoration: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .btn-payment::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.2);
      transition: all 0.4s;
      z-index: -1;
    }

    .btn-payment:hover::before {
      left: 100%;
    }

    .btn-payment i {
      margin-right: 0.75rem;
      font-size: 1.2rem;
      transition: transform 0.3s;
    }

    .btn-payment:hover i {
      transform: scale(1.2);
    }

    .btn-cash {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
      color: white;
      border: none;
    }

    .btn-cash:hover {
      background: linear-gradient(135deg, #8024c0, #6a1eab);
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(153, 53, 220, 0.3);
    }

    .btn-card {
      background: linear-gradient(135deg, #28a745, #20913a);
      color: white;
      text-decoration: none;
    }

    .btn-card:hover {
      background: linear-gradient(135deg, #218838, #1a7e31);
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(40, 167, 69, 0.3);
      color: white;
    }

    /* Loading overlay */
    .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.9);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s, visibility 0.3s;
      backdrop-filter: blur(5px);
    }
    
    .loading-overlay.active {
      opacity: 1;
      visibility: visible;
    }
    
    .loading-image {
      width: 600px;
      height: 600px;
      object-fit: contain;
      animation: pulse 1.5s infinite;
      filter: drop-shadow(0 0 15px rgba(153, 53, 220, 0.5));
    }

    @keyframes pulse {
      0% { transform: scale(0.95); opacity: 0.7; }
      50% { transform: scale(1); opacity: 1; }
      100% { transform: scale(0.95); opacity: 0.7; }
    }

    /* Responsividade */
    @media (max-width: 992px) {
      .cart-section {
        padding: 2rem 0;
      }
      
      .cart-container, .cart-summary, .checkout-form {
        padding: 1.25rem;
      }
      
      .item-title {
        font-size: 0.9rem;
        max-width: 150px;
      }
    }

    @media (max-width: 768px) {
      .cart-table {
        display: block;
        overflow-x: auto;
      }

      .cart-table th, .cart-table td {
        padding: 0.75rem 0.5rem;
        white-space: nowrap;
      }

      .cart-table th {
        font-size: 0.8rem;
      }

      .item-image {
        width: 60px;
        height: 60px;
      }
      
      .d-flex.align-items-center {
        gap: 0.5rem;
      }
      
      .item-title {
        max-width: 120px;
        font-size: 0.85rem;
      }

      .item-meta-item {
        font-size: 0.7rem;
        padding: 0.2rem 0.5rem;
      }

      .quantity-stepper {
        transform: scale(0.9);
        transform-origin: center;
      }

      .remove-btn {
        width: 30px;
        height: 30px;
      }
    }

    @media (max-width: 576px) {
      .cart-container, .cart-summary, .checkout-form {
        padding: 1rem;
        margin-bottom: 1rem;
      }

      .cart-title, .order-summary-title {
        font-size: 1.1rem;
      }
      
      .item-meta {
        flex-direction: column;
        gap: 0.25rem;
      }

      .my-cart-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
      }

      .cart-items-count {
        font-size: 0.8rem;
      }

      .delivery-options {
        flex-direction: column;
      }
    }

    /* Estilos para carrinho vazio */
    .empty-cart {
      text-align: center;
      padding: 3rem 2rem;
    }

    .empty-cart-icon {
      font-size: 5rem;
      color: #e0e0e0;
      margin-bottom: 1.5rem;
    }

    .empty-cart-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 1rem;
    }

    .empty-cart-message {
      font-size: 1.1rem;
      color: #6c757d;
      margin-bottom: 2rem;
    }

    .btn-continue-shopping {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      transition: all 0.3s;
      box-shadow: 0 4px 6px rgba(153, 53, 220, 0.3);
    }

    .btn-continue-shopping:hover {
      background: linear-gradient(135deg, #8024c0, #6a1eab);
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(153, 53, 220, 0.4);
      color: white;
    }

    .btn-continue-shopping i {
      margin-right: 0.5rem;
    }

    /* Delivery Options Styles */
    .delivery-options {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .delivery-option {
      flex: 1;
    }

    .delivery-radio {
      display: none;
    }

    .delivery-label {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 1.5rem 1rem;
      border: 2px solid #e0e0e0;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
      text-align: center;
    }

    .delivery-label i {
      font-size: 2rem;
      margin-bottom: 0.75rem;
      color: #6c757d;
      transition: all 0.3s;
    }

    .delivery-label span {
      font-weight: 600;
      color: #333;
    }

    .delivery-radio:checked + .delivery-label {
      border-color: #9935dc;
      background-color: #f9f5ff;
      box-shadow: 0 4px 8px rgba(153, 53, 220, 0.15);
    }

    .delivery-radio:checked + .delivery-label i {
      color: #9935dc;
      transform: scale(1.1);
    }

    /* Cards responsivos para mobile */
    .cart-item-card {
      display: none;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      margin-bottom: 1rem;
      overflow: hidden;
      transition: all 0.3s;
    }

    .cart-item-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .cart-item-header {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
      color: white;
      padding: 1rem;
      font-weight: 600;
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .cart-item-body {
      padding: 1.5rem;
    }

    .cart-item-image {
      width: 100px;
      height: 100px;
      object-fit: contain;
      border-radius: 8px;
      background-color: #f9f9f9;
      padding: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .cart-item-title {
      font-weight: 600;
      color: #333;
      font-size: 1.1rem;
      margin-bottom: 0.75rem;
      line-height: 1.3;
    }

    .cart-item-details {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-top: 1rem;
    }

    .cart-item-detail {
      display: flex;
      justify-content: between;
      align-items: center;
      padding: 0.75rem;
      background: #f8f9fa;
      border-radius: 8px;
      border-left: 4px solid #9935dc;
    }

    .cart-item-detail-label {
      font-weight: 600;
      color: #555;
      margin-bottom: 0.25rem;
      font-size: 0.9rem;
    }

    .cart-item-detail-value {
      color: #333;
    }

    .cart-item-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 1.5rem;
      padding-top: 1rem;
      border-top: 1px solid #eee;
    }

    .mobile-quantity-controls {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      width: 100%;
    }

    .mobile-quantity-stepper {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .mobile-size-selector {
      width: 100%;
    }

    .mobile-size-selector select {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      background: white;
      font-size: 1rem;
    }

    /* Media Queries para Mobile */
    @media (max-width: 768px) {
      .cart-section {
        padding: 1.5rem 0;
      }

      .cart-container, .cart-summary, .checkout-form {
        margin-left: 0;
        margin-right: 0;
        border-radius: 8px;
        padding: 1rem;
      }

      .cart-title, .order-summary-title {
        font-size: 1.2rem;
        text-align: center;
      }

      /* Esconder tabela em mobile */
      .cart-table {
        display: none;
      }

      /* Mostrar cards em mobile */
      .cart-item-card {
        display: block;
      }

      .my-cart-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
      }

      .delivery-options {
        flex-direction: column;
        gap: 0.75rem;
      }

      .delivery-label {
        padding: 1rem;
        flex-direction: row;
        justify-content: flex-start;
        text-align: left;
      }

      .delivery-label i {
        font-size: 1.5rem;
        margin-bottom: 0;
        margin-right: 1rem;
      }

      .summary-item {
        font-size: 0.95rem;
      }

      .summary-item.total {
        font-size: 1.2rem;
      }

      .payment-options {
        flex-direction: column;
        gap: 0.75rem;
      }

      .btn-payment {
        width: 100%;
        justify-content: center;
      }

      .form-row {
        flex-direction: column;
        gap: 1rem;
      }

      .form-col {
        width: 100%;
      }

      .loyalty-points {
        text-align: center;
      }

      .points-selector .input-group {
        flex-direction: column;
        gap: 0.5rem;
      }

      .points-selector .input-group > * {
        width: 100% !important;
      }

      .empty-cart {
        padding: 2rem 1rem;
      }

      .empty-cart-icon {
        font-size: 3rem;
      }

      .empty-cart-title {
        font-size: 1.5rem;
      }

      .empty-cart-message {
        font-size: 1rem;
      }
    }

    @media (max-width: 576px) {
      .cart-section {
        padding: 1rem 0;
      }

      .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
      }

      .cart-container, .cart-summary, .checkout-form {
        padding: 0.75rem;
        margin-bottom: 0.75rem;
      }

      .cart-title, .order-summary-title {
        font-size: 1.1rem;
      }

      .cart-item-body {
        padding: 1rem;
      }

      .cart-item-image {
        width: 80px;
        height: 80px;
      }

      .cart-item-title {
        font-size: 1rem;
      }

      .cart-item-detail {
        padding: 0.5rem;
      }

      .quantity-stepper {
        transform: scale(0.9);
      }

      .summary-item {
        font-size: 0.9rem;
      }

      .shipping-info {
        padding: 0.75rem;
        font-size: 0.9rem;
      }

      .loyalty-points {
        padding: 0.75rem;
      }
    }

    /* Estilos para formulários responsivos */
    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: #9935dc;
      box-shadow: 0 0 0 3px rgba(153, 53, 220, 0.1);
      outline: none;
    }

    .form-row {
      display: flex;
      gap: 1rem;
    }

    .form-col {
      flex: 1;
    }

    .payment-options {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .btn-payment {
      flex: 1;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      transition: all 0.3s;
      cursor: pointer;
    }

    .btn-cash {
      background: linear-gradient(135deg, #28a745, #20c997);
      color: white;
    }

    .btn-cash:hover {
      background: linear-gradient(135deg, #218838, #1aa085);
      transform: translateY(-2px);
      color: white;
    }

    .btn-card {
      background: linear-gradient(135deg, #9935dc, #7b2cbf);
      color: white;
    }

    .btn-card:hover {
      background: linear-gradient(135deg, #8024c0, #6a1eab);
      transform: translateY(-2px);
      color: white;
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
 

    <section class="cart-section">
      <div class="container">
        <div class="row">
          <!-- Coluna da esquerda - Tabela do carrinho -->
          <div class="col-lg-8">
            <div class="cart-container">
              <div class="my-cart-header">
                <h2 class="cart-title">My Cart</h2>
                @if(count($cart) > 0)
                <div class="cart-items-count">
                  <i class="fas fa-shopping-cart"></i>
                  <span>{{ count($cart) }} item(s)</span>
                </div>
                @endif
              </div>
              @if(count($cart) > 0)
              
              <!-- Tabela para Desktop -->
              <table class="cart-table">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total = 0; ?>
                  <?php $originalTotal = 0; ?>
                  @foreach ($cart as $item)
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          @if($item->is_motorcycle)
                            <img src="{{ $item->motorcycle->photos->first() ? asset('motorcycles/' . $item->motorcycle->photos->first()->image) : asset('images/no-image.jpg') }}" alt="{{$item->motorcycle->name}}" class="item-image">
                            <div class="item-info">
                              <div class="item-title">{{$item->motorcycle->name}}</div>
                              <div class="item-meta">
                                <span class="item-meta-item">
                                  <i class="fas fa-motorcycle"></i>Moto
                                </span>
                              </div>
                            </div>
                          @else
                            <img src="/products/{{$item->product->image}}" alt="{{$item->product->title}}" class="item-image">
                            <div class="item-info">
                              <div class="item-title">{{$item->product->title}}</div>
                              <div class="item-meta">
                                <span class="item-meta-item">
                                  <i class="fas fa-box"></i>{{$item->product->Quantity}} unid.
                                </span>
                                @if($item->size)
                                <span class="item-meta-item">
                                  <i class="fas fa-ruler"></i>{{$item->size}}
                                </span>
                                @endif
                              </div>
                            </div>
                          @endif
                        </div>
                      </td>
                      <td>
                        @if($item->is_motorcycle)
                          <span class="price-value">{{number_format($item->motorcycle->price, 2)}}€</span>
                        @else
                          @if($item->product->hasDiscount())
                            <div>
                              <span style="text-decoration: line-through; color: #999; font-size: 0.9rem;">{{number_format($item->product->price, 2)}}€</span>
                              <span class="price-value" style="color: #28a745;">{{number_format($item->product->getDiscountedPrice(), 2)}}€</span>
                              <div style="margin-top: 3px;">
                                <span style="background: #e74c3c; color: white; padding: 2px 6px; border-radius: 8px; font-size: 0.7rem;">-{{ number_format($item->product->discount_percentage, 0) }}%</span>
                              </div>
                            </div>
                          @else
                            <span class="price-value">{{number_format($item->product->price, 2)}}€</span>
                          @endif
                        @endif
                      </td>
                      <td>
                        @if($item->is_motorcycle)
                          <span class="badge bg-secondary">1</span>
                        @else
                          <form action="{{ url('update_quantity') }}" method="POST" class="auto-update-form" id="quantity-form-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$item->id}}">
                            <div class="quantity-stepper">
                              <button type="button" onclick="decreaseQuantity(this)" class="quantity-btn-minus">
                                <i class="fas fa-minus"></i>
                              </button>
                              <input type="number" name="quantity" value="{{$item->quantity}}" min="1" max="{{$item->product->Quantity}}" class="quantity-input" onchange="autoSubmitForm('quantity-form-{{$item->id}}')">
                              <button type="button" onclick="increaseQuantity(this)" class="quantity-btn-plus">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                          </form>
                          
                          @if($item->size)
                          <form action="{{ url('update_size') }}" method="POST" class="mt-2 auto-update-form" id="size-form-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$item->id}}">
                            <div class="size-selector">
                              <select name="size" onchange="autoSubmitForm('size-form-{{$item->id}}')">
                                @if($item->product->size)
                                  @foreach(explode(',', $item->product->size) as $size)
                                    <option value="{{ trim($size) }}" {{ $item->size == trim($size) ? 'selected' : '' }}>{{ trim($size) }}</option>
                                  @endforeach
                                @else
                                  <option value="{{ $item->size }}" selected>{{ $item->size }}</option>
                                @endif
                              </select>
                            </div>
                          </form>
                          @endif
                        @endif
                      </td>
                      <td>
                        @if($item->is_motorcycle)
                          <span class="total-value">{{number_format($item->motorcycle->price, 2)}}€</span>
                          <?php $total += $item->motorcycle->price; ?>
                          <?php $originalTotal += $item->motorcycle->price; ?>
                        @else
                          @if($item->product->hasDiscount())
                            <div>
                              <span style="text-decoration: line-through; color: #999; font-size: 0.9rem;">{{number_format($item->product->price * $item->quantity, 2)}}€</span>
                              <span class="total-value" style="color: #28a745;">{{number_format($item->product->getDiscountedPrice() * $item->quantity, 2)}}€</span>
                            </div>
                            <?php $total += $item->product->getDiscountedPrice() * $item->quantity; ?>
                            <?php $originalTotal += $item->product->price * $item->quantity; ?>
                          @else
                            <span class="total-value">{{number_format($item->product->price * $item->quantity, 2)}}€</span>
                            <?php $total += $item->product->price * $item->quantity; ?>
                            <?php $originalTotal += $item->product->price * $item->quantity; ?>
                          @endif
                        @endif
                      </td>
                      <td>
                        <a href="{{url('delete_cart', $item->id)}}" class="remove-btn">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Cards para Mobile -->
              <?php $total = 0; ?>
              <?php $originalTotal = 0; ?>
              @foreach ($cart as $item)
                <div class="cart-item-card">
                  <div class="cart-item-header">
                    <i class="fas fa-shopping-cart"></i> Cart Item #{{$loop->iteration}}
                  </div>
                  <div class="cart-item-body">
                    <div class="d-flex align-items-start gap-3">
                      @if($item->is_motorcycle)
                        <img src="{{ $item->motorcycle->photos->first() ? asset('motorcycles/' . $item->motorcycle->photos->first()->image) : asset('images/no-image.jpg') }}" alt="{{$item->motorcycle->name}}" class="cart-item-image">
                        <div class="flex-grow-1">
                          <div class="cart-item-title">{{$item->motorcycle->name}}</div>
                          <div class="item-meta">
                            <span class="item-meta-item">
                              <i class="fas fa-motorcycle"></i>Motocicleta
                            </span>
                          </div>
                        </div>
                      @else
                        <img src="/products/{{$item->product->image}}" alt="{{$item->product->title}}" class="cart-item-image">
                        <div class="flex-grow-1">
                          <div class="cart-item-title">{{$item->product->title}}</div>
                          <div class="item-meta">
                            <span class="item-meta-item">
                              <i class="fas fa-box"></i>{{$item->product->Quantity}} unid. disponíveis
                            </span>
                            @if($item->size)
                            <span class="item-meta-item">
                              <i class="fas fa-ruler"></i>Tamanho: {{$item->size}}
                            </span>
                            @endif
                          </div>
                        </div>
                      @endif
                    </div>

                    <div class="cart-item-details">
                      <!-- Preço -->
                      <div class="cart-item-detail">
                        <div>
                          <div class="cart-item-detail-label">Preço Unitário</div>
                          <div class="cart-item-detail-value">
                            @if($item->is_motorcycle)
                              <span class="price-value">{{number_format($item->motorcycle->price, 2)}}€</span>
                            @else
                              @if($item->product->hasDiscount())
                                <div>
                                  <span style="text-decoration: line-through; color: #999; font-size: 0.9rem;">{{number_format($item->product->price, 2)}}€</span>
                                  <span class="price-value" style="color: #28a745; font-weight: bold;">{{number_format($item->product->getDiscountedPrice(), 2)}}€</span>
                                  <div style="margin-top: 3px;">
                                    <span style="background: #e74c3c; color: white; padding: 3px 8px; border-radius: 8px; font-size: 0.75rem;">-{{ number_format($item->product->discount_percentage, 0) }}% OFF</span>
                                  </div>
                                </div>
                              @else
                                <span class="price-value">{{number_format($item->product->price, 2)}}€</span>
                              @endif
                            @endif
                          </div>
                        </div>
                      </div>

                      <!-- Quantidade e Controles -->
                      @if(!$item->is_motorcycle)
                      <div class="cart-item-detail">
                        <div class="mobile-quantity-controls">
                          <div class="cart-item-detail-label">Quantidade</div>
                          <form action="{{ url('update_quantity') }}" method="POST" class="auto-update-form" id="mobile-quantity-form-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$item->id}}">
                            <div class="mobile-quantity-stepper">
                              <button type="button" onclick="decreaseQuantity(this)" class="quantity-btn-minus" style="width: 40px; height: 40px;">
                                <i class="fas fa-minus"></i>
                              </button>
                              <input type="number" name="quantity" value="{{$item->quantity}}" min="1" max="{{$item->product->Quantity}}" class="quantity-input" style="width: 80px; text-align: center; font-size: 1.1rem;" onchange="autoSubmitForm('mobile-quantity-form-{{$item->id}}')">
                              <button type="button" onclick="increaseQuantity(this)" class="quantity-btn-plus" style="width: 40px; height: 40px;">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                          </form>

                          @if($item->size)
                          <form action="{{ url('update_size') }}" method="POST" class="auto-update-form" id="mobile-size-form-{{$item->id}}">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$item->id}}">
                            <div class="mobile-size-selector">
                              <div class="cart-item-detail-label">Tamanho</div>
                              <select name="size" onchange="autoSubmitForm('mobile-size-form-{{$item->id}}')">
                                @if($item->product->size)
                                  @foreach(explode(',', $item->product->size) as $size)
                                    <option value="{{ trim($size) }}" {{ $item->size == trim($size) ? 'selected' : '' }}>{{ trim($size) }}</option>
                                  @endforeach
                                @else
                                  <option value="{{ $item->size }}" selected>{{ $item->size }}</option>
                                @endif
                              </select>
                            </div>
                          </form>
                          @endif
                        </div>
                      </div>
                      @else
                      <div class="cart-item-detail">
                        <div>
                          <div class="cart-item-detail-label">Quantidade</div>
                          <div class="cart-item-detail-value">
                            <span class="badge bg-secondary" style="font-size: 1rem; padding: 0.5rem 1rem;">1 unidade</span>
                          </div>
                        </div>
                      </div>
                      @endif

                      <!-- Total -->
                      <div class="cart-item-detail" style="background: #f0f7ff; border-left-color: #0d6efd;">
                        <div>
                          <div class="cart-item-detail-label">Total do Item</div>
                          <div class="cart-item-detail-value">
                            @if($item->is_motorcycle)
                              <span class="total-value" style="font-size: 1.2rem;">{{number_format($item->motorcycle->price, 2)}}€</span>
                              <?php $total += $item->motorcycle->price; ?>
                              <?php $originalTotal += $item->motorcycle->price; ?>
                            @else
                              @if($item->product->hasDiscount())
                                <div>
                                  <span style="text-decoration: line-through; color: #999; font-size: 0.9rem;">{{number_format($item->product->price * $item->quantity, 2)}}€</span>
                                  <span class="total-value" style="color: #28a745; font-size: 1.2rem; font-weight: bold;">{{number_format($item->product->getDiscountedPrice() * $item->quantity, 2)}}€</span>
                                </div>
                                <?php $total += $item->product->getDiscountedPrice() * $item->quantity; ?>
                                <?php $originalTotal += $item->product->price * $item->quantity; ?>
                              @else
                                <span class="total-value" style="font-size: 1.2rem;">{{number_format($item->product->price * $item->quantity, 2)}}€</span>
                                <?php $total += $item->product->price * $item->quantity; ?>
                                <?php $originalTotal += $item->product->price * $item->quantity; ?>
                              @endif
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="cart-item-actions">
                      <a href="{{url('delete_cart', $item->id)}}" class="remove-btn" style="position: relative; right: auto; top: auto;">
                        <i class="fas fa-trash"></i> Remover
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach

              @else
              <div class="empty-cart">
                <div class="empty-cart-icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <h3 class="empty-cart-title">Your cart is empty</h3>
                <p class="empty-cart-message">It seems you haven't added any items to your cart yet.</p>
                <a href="{{ url('/') }}" class="btn-continue-shopping">
                  <i class="fas fa-arrow-left"></i> Continue Shopping
                </a>
              </div>
              @endif
            </div>
          </div>

          <!-- Coluna da direita - Resumo do pedido e dados do destinatário -->
          <div class="col-lg-4">
            @if(count($cart) > 0)
            <!-- Resumo do pedido -->
            <div class="cart-summary">
              <h2 class="order-summary-title">Order Summary</h2>
              
              <div class="shipping-info">
                <i class="fas fa-truck"></i>
                <span>Free shipping available for your order!</span>
              </div>

              <div class="summary-item">
                <span>{{ count($cart) }} item(s)</span>
                <span>{{ $total }}€</span>
              </div>

              <div class="summary-item">
                <span>Shipping</span>
                <span>Free</span>
              </div>

              <!-- Sistema de Pontos de Fidelidade -->
              <div class="summary-item loyalty-points">
                <span>Your Loyalty Points</span>
                <span class="badge bg-primary">{{ $userPoints ?? 0 }}</span>
              </div>

              @if(isset($userPoints) && $userPoints > 0)
                <?php 
                  // Calcula o desconto máximo (1% por cada 1000 pontos, limitado a 10%)
                  $maxPointsDiscount = min(floor($userPoints / 1000), 10);
                  $maxDiscount = $total * ($maxPointsDiscount / 100);
                  // Limita o desconto ao valor total
                  $maxDiscount = min($maxDiscount, $total);
                  // Calcula quantos pontos seriam necessários para o desconto máximo
                  $pointsNeededForMaxDiscount = min($maxPointsDiscount * 1000, $userPoints);
                ?>
                <div class="summary-item possible-discount">
                  <span>Discount with Points (1% for every 1000 points, max. 10%)</span>
                  <span>-{{ number_format($maxDiscount, 2) }}€</span>
                </div>

                <div class="summary-item total-with-discount">
                  <span>Total with Discount</span>
                  <span>{{ number_format($total - $maxDiscount, 2) }}€</span>
                </div>

                <div class="form-check use-points-check mt-3 mb-3">
                  <input class="form-check-input" type="checkbox" id="use-points" name="use_points">
                  <label class="form-check-label" for="use-points">
                    Use points for discount
                  </label>
                </div>

                <div class="points-selector mt-2" id="points-selector" style="display: none;">
                  <label class="form-label">Number of points to use:</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="points-input" min="1000" max="{{ $userPoints }}" step="1000" value="10000">
                    <span class="input-group-text">points</span>
                    <button type="button" class="btn btn-outline-primary" id="max-points-btn">Maximum</button>
                  </div>
                  <small class="text-muted">You can use multiples of 1000 points (1% discount for every 1000 points, limited to 10%)</small>
                  
                  <div class="points-preview mt-2">
                    <div class="alert alert-info">
                      <span id="points-preview-text">Using 10000 points, you will receive a 10% discount ({{ number_format($total * 0.10, 2) }}€)</span>
                    </div>
                  </div>
                  
                  <div class="alert alert-warning mt-2">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <span>Note: When using points for discount, you will not receive points for this purchase.</span>
                  </div>
                </div>
              @endif

              <div class="summary-item total">
                <span>TOTAL</span>
                <span>{{ $total }}€</span>
              </div>

              @if($originalTotal > $total)
              <div class="summary-item original-price">
                <span>Original price</span>
                <span>{{ $originalTotal }}€</span>
              </div>
              @endif
              
              <!-- Informação sobre ganho de pontos -->
              <div class="loyalty-info mt-3" id="loyalty-info">
                <i class="fas fa-award text-primary me-2"></i>
                <span>You will earn approximately {{ floor(($total / 10) * 5) }} points with this purchase!</span>
              </div>
            </div>

                          <!-- Dados do destinatário -->
            <div class="checkout-form">
              <form action="{{url('comfirm_order')}}" method="POST" id="checkout-form">
                @csrf
                <!-- Campo oculto para os pontos -->
                <input type="hidden" id="points_to_use_hidden" name="points_to_use" value="">
                <!-- Campo oculto para uso de pontos -->
                <input type="hidden" id="use_points_hidden_form" name="use_points" value="">
                
                <div class="form-group">
                  <label class="form-label">Recipient Name</label>
                  <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                </div>

                <!-- Delivery Options -->
                <div class="form-group">
                  <label class="form-label">Delivery Method</label>
                  <div class="delivery-options">
                    <div class="delivery-option">
                      <input type="radio" class="delivery-radio" name="delivery_method" id="delivery-home" value="home" checked>
                      <label for="delivery-home" class="delivery-label">
                        <i class="fas fa-home"></i>
                        <span>Home Delivery</span>
                      </label>
                    </div>
                    <div class="delivery-option">
                      <input type="radio" class="delivery-radio" name="delivery_method" id="delivery-store" value="store">
                      <label for="delivery-store" class="delivery-label">
                        <i class="fas fa-store"></i>
                        <span>Store Pickup</span>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Store Selection (hidden by default) -->
                <div class="form-group" id="store-selection" style="display: none;">
                  <label class="form-label">Select Store Location</label>
                  <select name="store_location" class="form-control">
                    <option value="">Select a store...</option>
                    <option value="lisbon">Lisbon Store - Av. da Liberdade 123</option>
                    <option value="porto">Porto Store - Rua de Santa Catarina 456</option>
                    <option value="faro">Faro Store - Rua de Santo António 789</option>
                    <option value="braga">Braga Store - Avenida Central 101</option>
                  </select>
                  <small class="text-muted">You can pick up your order at the selected store during business hours (Mon-Sat: 10AM-7PM)</small>
                </div>

                <!-- Home Delivery Address (shown by default) -->
                <div id="home-delivery-fields">
                  <div class="form-group">
                    <label class="form-label">Delivery Address</label>
                    <textarea name="address" class="form-control" required>{{Auth::user()->address ?? ''}}</textarea>
                  </div>

                  <div class="form-row">
                    <div class="form-col">
                      <label class="form-label">City</label>
                      <input type="text" name="city" value="{{Auth::user()->city ?? ''}}" class="form-control" required>
                    </div>
                    <div class="form-col">
                      <label class="form-label">Postal Code</label>
                      <input type="text" name="zip_code" value="{{Auth::user()->zip_code ?? ''}}" class="form-control" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}" class="form-control" required>
                </div>

                <div class="payment-options">
                  <button type="submit" class="btn-payment btn-cash">
                    <i class="fas fa-money-bill-wave"></i>
                    Pay on Delivery
                  </button>
                  <a href="{{url('stripe', $total)}}" class="btn-payment btn-card" id="stripe-link">
                    <i class="fas fa-credit-card"></i>
                    Checkout
                  </a>
                  <!-- Campos ocultos para passar informação dos pontos -->
                  <input type="hidden" name="use_points" id="use_points_hidden" value="">
                </div>
              </form>
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>

  <!-- info section -->

  @include('home.footer')

  <!-- Bootstrap 5 JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function autoSubmitForm(formId) {
      document.getElementById(formId).submit();
    }

    function decreaseQuantity(button) {
      const form = button.closest('form');
      const input = form.querySelector('.quantity-input');
      if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
        form.submit();
      }
    }

    function increaseQuantity(button) {
      const form = button.closest('form');
      const input = form.querySelector('.quantity-input');
      const maxQuantity = parseInt(input.getAttribute('max'));
      const currentQuantity = parseInt(input.value);

      if (currentQuantity < maxQuantity) {
        input.value = currentQuantity + 1;
        form.submit();
      } else {
        toastr.warning('Maximum quantity available in stock reached');
      }
    }

    // Sistema de pontos de fidelidade
    document.addEventListener('DOMContentLoaded', function() {
      @if(count($cart ?? []) > 0)
      const usePointsCheckbox = document.getElementById('use-points');
      const pointsSelector = document.getElementById('points-selector');
      const pointsInput = document.getElementById('points-input');
      const pointsHidden = document.getElementById('points_to_use_hidden');
      const maxPointsBtn = document.getElementById('max-points-btn');
      const loyaltyInfo = document.getElementById('loyalty-info');
      const totalValue = parseFloat('{{ $total ?? 0 }}');
      
      // Calcula o máximo de pontos que podem ser usados (10% do valor total)
      const maxPercentage = 10; // 10%
      const maxDiscountValue = totalValue * (maxPercentage / 100); // Valor máximo de desconto (10% do total)
      const pointsNeededForOnePercent = 1000; // 1000 pontos = 1%
      const maxDiscountPoints = Math.min(Math.floor(maxPercentage) * pointsNeededForOnePercent, {{ $userPoints ?? 0 }});
      
      console.log('Cart total:', totalValue);
                  console.log('Maximum discount value (10%):', maxDiscountValue);
            console.log('Maximum allowed points:', maxDiscountPoints);
            console.log('User points:', {{ $userPoints ?? 0 }});
      
      if (usePointsCheckbox) {
        usePointsCheckbox.addEventListener('change', function() {
          pointsSelector.style.display = this.checked ? 'block' : 'none';
          // Esconde ou mostra a informação de ganho de pontos
          loyaltyInfo.style.display = this.checked ? 'none' : 'block';
          
          // Garante que o input de pontos tenha um valor válido
          if (this.checked) {
            if (!pointsInput.value || pointsInput.value < 1000) {
              pointsInput.value = Math.min(10000, maxDiscountPoints);
            }
            // Atualiza o campo oculto
            pointsHidden.value = pointsInput.value;
          } else {
            // Se desmarcar, limpa o valor para não enviar
            pointsInput.value = '';
            pointsHidden.value = '';
          }
          
          updateTotal();
          
          // Log para debug
          console.log('Checkbox marcado:', this.checked);
          console.log('Valor atual dos pontos:', pointsInput.value);
          console.log('Valor do campo oculto:', pointsHidden.value);
        });

        if (pointsInput) {
          // Define o valor máximo baseado no menor entre os pontos do usuário e o máximo permitido
          pointsInput.max = maxDiscountPoints;
          
          // Só define o valor se o checkbox estiver marcado
          if (usePointsCheckbox && usePointsCheckbox.checked) {
            pointsInput.value = Math.min(10000, maxDiscountPoints);
          } else {
            pointsInput.value = ''; // Limpa o valor se o checkbox não estiver marcado
          }
          
          pointsInput.addEventListener('change', function() {
            // Garante que o valor seja múltiplo de 1000
            const value = parseInt(this.value) || 0;
            this.value = Math.floor(value / 1000) * 1000;
            
            // Garante o valor mínimo de 1000 e máximo permitido
            if (this.value < 1000 && this.value > 0) this.value = 1000;
            if (this.value > maxDiscountPoints) this.value = maxDiscountPoints;
            
            // Atualiza o campo oculto
            pointsHidden.value = this.value;
            
            updateTotal();
            
            // Log para debug
            console.log('Valor dos pontos alterado para:', this.value);
            console.log('Valor do campo oculto:', pointsHidden.value);
          });
          
          pointsInput.addEventListener('input', function() {
            // Atualiza o campo oculto
            pointsHidden.value = this.value;
            updateTotal();
          });
        }
        
        if (maxPointsBtn) {
          maxPointsBtn.addEventListener('click', function() {
            // Define o valor máximo permitido
            pointsInput.value = maxDiscountPoints;
            // Atualiza o campo oculto
            pointsHidden.value = maxDiscountPoints;
            
            updateTotal();
            
            // Log para debug
            console.log('Maximum button clicked, value set to:', maxDiscountPoints);
            console.log('Valor do campo oculto:', pointsHidden.value);
          });
        }
      }
      
      // Inicializa o estado
      if (usePointsCheckbox && !usePointsCheckbox.checked) {
        pointsSelector.style.display = 'none';
        loyaltyInfo.style.display = 'block';
        pointsHidden.value = '';
        
        // Limpa o input de pontos quando o checkbox não está marcado
        if (pointsInput) {
          pointsInput.value = '';
        }
        
        // Garante que os campos ocultos estejam limpos na inicialização
        const usePointsHidden = document.getElementById('use_points_hidden');
        const usePointsHiddenForm = document.getElementById('use_points_hidden_form');
        
        if (usePointsHidden) usePointsHidden.value = '';
        if (usePointsHiddenForm) usePointsHiddenForm.value = '';
        
        console.log('Initialization - clearing all points fields');
      }
      
      // Adiciona um evento ao formulário para garantir que os pontos sejam enviados corretamente
      const checkoutForm = document.getElementById('checkout-form');
      if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
          console.log('Form submit event triggered');
          console.log('Checkbox checked:', usePointsCheckbox.checked);
          console.log('Points input value:', pointsInput ? pointsInput.value : 'N/A');
          
          if (usePointsCheckbox && usePointsCheckbox.checked) {
            // Garante que o campo oculto tenha o valor correto
            pointsHidden.value = pointsInput.value;
            console.log('Form submitted with points:', pointsHidden.value);
          } else {
            // Limpa o campo oculto
            pointsHidden.value = '';
            console.log('Form submitted without points');
          }
          
          // Log final dos campos ocultos
          console.log('Final points_to_use_hidden value:', pointsHidden.value);
          console.log('Final use_points_hidden_form value:', document.getElementById('use_points_hidden_form').value);
        });
      }
      
      // Função para atualizar campos ocultos do Stripe
      function updateStripeHiddenFields() {
        const usePointsHidden = document.getElementById('use_points_hidden');
        const usePointsHiddenForm = document.getElementById('use_points_hidden_form');
        
        console.log('updateStripeHiddenFields called');
        console.log('Checkbox checked:', usePointsCheckbox ? usePointsCheckbox.checked : 'N/A');
        console.log('Points input value:', pointsInput ? pointsInput.value : 'N/A');
        
        if (usePointsCheckbox && usePointsCheckbox.checked) {
          usePointsHidden.value = '1';
          usePointsHiddenForm.value = '1';
          console.log('Setting points fields - use_points: 1');
        } else {
          usePointsHidden.value = '';
          usePointsHiddenForm.value = '';
          
          // Limpa também o input de pontos quando o checkbox não está marcado
          if (pointsInput) {
            pointsInput.value = '';
          }
          
          console.log('Clearing points fields');
        }
      }
      
      // Adicionar eventos para atualizar campos ocultos
      if (usePointsCheckbox) {
        usePointsCheckbox.addEventListener('change', updateStripeHiddenFields);
      }
      if (pointsInput) {
        pointsInput.addEventListener('change', updateStripeHiddenFields);
        pointsInput.addEventListener('input', updateStripeHiddenFields);
      }
      
      // Chama a função na inicialização para garantir o estado correto
      updateStripeHiddenFields();
      @endif
    });

    function updateTotal() {
      @if(count($cart ?? []) > 0)
      const usePointsCheckbox = document.getElementById('use-points');
      const pointsInput = document.getElementById('points-input');
      const totalElement = document.querySelector('.summary-item.total span:last-child');
      const pointsPreviewText = document.getElementById('points-preview-text');
      const stripeLink = document.getElementById('stripe-link');
      
      if (usePointsCheckbox && usePointsCheckbox.checked && pointsInput) {
        const points = parseInt(pointsInput.value) || 0;
        console.log('Pontos selecionados:', points);
        
        // Limita o desconto a 10%
        const discountPercentage = Math.min(Math.floor(points / 1000), 10);
        console.log('Percentual de desconto:', discountPercentage + '%');
        
        const originalTotal = parseFloat('{{ $total ?? 0 }}');
        const discount = originalTotal * (discountPercentage / 100);
        console.log('Valor do desconto:', discount.toFixed(2) + '€');
        
        const finalTotal = originalTotal - discount;
        console.log('Total final:', finalTotal.toFixed(2) + '€');
        
        if (totalElement) {
          totalElement.textContent = finalTotal.toFixed(2) + '€';
        }
        
        // Atualiza o texto de preview
        if (pointsPreviewText) {
          pointsPreviewText.textContent = `Using ${points} points, you will receive ${discountPercentage}% discount (${discount.toFixed(2)}€)`;
        }
        
        // Atualiza o link do Stripe
        if (stripeLink) {
          let stripeUrl = "{{url('stripe', '')}}" + "/" + finalTotal.toFixed(2);
          
          // Adiciona parâmetros de pontos se estiverem sendo usados
          if (usePointsCheckbox && usePointsCheckbox.checked && pointsInput) {
            const points = pointsInput.value;
            if (points && points > 0) {
              stripeUrl += "?use_points=1&points_to_use=" + points;
            }
          }
          
          stripeLink.href = stripeUrl;
        }
      } else if (totalElement && stripeLink) {
        totalElement.textContent = '{{ $total ?? 0 }}€';
        
        // Restaura o link do Stripe
        stripeLink.href = "{{url('stripe', $total ?? 0)}}";
      }
      @endif
    }
  </script>

  <script>
    // Loading overlay
    document.addEventListener('DOMContentLoaded', function() {
      const loadingOverlay = document.querySelector('.loading-overlay');
      
      // Ativar loading overlay para os formulários
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function() {
          loadingOverlay.classList.add('active');
        });
      });
      
      // Ativar loading overlay para os links de navegação
      const navigationLinks = document.querySelectorAll('a:not([href="#"])');
      navigationLinks.forEach(link => {
        if (!link.getAttribute('href').startsWith('#') && !link.hasAttribute('data-bs-toggle')) {
          link.addEventListener('click', function() {
            loadingOverlay.classList.add('active');
          });
        }
      });
      
      // Ativar loading overlay para os botões de atualizar quantidade
      const quantityButtons = document.querySelectorAll('.quantity-btn');
      quantityButtons.forEach(button => {
        button.addEventListener('click', function() {
          loadingOverlay.classList.add('active');
        });
      });
      
      // Ativar loading overlay para o botão de checkout
      const checkoutButton = document.querySelector('.btn-checkout');
      if (checkoutButton && loadingOverlay) {
        checkoutButton.addEventListener('click', function() {
          loadingOverlay.classList.add('active');
        });
      }

      // Delivery method toggle
      const homeDeliveryRadio = document.getElementById('delivery-home');
      const storeDeliveryRadio = document.getElementById('delivery-store');
      const homeDeliveryFields = document.getElementById('home-delivery-fields');
      const storeSelection = document.getElementById('store-selection');
      
      if (homeDeliveryRadio && storeDeliveryRadio) {
        // Set initial state
        toggleDeliveryFields();
        
        // Add event listeners
        homeDeliveryRadio.addEventListener('change', toggleDeliveryFields);
        storeDeliveryRadio.addEventListener('change', toggleDeliveryFields);
        
        function toggleDeliveryFields() {
          if (homeDeliveryRadio.checked) {
            homeDeliveryFields.style.display = 'block';
            storeSelection.style.display = 'none';
            
            // Make address fields required
            const addressFields = homeDeliveryFields.querySelectorAll('input, textarea');
            addressFields.forEach(field => {
              field.required = true;
            });
            
            // Make store selection not required
            const storeField = storeSelection.querySelector('select');
            if (storeField) storeField.required = false;
          } else {
            homeDeliveryFields.style.display = 'none';
            storeSelection.style.display = 'block';
            
            // Make address fields not required
            const addressFields = homeDeliveryFields.querySelectorAll('input, textarea');
            addressFields.forEach(field => {
              field.required = false;
            });
            
            // Make store selection required
            const storeField = storeSelection.querySelector('select');
            if (storeField) storeField.required = true;
          }
        }
      }
    });
  </script>

  <!-- PHPFlasher para notificações -->
  @flasher_render
  
  <!-- Toastr Assets -->
  @include('home.toastr_assets')

  <script>
    // Corrige o loading infinito ao voltar no histórico
    window.addEventListener('pageshow', function(event) {
      const loadingOverlay = document.querySelector('.loading-overlay');
      if (loadingOverlay) {
        loadingOverlay.classList.remove('active');
      }
    });
  </script>

</body>

</html>