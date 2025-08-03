<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <title>پنل مدیریت</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Vazir Font -->
  <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.0/Vazirmatn-font-face.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #3a56d4;
      --primary-dark: #2f46b8;
      --secondary-color: #28272C;
      --accent-color: #5c7cfa;
      --text-light: #f8f9fa;
      --text-muted: #6b7280;
      --bg-light: #f8fafd;
      --text-dark: #1f2a44;
      --sidebar-width: 260px;
      --collapsed-width: 70px;
      --toggle-btn-size: 36px;
      --content-padding: 25px;
      --cart-width: 500px;
      --transition-speed: 0.45s;
      --easing: cubic-bezier(0.68, -0.55, 0.265, 1.55);
      --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
      --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
      --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);
      --shadow-xl: 0 15px 25px rgba(0, 0, 0, 0.2);
      --font-size-base: 0.9rem;
    }

    body {
      margin: 0;
      font-family: "Vazirmatn", sans-serif;
      background-color: var(--bg-light);
      color: var(--text-dark);
      overflow-x: hidden;
      transition: margin-right var(--transition-speed) var(--easing);
      font-size: var(--font-size-base);
    }

    .barcode-tab {
      background-color: var(--primary-color);
      padding: 8px;
      color: white;
      border-radius: 6px;
      border: none;
      margin: 6px;
      transition: background-color 0.2s ease;
      font-size: 0.8rem;
    }

    .barcode-tab:hover {
      background-color: var(--primary-dark);
    }

    .barcode-tab i {
      margin-right: 6px;
    }

    .payment-methods-container {
      background-color: #ffffff;
      border-radius: 6px;
      padding: 10px;
      box-shadow: var(--shadow-sm);
      margin-bottom: 10px;
    }

    .payment-method {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 8px;
      border-radius: 5px;
      transition: background-color 0.2s ease;
      margin-bottom: 6px;
    }

    .payment-method:hover {
      background-color: rgba(0, 0, 0, 0.03);
    }

    .payment-method label {
      color: var(--text-dark);
      font-weight: 500;
      font-size: 0.8rem;
      cursor: pointer;
      flex-grow: 1;
    }

    .payment-method .form-check-input {
      display: none;
    }

    .payment-method .custom-checkbox {
      width: 16px;
      height: 16px;
      border: 2px solid var(--text-muted);
      border-radius: 3px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .payment-method .form-check-input:checked + .custom-checkbox {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .payment-method .custom-checkbox i {
      color: white;
      font-size: 0.7rem;
      opacity: 0;
      transition: opacity 0.2s ease;
    }

    .payment-method .form-check-input:checked + .custom-checkbox i {
      opacity: 1;
    }

    .payment-method .payment-amount-input {
      width: 100px;
      padding: 5px;
      font-size: 0.75rem;
      border-radius: 4px;
      border: 1px solid var(--text-muted);
      display: none;
      transition: all 0.2s ease;
    }

    .payment-method .form-check-input:checked + .custom-checkbox + label + .payment-amount-input {
      display: inline-block;
    }

    .payment-method .payment-amount-input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(60, 85, 212, 0.2);
    }

    .search-bar {
      max-width: 350px;
      margin: auto;
    }

    .barcode-section {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .form-label {
      font-size: 0.8rem;
      color: var(--text-dark);
      font-weight: 500;
      margin-bottom: 5px;
    }

    .form-control,
    .form-select {
      border-radius: 5px;
      border: 1px solid var(--text-muted);
      padding: 6px 10px;
      font-size: 0.8rem;
      transition: all 0.2s ease;
      background-color: white;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(60, 85, 212, 0.2);
      outline: none;
    }

    .form-control::placeholder {
      color: var(--text-muted);
      font-size: 0.75rem;
    }

    .dropdown-menu {
      padding: 3px;
      text-align: center;
      font-size: 0.8rem;
    }

    .sidebar {
      height: 100vh;
      width: var(--sidebar-width);
      position: fixed;
      right: 0;
      top: 0;
      background: linear-gradient(160deg, var(--primary-color), var(--secondary-color));
      color: var(--text-light);
      padding: 0;
      transition: all var(--transition-speed) var(--easing);
      z-index: 1050;
      box-shadow: var(--shadow-lg);
      border-left: 1px solid rgba(255, 255, 255, 0.15);
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .sidebar.collapsed {
      width: var(--collapsed-width);
      box-shadow: var(--shadow-md);
    }

    .sidebar-header {
      padding: 20px 15px;
      background: rgba(0, 0, 0, 0.08);
      border-bottom: 1px solid rgba(255, 255, 255, 0.12);
      text-align: center;
      position: relative;
      transition: all var(--transition-speed) var(--easing);
      flex-shrink: 0;
    }

    .sidebar.collapsed .sidebar-header {
      padding: 15px 0;
      background: transparent;
      border-bottom: none;
    }

    .sidebar-logo {
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all var(--transition-speed) var(--easing);
      overflow: hidden;
    }

    .sidebar.collapsed .sidebar-logo {
      opacity: 0;
      height: 0;
      margin: 0;
    }

    .sidebar-title {
      font-size: 1.3rem;
      font-weight: 700;
      margin: 0;
      letter-spacing: -0.4px;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar-subtitle {
      font-size: 0.7rem;
      color: rgba(255, 255, 255, 0.7);
      margin-top: 4px;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar-toggle {
      position: absolute;
      left: -18px;
      top: 50%;
      margin-top: 8px;
      transform: translateY(-50%);
      background: var(--primary-color);
      color: white;
      border-radius: 50%;
      width: var(--toggle-btn-size);
      height: var(--toggle-btn-size);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all var(--transition-speed) var(--easing);
      box-shadow: var(--shadow-md);
      border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-toggle:hover {
      background: var(--primary-dark);
      transform: translateY(-50%) scale(1.08);
      box-shadow: var(--shadow-lg);
    }

    .sidebar-toggle i {
      transition: transform var(--transition-speed) var(--easing);
    }

    .sidebar.collapsed .sidebar-toggle {
      left: 50%;
      transform: translate(-50%, -50%) rotate(180deg);
    }

    .sidebar.collapsed .sidebar-toggle:hover {
      transform: translate(-50%, -50%) rotate(180deg) scale(1.08);
    }

    .sidebar-nav {
      flex-grow: 1;
      overflow-y: auto;
      margin-top: 6px;
      padding: 10px 8px;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar.collapsed .sidebar-nav {
      padding: 10px 3px;
    }

    .nav-item {
      position: relative;
      margin-bottom: 3px;
    }

    .nav-link {
      color: var(--text-light);
      font-size: 0.85rem;
      padding: 10px 12px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      transition: all 0.25s ease;
      position: relative;
      overflow: hidden;
      white-space: nowrap;
    }

    .nav-link:hover,
    .nav-link.active {
      background: rgba(255, 255, 255, 0.12);
      transform: translateX(-3px);
    }

    .nav-link.active {
      background: rgba(255, 255, 255, 0.15);
    }

    .nav-icon {
      margin-left: 6px;
      font-size: 1rem;
      min-width: 22px;
      text-align: center;
      transition: all var(--transition-speed) var(--easing);
    }

    .sidebar.collapsed .nav-icon {
      margin-left: 0;
      font-size: 1.1rem;
    }

    .nav-text {
      transition: all var(--transition-speed) var(--easing);
      opacity: 1;
    }

    .sidebar.collapsed .nav-text {
      opacity: 0;
      width: 0;
      position: absolute;
      pointer-events: none;
    }

    .nav-item::after {
      content: attr(data-tooltip);
      position: absolute;
      right: 100%;
      top: 50%;
      transform: translateY(-50%);
      background: var(--primary-dark);
      color: white;
      padding: 4px 8px;
      border-radius: 3px;
      font-size: 0.75rem;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: all 0.2s ease;
      margin-right: 10px;
      box-shadow: var(--shadow-sm);
    }

    .sidebar.collapsed .nav-item:hover::after {
      opacity: 1;
      margin-right: 6px;
    }

    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-toggle::after {
      content: '\f078';
      font-family: 'Bootstrap Icons';
      margin-left: auto;
      font-size: 0.8rem;
      color: rgba(255, 255, 255, 0.8);
      transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      padding-left: 6px;
    }

    .dropdown-submenu.show .dropdown-toggle::after {
      transform: rotate(180deg);
      color: var(--text-light);
    }

    .dropdown-submenu .dropdown-menu {
      position: static;
      width: 100%;
      margin-top: 3px;
      padding: 0;
      border: none;
      background: transparent;
      box-shadow: none;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s var(--easing);
    }

    .dropdown-submenu.show .dropdown-menu {
      max-height: 200px;
      transition: max-height 0.4s var(--easing);
    }

    .dropdown-submenu .dropdown-item {
      color: var(--text-light);
      font-size: 0.8rem;
      padding: 6px 20px;
      border-radius: 4px;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      background: rgba(255, 255, 255, 0.05);
      margin: 2px 0;
      transform: translateY(6px);
      opacity: 0;
      transition: transform 0.3s var(--easing), opacity 0.3s ease;
    }

    .dropdown-submenu.show .dropdown-item {
      transform: translateY(0);
      opacity: 1;
    }

    .dropdown-submenu .dropdown-item:nth-child(1) {
      transition-delay: 0.05s;
    }

    .dropdown-submenu .dropdown-item:nth-child(2) {
      transition-delay: 0.1s;
    }

    .dropdown-submenu .dropdown-item:nth-child(3) {
      transition-delay: 0.15s;
    }

    .dropdown-submenu .dropdown-item:nth-child(4) {
      transition-delay: 0.2s;
    }

    .dropdown-submenu .dropdown-item:hover,
    .dropdown-submenu .dropdown-item.active {
      background: rgba(255, 255, 255, 0.18);
      transform: translateX(-5px);
    }

    .sidebar.collapsed .dropdown-submenu .dropdown-menu {
      display: none !important;
    }

    .main-content {
      padding: var(--content-padding);
      min-height: 100vh;
      margin-right: calc(var(--sidebar-width) + var(--cart-width));
      transition: margin-right var(--transition-speed) var(--easing);
    }

    .main-content.expanded {
      margin-right: calc(var(--collapsed-width) + var(--cart-width));
    }

    .category-dropdown .dropdown-toggle {
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 15px;
      padding: 8px 12px;
      font-size: 0.8rem;
      transition: all 0.2s ease;
    }

    .category-dropdown .dropdown-toggle:hover {
      background-color: var(--primary-dark);
    }

    .category-dropdown .dropdown-menu {
      border-radius: 6px;
      box-shadow: var(--shadow-lg);
      border: none;
      padding: 3px;
    }

    .category-dropdown .dropdown-item {
      border-radius: 4px;
      padding: 6px 8px;
      margin: 2px 0;
      font-size: 0.8rem;
      transition: all 0.2s ease;
    }

    .category-dropdown .dropdown-item.active,
    .category-dropdown .dropdown-item:active {
      background-color: var(--primary-color);
    }

    .category-dropdown .dropdown-item:not(.active):hover {
      background-color: #f1f3f5;
    }

    .product-card {
      position: relative;
      height: 160px;
      overflow: hidden;
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-lg);
    }

    .product-card .card-img-container {
      position: relative;
      height: 100%;
      width: 100%;
    }

    .product-card .card-img-top {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 8px;
      transition: transform 0.3s ease;
    }

    .product-card:hover .card-img-top {
      transform: scale(1.05);
    }

    .product-card .card-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(108, 117, 125, 0.85), transparent 35px);
      padding: 6px 7px;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .product-card .card-title {
      font-size: 0.8rem;
      font-weight: 700;
      margin: 0;
      color: var(--text-light);
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    }

    .product-card .product-number {
      font-size: 0.65rem;
      font-weight: 500;
      color: var(--text-light);
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    }

    .product-card .card-text {
      font-size: 0.75rem;
      font-weight: 600;
      margin: 0;
      color: var(--text-light);
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    }

    .product-card .card-text i {
      margin-left: 3px;
    }

    .cart-sidebar {
      height: 100vh;
      width: var(--cart-width);
      position: fixed;
      right: var(--sidebar-width);
      top: 0;
      background: var(--bg-light);
      border-left: 1px solid var(--text-muted);
      padding: 12px;
      transition: all var(--transition-speed) var(--easing);
      z-index: 1049;
      box-shadow: var(--shadow-lg);
      display: flex;
      flex-direction: column;
    }

    .sidebar.collapsed ~ .cart-sidebar {
      right: var(--collapsed-width);
    }

    .cart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid var(--text-muted);
      padding-bottom: 10px;
      margin-bottom: 12px;
    }

    .cart-header h3 {
      font-size: 1.1rem;
      margin: 0;
    }

    .cart-items-container {
      flex-grow: 1;
      overflow-y: auto;
      margin-bottom: 12px;
    }

    .cart-item {
      display: flex;
      align-items: center;
      padding: 8px;
      border-bottom: 1px solid var(--text-muted);
      margin-bottom: 6px;
      border-radius: 6px;
      background: #ffffff;
      transition: all 0.2s ease;
    }

    .cart-item:hover {
      box-shadow: var(--shadow-sm);
    }

    .cart-item img {
      width: 45px;
      height: 45px;
      object-fit: cover;
      margin-left: 6px;
      border-radius: 3px;
    }

    .cart-item-details {
      flex-grow: 1;
    }

    .cart-item-details h6 {
      font-size: 0.9rem;
      font-weight: 600;
      margin-bottom: 3px;
    }

    .cart-item-details p {
      font-size: 0.8rem;
      color: var(--text-muted);
      margin-bottom: 3px;
    }

    .cart-item-remove {
      cursor: pointer;
      color: #dc3545;
      font-size: 1rem;
      transition: color 0.2s ease;
    }

    .cart-item-remove:hover {
      color: #b02a37;
    }

    .cart-footer {
      margin-top: auto;
      padding-top: 12px;
      border-top: 1px solid var(--text-muted);
    }

    .cart-options {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 12px;
    }

    .cart-discount,
    .payment-methods-container,
    .user-selection {
      background-color: #ffffff;
      border-radius: 6px;
      padding: 10px;
      box-shadow: var(--shadow-sm);
      flex: 1 1 calc(50% - 5px);
      min-width: 200px;
    }

    .cart-discount .row {
      margin-bottom: 0;
      align-items: center;
    }

    .cart-discount select,
    .cart-discount input,
    .user-selection input,
    .user-selection select {
      flex: 1;
      margin-bottom: 0;
      font-size: 0.75rem;
      padding: 5px;
    }

    .cart-discount .btn,
    .user-selection .btn {
      font-size: 0.75rem;
      padding: 6px 12px;
      border-radius: 6px;
      transition: all 0.2s ease;
    }

    .cart-discount .btn:hover,
    .user-selection .btn:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }

    .cart-total-details p {
      font-size: 0.9rem;
      margin-bottom: 6px;
      color: var(--text-dark);
    }

    .cart-total-details .discount-amount {
      color: #28a745;
    }

    .cart-total-details .final-total {
      font-size: 1rem;
      font-weight: bold;
      color: var(--primary-color);
    }

    .cart-pay-btn {
      width: 100%;
      font-size: 0.9rem;
      padding: 8px;
      border-radius: 6px;
      margin-top: 10px;
      background-color: var(--primary-color);
      border: none;
      transition: background-color 0.2s ease;
    }

    .cart-pay-btn:hover {
      background-color: var(--primary-dark);
    }

    .quantity-control {
      display: flex;
      gap: 6px;
      align-items: center;
    }

    .quantity-btn {
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      transition: all 0.3s ease;
      box-shadow: var(--shadow-sm);
    }

    .quantity-btn.plus {
      background: #28a745;
      color: white;
    }

    .quantity-btn.plus:hover:not(:disabled) {
      background: #1e7e34;
      transform: scale(1.05);
      box-shadow: var(--shadow-md);
    }

    .quantity-btn.minus {
      background: #dc3545;
      color: white;
    }

    .quantity-btn.minus:hover:not(:disabled) {
      background: #b02a37;
      transform: scale(1.05);
      box-shadow: var(--shadow-md);
    }

    .quantity-btn:disabled {
      background: #6c757d;
      cursor: not-allowed;
      opacity: 0.6;
    }

    .user-selection .input-group {
      position: relative;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .user-selection .form-control {
      padding-left: 28px;
    }

    .user-selection .clear-search {
      position: absolute;
      left: 6px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--text-muted);
      font-size: 0.9rem;
      cursor: pointer;
      display: none;
      z-index: 10;
    }

    .user-selection .clear-search.show {
      display: block;
    }

    .user-selection .clear-search:hover {
      color: var(--primary-color);
    }

    .user-selection .search-feedback {
      font-size: 0.75rem;
      color: var(--text-muted);
      margin-top: 6px;
      min-height: 1rem;
    }

    .user-selection .form-select {
      margin-top: 8px;
    }

    .user-selection .form-select option {
      padding: 6px;
      font-size: 0.75rem;
    }

    .user-selection .form-select option.matched {
      background-color: rgba(60, 85, 212, 0.1);
      font-weight: 500;
    }

    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(100%);
        width: var(--sidebar-width);
      }

      .sidebar.show-mobile {
        transform: translateX(0);
      }

      .sidebar.collapsed {
        transform: translateX(100%);
        width: var(--sidebar-width);
      }

      .main-content {
        margin-right: var(--cart-width);
        padding: 12px;
      }

      .main-content.expanded {
        margin-right: var(--cart-width);
      }

      .sidebar-toggle {
        left: -18px;
        transform: translateY(-50%);
      }

      .sidebar.collapsed .sidebar-toggle {
        left: -18px;
        transform: translateY(-50%) rotate(180deg);
      }

      .cart-sidebar {
        width: 100%;
        right: 0;
      }

      .sidebar.collapsed ~ .cart-sidebar {
        right: 0;
      }

      .cart-options {
        gap: 8px;
      }

      .product-card {
        height: 140px;
      }

      .product-card .card-overlay {
        background: linear-gradient(to top, rgba(108, 117, 125, 0.85), transparent 30px);
        padding: 4px 6px;
        gap: 2px;
      }

      .product-card .card-title {
        font-size: 0.75rem;
      }

      .product-card .product-number {
        font-size: 0.6rem;
      }

      .product-card .card-text {
        font-size: 0.7rem;
      }

      .quantity-btn {
        width: 32px;
        height: 32px;
        font-size: 1rem;
      }
    }

    @media (max-width: 576px) {
      .cart-sidebar {
        width: 100%;
      }

      .main-content {
        padding: 10px;
        margin-right: 0;
      }

      .barcode-section {
        flex-direction: column;
        gap: 6px;
      }

      .barcode-section input {
        width: 100%;
      }

      .payment-method {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
      }

      .payment-method .payment-amount-input {
        width: 100%;
      }

      .user-selection .input-group {
        flex-direction: column;
        gap: 6px;
      }

      .user-selection .input-group .form-control,
      .user-selection .input-group .btn {
        width: 100%;
      }

      .user-selection .clear-search {
        left: 8px;
      }

      .cart-discount .row {
        flex-direction: column;
        gap: 6px;
      }

      .cart-discount .col-5,
      .cart-discount .col-4,
      .cart-discount .col-3 {
        width: 100%;
      }

      .cart-options {
        flex-direction: column;
      }

      .cart-discount,
      .payment-methods-container,
      .user-selection {
        flex: 1 1 100%;
      }
    }

    ::-webkit-scrollbar {
      width: 4px;
    }

    ::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.1);
      border-radius: 2px;
    }

    ::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.3);
      border-radius: 2px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.4);
    }
  </style>
