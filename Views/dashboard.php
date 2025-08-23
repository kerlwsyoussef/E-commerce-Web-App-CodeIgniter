<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<!-- W3.CSS for additional styling -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  /* ========= DASHBOARD PAGE SCOPED ========= */
  .dashboard-page {
      padding: 40px 15px;
      background: #ffffff;
      min-height: 100vh;
      color: #111;
  }

  .dashboard-page .dashboard-container {
      max-width: 1200px;
      margin: auto;
      background: #f8f9fa;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.05);
  }

  /* Headings */
  .dashboard-page .dashboard-container h1,
  .dashboard-page .dashboard-container h2 {
      font-weight: 700;
      color: #111;
      margin-bottom: 20px;
  }

  /* Lead paragraph */
  .dashboard-page .dashboard-container p.lead {
      font-size: 1.2rem;
      color: #555;
      margin-bottom: 40px;
  }

  /* Welcome message */
  .dashboard-page .welcome-msg {
      font-size: 1.8rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 40px;
      color: #111;
  }

  /* Cards layout */
  .dashboard-page .dashboard-row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
  }

  .dashboard-page .card-section {
      background: #ffffff;
      border-radius: 12px;
      border: 1px solid #ddd;
      padding: 30px 20px;
      flex: 1 1 calc(25% - 20px);
      text-align: center;
      transition: all 0.3s ease;
      color: #111;
  }

  .dashboard-page .card-section i {
      font-size: 3rem;
      color: #f39c12;
      margin-bottom: 15px;
      transition: color 0.3s ease;
  }

  .dashboard-page .card-section h3 {
      margin-bottom: 10px;
      font-weight: 600;
  }

  .dashboard-page .card-section p {
      font-size: 0.95rem;
      color: #555;
      margin-bottom: 20px;
  }

  /* Card hover effects */
  .dashboard-page .card-section:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
  }

  .dashboard-page .card-section:hover i {
      color: #ffb347;
  }

  .dashboard-page .card-section:hover .btn-custom {
      background: #ffb347;
      color: #111;
      transform: scale(1.05);
  }

  /* Dashboard buttons only */
  .dashboard-page .btn-custom {
      background: #f39c12;
      border: none;
      color: #111;
      font-weight: 600;
      text-transform: uppercase;
      transition: all 0.3s ease;
  }

  /* Logout row */
  .dashboard-page .logout-row {
      margin-top: 50px;
      text-align: center;
  }

  
  </style>

  <title>Gamer Dashboard</title>
</head>
<body>
  <!-- Navbar is untouched -->

  <div class="dashboard-page">
    <div class="dashboard-container">
        <p class="welcome-msg">
          Welcome, <?= esc($userData->firstname) ?> <?= esc($userData->lastname) ?>!
        </p>

        <h1 class="text-center mb-5">MY ACCOUNT</h1>
        <p class="lead text-center mb-5">
          Manage your profile, orders, wishlist, and support easily.
        </p>

        <div class="dashboard-row">
    <div class="card-section">
        <i class="fa fa-user"></i>
        <h3>Edit Profile</h3>
        <p>Update your personal information and preferences.</p>
        <a href="<?= base_url('dashboard/editProfile') ?>" class="btn btn-custom btn-block">Edit Profile</a>
    </div>
    <div class="card-section">
        <i class="fa fa-user-times"></i>
        <h3>Delete Profile</h3>
        <p>Remove your profile permanently from the system.</p>
        <a href="<?= base_url('dashboard/deleteProfile') ?>" class="btn btn-custom btn-block">Delete Profile</a>
    </div>
    <div class="card-section">
        <i class="fa fa-shopping-bag"></i>
        <h3>Orders</h3>
        <p>View and track all your orders quickly.</p>
        <a href="<?= base_url('dashboard/orders') ?>" class="btn btn-custom btn-block">View Orders</a>
    </div>
    <div class="card-section">
        <i class="fa fa-heart"></i>
        <h3>Wishlist</h3>
        <p>Check and manage your wishlist items.</p>
        <a href="<?= base_url('dashboard/wishlist') ?>" class="btn btn-custom btn-block">View Wishlist</a>
    </div>
    <div class="card-section">
        <i class="fa fa-headphones"></i>
        <h3>Support</h3>
        <p>Contact customer support for help and queries.</p>
        <a href="<?= base_url('dashboard/support') ?>" class="btn btn-custom btn-block">Contact Support</a>
    </div>
</div>

<div class="row logout-row">
    <div class="col-md-4 offset-md-4">
        <a href="<?= base_url('dashboard/logout') ?>" class="btn btn-custom btn-block">
            <i class="fa fa-sign-out"></i> Logout
        </a>
    </div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

