<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astonic Sports - Admin Dashboard</title>
  <link rel="stylesheet" href="admin_style.css">
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <nav class="sidebar">
      <div class="logo">
        <img src="astonic sports logo.png" alt="Astonic Sports Logo" class="brand-logo">
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
            <p>$12,340</p>
          </div>
          <div class="card">
            <h4>Active Users</h4>
            <p>1,234</p>
          </div>
          <div class="card">
            <h4>Products in Stock</h4>
            <p>567</p>
          </div>
        </div>
      </section>

      <!-- Other Sections -->
      <section id="userManagement" class="section hidden">
        <h3>User Management</h3>
        <p>List of users will be displayed here.</p>
      </section>
      <section id="productManagement" class="section hidden">
        <h3>Product Management</h3>
        <p>List of products will be displayed here.</p>
      </section>
      <section id="orders" class="section hidden">
        <h3>Orders</h3>
        <p>Order details will be displayed here.</p>
      </section>
      <section id="inventory" class="section hidden">
        <h3>Inventory</h3>
        <p>Inventory management tools will be here.</p>
      </section>
    </div>
  </div>

  <script src="admin_script.js"></script>
</body>
</html>