</head>

<body>
<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <button class="sidebar-toggle" id="sidebarToggle" aria-label="بستن/باز کردن منو">
      <i class="bi bi-chevron-right"></i>
    </button>
    <div class="sidebar-logo">
      <h2 class="sidebar-title">پایانه فروش</h2>
      <span class="sidebar-subtitle">پنل مدیریت</span>
    </div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-item dropdown-submenu" data-tooltip="ثبت سفارش">
      <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bag-check nav-icon"></i>
        <span class="nav-text">ثبت سفارش</span>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">گزارشات</a></li>
        <li><a class="dropdown-item" href="#">فروشگاه</a></li>
        <li><a class="dropdown-item" href="#">لیست فروش</a></li>
      </ul>
    </div>
  </nav>
</div>

<div class="cart-sidebar" id="cartSidebar">
  <div class="cart-header">
    <h3>سبد خرید</h3>
  </div>
  <div class="cart-items-container" id="cartItems"></div>
  <div class="cart-footer">
    <div class="cart-options">
      <div class="cart-discount">
        <label class="form-label fw-bold">تخفیف</label>
        <div class="row g-2 align-items-center">
          <div class="col-5">
            <select class="form-select" id="discountType">
              <option value="percentage">درصد</option>
              <option value="amount">تومان</option>
            </select>
          </div>
          <div class="col-4">
            <input type="number" class="form-control" id="discountValue" placeholder="مقدار تخفیف" min="0">
          </div>
          <div class="col-3">
            <button class="btn btn-outline-primary w-100" id="applyDiscount">اعمال</button>
          </div>
        </div>
      </div>

      <div class="payment-methods-container">
        <label class="form-label fw-bold">روش پرداخت</label>
        <div class="payment-method">
          <input class="form-check-input" type="checkbox" name="paymentOption" id="payCard" value="کارت بانکی">
          <div class="custom-checkbox">
            <i class="bi bi-check"></i>
          </div>
          <label class="form-check-label" for="payCard">کارت بانکی</label>
          <input type="number" class="payment-amount-input" id="cardAmount" placeholder="مبلغ (تومان)" min="0">
        </div>
        <div class="payment-method">
          <input class="form-check-input" type="checkbox" name="paymentOption" id="payCash" value="نقدی">
          <div class="custom-checkbox">
            <i class="bi bi-check"></i>
          </div>
          <label class="form-check-label" for="payCash">نقدی</label>
          <input type="number" class="payment-amount-input" id="cashAmount" placeholder="مبلغ (تومان)" min="0">
        </div>
      </div>

      <div class="user-selection">
        <label class="form-label fw-bold">انتخاب کاربر</label>
        <div class="input-group">
          <input type="text" class="form-control" id="userSearch" placeholder="جستجو با شماره موبایل"
                 aria-label="جستجو کاربر" aria-describedby="clearSearch">
          <button class="btn btn-outline-primary" type="button" id="addUserBtn">افزودن کاربر</button>
          <button class="clear-search" id="clearSearch" aria-label="پاک کردن جستجو"><i class="bi bi-x"></i></button>
        </div>
        <p class="search-feedback" id="searchFeedback"></p>
        <select class="form-select" id="users" name="users" aria-label="انتخاب کاربر">
          <!-- گزینه‌ها به‌صورت دینامیک توسط جاوااسکریپت پر می‌شوند -->
        </select>
      </div>
    </div>

    <div class="cart-total-details mb-2">
      <p id="cartSubtotal">جمع کل: ۰ تومان</p>
      <p id="cartDiscount" class="discount-amount">تخفیف: ۰ تومان</p>
      <p id="cartFinalTotal" class="final-total">مبلغ قابل پرداخت : ۰ تومان</p>
    </div>

    <button class="btn btn-success cart-pay-btn" id="payButton">پرداخت</button>
  </div>
