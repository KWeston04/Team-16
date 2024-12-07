<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports - Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Arial', sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      color: #2c3e50;
      background-color: #f4f4f9;
    }

    .dashboard {
      display: flex;
      width: 100%;
    }

    .sidebar {
      width: 250px;
      background-color: #34495e;
      color: white;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      transition: transform 0.3s ease-in-out;
    }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .sidebar .logo {
      display: flex;
      align-items: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .brand-logo {
      height: 40px;
      margin-right: 10px;
    }

    .sidebar .logo h1 {
      font-size: 24px;
      color: white;
    }

    .sidebar ul {
      list-style: none;
      width: 100%;
    }

    .sidebar ul li {
      margin-bottom: 20px;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }

    .sidebar ul li a:hover {
      color: #5dade2;
    }

    .main-content {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      background-color: white;
      box-shadow: -5px 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    header h2 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #34495e;
    }

    header p {
      color: #7f8c8d;
    }

    .cards {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .card {
      background-color: #ecf0f1;
      padding: 20px;
      flex: 1;
      min-width: 200px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .section {
      margin-top: 20px;
      padding: 20px;
      background-color: #ecf0f1;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .section h3 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #2c3e50;
    }

    .placeholder-box {
      background-color: #bdc3c7;
      height: 150px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 18px;
      font-weight: bold;
    }

    .graph-card {
      background-color: #ecf0f1;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    canvas {
      max-width: 100%;
      height: auto;
    }

    .toggle-btn {
      display: none;
      background-color: #34495e;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 20px;
      border-radius: 5px;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        display: none;
      }

      .toggle-btn {
        display: block;
      }

      .cards {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
      <div class="logo">
        <img src="{{ asset('images/astonic_sports_logo.png') }}" alt="Astonic Sports Logo" class="brand-logo">
        <h1>Astonic Sports</h1>
      </div>
      <ul>
        <li><a href="#" onclick="showSection('dashboard')">Dashboard</a></li>
        <li><a href="#" onclick="showSection('userManagement')">User Management</a></li>
        <li><a href="#" onclick="showSection('productManagement')">Product Management</a></li>
        <li><a href="#" onclick="showSection('orders')">Orders</a></li>
        <li><a href="#" onclick="showSection('inventory')">Inventory</a></li>
      </ul>
    </nav>

    <div class="main-content">
      <button class="toggle-btn" onclick="toggleSidebar()">☰ Toggle Menu</button>
      <header>
        <h2>Admin Dashboard</h2>
        <p>Welcome to Astonic Sports Admin Panel</p>
      </header>

      <!-- Dashboard -->
      <section id="dashboard" class="section">
        <h3>Overview</h3>
        <div class="cards">
          <div class="card">
            <h4>Total Sales</h4>
            <p id="total-sales">$12,340</p>
          </div>
          <div class="card">
            <h4>Active Users</h4>
            <p id="active-users">1,234</p>
          </div>
          <div class="card">
            <h4>Products in Stock</h4>
            <p id="products-stock">567</p>
          </div>
        </div>

        <!-- Sales Graph -->
        <div class="graph-card">
          <h3>Sales Overview</h3>
          <canvas id="salesChart"></canvas>
        </div>
      </section>

      <!-- User Management -->
      <section id="userManagement" class="section hidden">
        <h3>User Management</h3>
        <div class="placeholder-box">User Data</div>
      </section>

      <!-- Product Management -->
      <section id="productManagement" class="section hidden">
        <h3>Product Management</h3>
        <div class="placeholder-box">Product Listings</div>
      </section>

      <!-- Orders -->
      <section id="orders" class="section hidden">
        <h3>Orders</h3>
        <div class="placeholder-box">Order Details</div>
      </section>

      <!-- Inventory -->
      <section id="inventory" class="section hidden">
        <h3>Inventory</h3>
        <div class="placeholder-box">Inventory Data</div>
      </section>
    </div>
  </div>

  
  <script src="{{ asset('js/admin_java.js') }}"></script>
</body>
</html>