</div>

<div class="main-content" id="mainContent">
  <div class="container mt-0">
    <div class="row mb-2">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-body p-2">
            <div class="d-flex flex-row-reverse align-items-center">
              <button class="barcode-tab" type="button" data-bs-toggle="modal" data-bs-target="#barcodeModal"> بارکد<i
                  class="bi bi-upc-scan"></i></button>
              <div class="barcode-section">
                <input type="text" class="form-control" id="barcodeInput" name="barcode" placeholder="کد محصول"
                       aria-label="کد محصول">
              </div>
              <div class="dropdown category-dropdown me-2">
                <button class="btn dropdown-toggle" type="button" id="categoryDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                  <i class="bi bi-list-ul me-2"></i> دسته‌بندی محصولات
                </button>
                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                  <li><a class="dropdown-item" href="#" role="button">همه دسته‌بندی‌ها</a></li>
                  <li><a class="dropdown-item active" href="#" role="button">شومیز</a></li>
                  <li><a class="dropdown-item" href="#" role="button">مانتو</a></li>
                  <li><a class="dropdown-item" href="#" role="button">شلوار</a></li>
                  <li><a class="dropdown-item" href="#" role="button">کت و شلوار</a></li>
                  <li><a class="dropdown-item" href="#" role="button">شال و روسری</a></li>
                  <li><a class="dropdown-item" href="#" role="button">کیف</a></li>
                  <li><a class="dropdown-item" href="#" role="button">لباس خانگی</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 row-cols-xxl-8 g-2"
         id="productsContainer">
      <div class="col" data-category="شومیز">
        <div class="product-card">
          <div class="card-img-container">
            <img src="https://lebasesabzz.com/storage/files/9problematice/68726c7a086ff.webp"
                 class="card-img-top" alt="شومیز">
            <div class="card-overlay">
              <h5 class="card-title">شومیز</h5>
              <h5 class="product-number">کد محصول: 1808</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۱,۲۰۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col" data-category="مانتو">
        <div class="product-card">
          <div class="card-img-container">
            <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/688118aa2d5a2.webp"
                 class="card-img-top" alt="مانتو">
            <div class="card-overlay">
              <h5 class="card-title">مانتو</h5>
              <h5 class="product-number">کد محصول: 1809</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۱,۵۵۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col" data-category="شلوار">
        <div class="product-card">
          <div class="card-img-container">
            <img src="https://lebasesabzz.com/storage/files/9/%D8%AC%DB%8C%D9%86/68834b459107b.webp"
                 class="card-img-top" alt="شلوار">
            <div class="card-overlay">
              <h5 class="card-title">شلوار</h5>
              <h5 class="product-number">کد محصول: 1810</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۲,۲۰۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col" data-category="کت و شلوار">
        <div class="product-card">
          <div class="card-img-container">
            <img src="https://lebasesabzz.com/storage/files/9/%D8%B3%D8%A7%D8%AF%D9%87/68826e9a02322.webp"
                 class="card-img-top" alt="کت و شلوار">
            <div class="card-overlay">
              <h5 class="card-title">کت و شلوار</h5>
              <h5 class="product-number">کد محصول: 1811</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۳,۰۰۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col" data-category="کیف">
        <div class="product-card">
          <div class="card-img-container">
            <img src="https://bagpanizz.ir/wp-content/uploads/2024/05/IMG_9387-600x720.jpeg"
                 class="card-img-top" alt="کیف">
            <div class="card-overlay">
              <h5 class="card-title">کیف</h5>
              <h5 class="product-number">کد محصول: 1812</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۳,۰۰۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col" data-category="لباس خانگی">
        <div class="product-card">
          <div class="card-img-container">
            <img src="https://ibolak.com/storage/image/2025/6/optimized/1749618907-YQZv1LxYECfc0VbH.webp"
                 class="card-img-top" alt="لباس خانگی">
            <div class="card-overlay">
              <h5 class="card-title">لباس خانگی</h5>
              <h5 class="product-number">کد محصول: 1813</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۳,۰۰۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col" data-category="شال و روسری">
        <div class="product-card">
          <div class="card-img-container">
            <img
              src="https://lebasesabzz.com/storage/files/9/%D8%AF%D8%A8%D9%84%20%D9%81%DB%8C%D8%B3/68753c61d9b10.webp"
              class="card-img-top" alt="شال و روسری">
            <div class="card-overlay">
              <h5 class="card-title">شال و روسری</h5>
              <h5 class="product-number">کد محصول: 1814</h5>
              <p class="card-text"><i class="bi bi-tag"></i> ۷۵۰,۰۰۰ تومان</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Size and Color Selection -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">انتخاب مشخصات محصول</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <form id="productForm">
          <div class="mb-2">
            <label for="sizeSelect" class="form-label">سایز</label>
            <select class="form-select" id="sizeSelect" required>
              <option value="" disabled selected>انتخاب سایز</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
            </select>
          </div>
          <div class="mb-2">
            <label for="colorSelect" class="form-label">رنگ</label>
            <select class="form-select" id="colorSelect" required>
              <option value="" disabled selected>انتخاب رنگ</option>
              <option value="قرمز">قرمز</option>
              <option value="آبی">آبی</option>
              <option value="مشکی">مشکی</option>
              <option value="سفید">سفید</option>
            </select>
          </div>
          <div class="mb-2">
            <label for="quantityInput" class="form-label">تعداد</label>
            <p id="stockInfo" class="text-muted mb-2"></p>
            <div class="quantity-control">
              <input type="number" class="form-control text-center" id="quantityInput"
                     min="1" required>
              <div class="d-flex gap-2">
                <button type="button" class="quantity-btn plus" id="increaseQuantity">+</button>
                <button type="button" class="quantity-btn minus"
                        id="decreaseQuantity">-
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="button" class="btn btn-primary" id="confirmAddToCart">افزودن به سبد خرید</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Payment -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">پرداخت</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <form id="paymentForm">
          <div class="mb-2">
            <label for="paymentMethod" class="form-label">روش پرداخت</label>
            <select class="form-select" id="paymentMethod" required>
              <option value="" disabled selected>انتخاب روش پرداخت</option>
              <option value="cash">نقدی</option>
              <option value="card">کارت بانکی</option>
              <option value="online">پرداخت آنلاین</option>
            </select>
          </div>
          <div class="mb-2" id="cardDetails" style="display: none;">
            <label for="cardNumber" class="form-label">شماره کارت</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="شماره کارت">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="button" class="btn btn-primary" id="confirmPayment">تأیید پرداخت</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Adding New User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">افزودن کاربر جدید</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <form id="addUserForm">
          <div class="mb-2">
            <label for="userName" class="form-label">نام کاربر</label>
            <input type="text" class="form-control" id="userName" placeholder="نام کاربر" required>
          </div>
          <div class="mb-2">
            <label for="userPhone" class="form-label">شماره موبایل</label>
            <input type="tel" class="form-control" id="userPhone" placeholder="شماره موبایل" pattern="[0-9]{11}"
                   required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="button" class="btn btn-primary" id="confirmAddUser">افزودن کاربر</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Barcode Scan -->
<div class="modal fade" id="barcodeModal" tabindex="-1" aria-labelledby="barcodeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="barcodeModalLabel">اسکن بارکد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
      </div>
      <div class="modal-body">
        <p id="barcodeMessage">بارکد اسکن شد!</p>
        <p id="barcodeValue" class="text-muted"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="button" class="btn btn-primary" id="confirmBarcode">تأیید</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function persianToEnglishDigits(str) {
    return str.replace(/[۰-۹]/g, (d) => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d));
  }

  function toPersianDigits(str) {
    return str.replace(/\d/g, d => '۰۱۲۳۴۵۶۷۸۹'[d]);
  }

  function convertAllNumbersToPersian(node) {
    if (node.nodeType === 3) { // Text node
      node.nodeValue = toPersianDigits(node.nodeValue);
    } else {
      node.childNodes.forEach(convertAllNumbersToPersian);
    }
  }

  // Debounce function to limit the rate of function calls
  function debounce(func, wait) {
    let timeout;
    return function (...args) {
      clearTimeout(timeout);
      timeout = setTimeout(() => func.apply(this, args), wait);
    };
  }

  document.addEventListener('DOMContentLoaded', function () {
    try {
      // عناصر اصلی
      const sidebar = document.getElementById('sidebar');
      const sidebarToggle = document.getElementById('sidebarToggle');
      const mainContent = document.getElementById('mainContent');
      const productsContainer = document.getElementById('productsContainer');
      const cartSidebar = document.getElementById('cartSidebar');
      const cartItems = document.getElementById('cartItems');
      const cartSubtotal = document.getElementById('cartSubtotal');
      const cartDiscount = document.getElementById('cartDiscount');
      const cartFinalTotal = document.getElementById('cartFinalTotal');
      const productModal = new bootstrap.Modal(document.getElementById('productModal'));
      const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
      const barcodeModal = new bootstrap.Modal(document.getElementById('barcodeModal'));
      const productForm = document.getElementById('productForm');
      const sizeSelect = document.getElementById('sizeSelect');
      const colorSelect = document.getElementById('colorSelect');
      const quantityInput = document.getElementById('quantityInput');
      const stockInfo = document.getElementById('stockInfo');
      const confirmAddToCart = document.getElementById('confirmAddToCart');
      const barcodeInput = document.getElementById('barcodeInput');
      const barcodeTab = document.querySelector('.barcode-tab');
      const barcodeMessage = document.getElementById('barcodeMessage');
      const barcodeValue = document.getElementById('barcodeValue');
      const confirmBarcode = document.getElementById('confirmBarcode');
      const discountType = document.getElementById('discountType');
      const discountValue = document.getElementById('discountValue');
      const applyDiscount = document.getElementById('applyDiscount');
      const payButton = document.getElementById('payButton');
      const paymentForm = document.getElementById('paymentForm');
      const paymentMethod = document.getElementById('paymentMethod');
      const cardDetails = document.getElementById('cardDetails');
      const cardNumber = document.getElementById('cardNumber');
      const confirmPayment = document.getElementById('confirmPayment');
      const increaseQuantity = document.getElementById('increaseQuantity');
      const decreaseQuantity = document.getElementById('decreaseQuantity');
      const userSearch = document.getElementById('userSearch');
      const addUserBtn = document.getElementById('addUserBtn');
      const clearSearch = document.getElementById('clearSearch');
      const searchFeedback = document.getElementById('searchFeedback');
      const addUserModal = new bootstrap.Modal(document.getElementById('addUserModal'));
      const addUserForm = document.getElementById('addUserForm');
      const userNameInput = document.getElementById('userName');
      const userPhoneInput = document.getElementById('userPhone');
      const confirmAddUser = document.getElementById('confirmAddUser');
      const usersSelect = document.getElementById('users');
      const payCard = document.getElementById('payCard');
      const payCash = document.getElementById('payCash');
      const cardAmount = document.getElementById('cardAmount');
      const cashAmount = document.getElementById('cashAmount');

      let currentProduct = null;
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      let currentStock = 0;
      let discountAmount = 0;

      let users = JSON.parse(localStorage.getItem('users')) || [
        {id: 'user1', name: 'میثاق مومنی', phone: '09123456789'},
        {id: 'user2', name: 'علی فتوحی', phone: '09351234567'},
        {id: 'user3', name: 'محمد جواد کاظمی', phone: '09213456789'}
      ];

      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (isCollapsed) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
      }

      updateCart();

      sidebarToggle.addEventListener('click', toggleSidebar);

      // مدیریت کلیک روی آیتم‌های زیرمنو و آبشاری کردن
      document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function (e) {
          e.preventDefault();
          const parent = this.parentElement;
          const isOpen = parent.classList.contains('show');

          // بستن همه زیرمنوهای دیگر
          document.querySelectorAll('.dropdown-submenu').forEach(item => {
            if (item !== parent) {
              item.classList.remove('show');
            }
          });

          // تغییر وضعیت زیرمنوی فعلی
          parent.classList.toggle('show');

          // به‌روزرسانی حالت فعال
          if (!isOpen) {
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            this.classList.add('active');
          }
        });
      });

      document.addEventListener('click', function (e) {
        if (e.target.classList.contains('dropdown-item')) {
          const parentNavLink = e.target.closest('.dropdown-submenu').querySelector('.nav-link');
          document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
          parentNavLink.classList.add('active');
          document.querySelectorAll('.dropdown-item').forEach(item => item.classList.remove('active'));
          e.target.classList.add('active');
        }
      });

      function updateUsersSelect(filteredUsers = users, searchValue = '') {
        usersSelect.innerHTML = '';
        if (filteredUsers.length === 0) {
          usersSelect.innerHTML = '<option value="" disabled selected>هیچ کاربری یافت نشد</option>';
          searchFeedback.textContent = 'کاربری با این شماره یافت نشد.';
        } else {
          usersSelect.innerHTML = '<option value="" disabled selected>انتخاب کاربر</option>';
          filteredUsers.forEach(user => {
            const option = document.createElement('option');
            option.value = user.id;
            option.textContent = `${user.name} - ${toPersianDigits(user.phone)}`;
            if (searchValue && user.phone === searchValue) {
              option.classList.add('matched');
            }
            usersSelect.appendChild(option);
          });
          searchFeedback.textContent = filteredUsers.length === users.length ? '' : `${filteredUsers.length} کاربر یافت شد.`;
        }
      }

      function saveUsers() {
        localStorage.setItem('users', JSON.stringify(users));
      }

      updateUsersSelect();

      userSearch.addEventListener('input', function () {
        clearSearch.classList.toggle('show', userSearch.value.trim() !== '');
      });

      clearSearch.addEventListener('click', function () {
        userSearch.value = '';
        clearSearch.classList.remove('show');
        searchFeedback.textContent = '';
        updateUsersSelect();
      });

      payCard.addEventListener('change', function () {
        cardAmount.classList.toggle('show', payCard.checked);
        if (!payCard.checked) cardAmount.value = '';
      });

      payCash.addEventListener('change', function () {
        cashAmount.classList.toggle('show', payCash.checked);
        if (!payCash.checked) cashAmount.value = '';
      });

      barcodeTab.addEventListener('click', function () {
        const barcode = barcodeInput.value.trim();
        barcodeValue.textContent = barcode ? `کد بارکد: ${toPersianDigits(barcode)}` : 'هیچ بارکدی وارد نشده است.';
        barcodeModal.show();
      });

      confirmBarcode.addEventListener('click', function () {
        barcodeModal.hide();
      });

      document.addEventListener('click', function (e) {
        if (e.target.classList.contains('dropdown-item') && e.target.closest('.category-dropdown')) {
          handleCategorySelection(e.target);
        }
        const productCard = e.target.closest('.product-card');
        if (productCard) {
          e.preventDefault();
          showProductModal(productCard);
        }
      });

      barcodeInput.addEventListener('input', function () {
        const barcode = barcodeInput.value.trim();
        const productCards = document.querySelectorAll('#productsContainer .col');
        productCards.forEach(card => {
          const productNumber = card.querySelector('.product-number').textContent
            .replace('شماره محصول: ', '').trim();
          if (barcode === '' || productNumber.includes(barcode)) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      });

      function updateQuantityButtons() {
        const quantity = parseInt(quantityInput.value) || 1;
        decreaseQuantity.disabled = quantity <= 1;
        increaseQuantity.disabled = quantity >= currentStock;
      }

      increaseQuantity.addEventListener('click', function () {
        let quantity = parseInt(quantityInput.value) || 1;
        if (quantity < currentStock) {
          quantityInput.value = quantity + 1;
          updateQuantityButtons();
        }
      });

      decreaseQuantity.addEventListener('click', function () {
        let quantity = parseInt(quantityInput.value) || 1;
        if (quantity > 1) {
          quantityInput.value = quantity - 1;
          updateQuantityButtons();
        }
      });

      quantityInput.addEventListener('input', function () {
        let quantity = parseInt(quantityInput.value) || 1;
        if (quantity < 1) {
          quantityInput.value = 1;
        } else if (quantity > currentStock) {
          quantityInput.value = currentStock;
        }
        updateQuantityButtons();
      });

      confirmAddToCart.addEventListener('click', function () {
        if (productForm.checkValidity()) {
          const quantity = parseInt(quantityInput.value);
          if (quantity > currentStock) {
            alert(`تعداد انتخاب شده بیشتر از موجودی (${currentStock}) است!`);
            return;
          }
          addToCart();
          productModal.hide();
          productForm.reset();
          updateQuantityButtons();
        } else {
          productForm.reportValidity();
        }
      });

      cartItems.addEventListener('click', function (e) {
        if (e.target.classList.contains('cart-item-remove')) {
          const index = e.target.dataset.index;
          cart.splice(index, 1);
          localStorage.setItem('cart', JSON.stringify(cart));
          discountAmount = 0;
          updateCart();
        }
      });

      applyDiscount.addEventListener('click', function () {
        const value = parseFloat(discountValue.value);
        const type = discountType.value;
        const subtotal = calculateSubtotal();

        if (isNaN(value) || value < 0) {
          alert('لطفاً مقدار تخفیف معتبر وارد کنید!');
          return;
        }

        if (type === 'percentage') {
          if (value > 100) {
            alert('تخفیف درصدی نمی‌تواند بیشتر از ۱۰۰ باشد!');
            return;
          }
          discountAmount = subtotal * (value / 100);
        } else {
          if (value > subtotal) {
            alert('تخفیف نمی‌تواند بیشتر از جمع کل باشد!');
            return;
          }
          discountAmount = value;
        }

        alert(
          `تخفیف ${value.toLocaleString('fa-IR')} ${type === 'percentage' ? 'درصد' : 'تومان'} اعمال شد!`
        );
        updateCart();
      });

      payButton.addEventListener('click', function () {
        if (cart.length === 0) {
          alert('سبد خرید خالی است!');
          return;
        }

        const cardAmountValue = parseFloat(cardAmount.value) || 0;
        const cashAmountValue = parseFloat(cashAmount.value) || 0;
        const finalTotal = calculateSubtotal() - discountAmount;

        if (payCard.checked || payCash.checked) {
          if (!payCard.checked && !payCash.checked) {
            alert('لطفاً حداقل یک روش پرداخت انتخاب کنید!');
            return;
          }

          if (payCard.checked && cardAmountValue <= 0) {
            alert('لطفاً مبلغ پرداخت با کارت بانکی را وارد کنید!');
            return;
          }

          if (payCash.checked && cashAmountValue <= 0) {
            alert('لطفاً مبلغ پرداخت نقدی را وارد کنید!');
            return;
          }

          const totalPaid = cardAmountValue + cashAmountValue;
          if (totalPaid !== finalTotal) {
            alert(`مجموع مبالغ وارد شده (${totalPaid.toLocaleString('fa-IR')} تومان) با مبلغ قابل پرداخت (${finalTotal.toLocaleString('fa-IR')} تومان) مطابقت ندارد!`);
            return;
          }
        }

        paymentModal.show();
      });

      paymentMethod.addEventListener('change', function () {
        if (paymentMethod.value === 'card') {
          cardDetails.style.display = 'block';
        } else {
          cardDetails.style.display = 'none';
        }
      });

      confirmPayment.addEventListener('click', function () {
        if (paymentForm.checkValidity()) {
          if (paymentMethod.value === 'card' && !cardNumber.value.trim()) {
            alert('لطفاً شماره کارت را وارد کنید!');
            return;
          }
          alert('پرداخت با موفقیت انجام شد!');
          cart = [];
          discountAmount = 0;
          localStorage.setItem('cart', JSON.stringify(cart));
          updateCart();
          paymentModal.hide();
          paymentForm.reset();
          cardDetails.style.display = 'none';
          payCard.checked = false;
          payCash.checked = false;
          cardAmount.value = '';
          cashAmount.value = '';
          cardAmount.classList.remove('show');
          cashAmount.classList.remove('show');
        } else {
          paymentForm.reportValidity();
        }
      });

      const debouncedSearch = debounce(function () {
        const searchValue = persianToEnglishDigits(userSearch.value.trim());
        const filteredUsers = users.filter(user => user.phone.includes(searchValue));
        updateUsersSelect(filteredUsers, searchValue);
      }, 300);

      userSearch.addEventListener('input', debouncedSearch);

      addUserBtn.addEventListener('click', function () {
        addUserForm.reset();
        addUserModal.show();
      });

      confirmAddUser.addEventListener('click', function () {
        if (addUserForm.checkValidity()) {
          const name = userNameInput.value.trim();
          const phone = persianToEnglishDigits(userPhoneInput.value.trim());

          if (users.some(user => user.phone === phone)) {
            alert('کاربری با این شماره موبایل قبلاً ثبت شده است!');
            return;
          }

          const newUser = {
            id: `user${users.length + 1}`,
            name: name,
            phone: phone
          };

          users.push(newUser);
          saveUsers();
          updateUsersSelect();
          addUserModal.hide();
          alert('کاربر با موفقیت اضافه شد!');
        } else {
          addUserForm.reportValidity();
        }
      });

      function handleResponsive() {
        if (window.innerWidth <= 992) {
          sidebar.classList.remove('show-mobile', 'collapsed');
          mainContent.classList.remove('expanded');
        } else {
          if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
            mainContent.classList.add('expanded');
          } else {
            sidebar.classList.remove('collapsed');
            mainContent.classList.remove('expanded');
          }
        }
      }

      handleResponsive();
      window.addEventListener('resize', handleResponsive);

      function toggleSidebar() {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');
        localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
      }

      function handleCategorySelection(selectedItem) {
        const dropdownItems = document.querySelectorAll('.category-dropdown .dropdown-item');
        const selectedCategory = selectedItem.textContent.trim();
        const productCards = document.querySelectorAll('#productsContainer .col');

        dropdownItems.forEach(item => item.classList.remove('active'));
        selectedItem.classList.add('active');

        const dropdownToggle = document.getElementById('categoryDropdown');
        dropdownToggle.innerHTML = `<i class="bi bi-list-ul me-2"></i> ${selectedCategory}`;

        productCards.forEach(card => {
          const category = card.getAttribute('data-category')?.trim();
          if (selectedCategory === 'همه دسته‌بندی‌ها') {
            card.style.display = 'block';
          } else {
            card.style.display = (category === selectedCategory) ? 'block' : 'none';
          }
        });
      }

      function showProductModal(productCard) {
        currentProduct = productCard;
        const productName = productCard.querySelector('.card-title').textContent;
        document.getElementById('productModalLabel').textContent =
          `انتخاب مشخصات محصول: ${productName}`;

        currentStock = Math.floor(Math.random() * 10) + 1;
        stockInfo.textContent = `موجودی: ${currentStock} عدد`;
        quantityInput.max = currentStock;
        quantityInput.value = 1;
        updateQuantityButtons();

        productModal.show();
      }

      function addToCart() {
        const productName = currentProduct.querySelector('.card-title').textContent;
        const rawPriceText = currentProduct.querySelector('.card-text').textContent;
        const cleanPriceText = persianToEnglishDigits(rawPriceText.replace(/[^۰-۹]/g,
          ''));
        const productPrice = parseInt(cleanPriceText) || 0;
        const productImage = currentProduct.querySelector('.card-img-top').src;
        const size = sizeSelect.value;
        const color = colorSelect.value;
        const quantity = parseInt(quantityInput.value);

        const cartItem = {
          name: productName,
          price: productPrice,
          image: productImage,
          size: size,
          color: color,
          quantity: quantity
        };

        cart.push(cartItem);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
      }

      function calculateSubtotal() {
        return cart.reduce((total, item) => total + item.price * item.quantity, 0);
      }

      function updateCart() {
        cartItems.innerHTML = '';
        const subtotal = calculateSubtotal();
        const finalTotal = subtotal - discountAmount;

        cart.forEach((item, index) => {
          const itemPrice = item.price || 0;
          const itemQuantity = item.quantity || 0;
          const itemTotal = itemPrice * itemQuantity;

          cartItems.innerHTML += `
                            <div class="cart-item">
                                <img src="${item.image}" alt="${item.name}">
                                <div class="cart-item-details">
                                    <h6>${item.name}</h6>
                                    <p>سایز: ${item.size} | رنگ: ${item.color} | تعداد: ${itemQuantity}</p>
                                    <p>قیمت واحد: ${itemPrice.toLocaleString('fa-IR')} تومان</p>
                                    <p>جمع: ${itemTotal.toLocaleString('fa-IR')} تومان</p>
                                </div>
                                <i class="bi bi-trash cart-item-remove" data-index="${index}"></i>
                            </div>
                        `;
        });

        cartSubtotal.textContent = `جمع کل: ${subtotal.toLocaleString('fa-IR')} تومان`;
        cartDiscount.textContent = `تخفیف: ${discountAmount.toLocaleString('fa-IR')} تومان`;
        cartFinalTotal.textContent = `مبلغ قابل پرداخت : ${finalTotal.toLocaleString('fa-IR')} تومان`;
      }

      function saveUsers() {
        localStorage.setItem('users', JSON.stringify(users));
      }

    } catch (error) {
      console.error('خطا در اجرای اسکریپت:', error);
    }
  });

  window.addEventListener("DOMContentLoaded", () => {
    convertAllNumbersToPersian(document.body);
  });
</script>
</body>

</html>
