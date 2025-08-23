<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  <!-- W3.CSS for additional styling -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    
    .profile-page {
      padding: 40px 15px;
      background: #ffffff;
      min-height: 100vh;
      color: #111;
    }

    .profile-container {
      max-width: 800px;
      margin: auto;
      background: #f8f9fa;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .profile-container h1 {
      font-weight: 700;
      color: #111;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group label {
      font-weight: 600;
      color: #333;
    }

    .form-control {
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
      border-color: #000;
      box-shadow: 0 0 6px rgba(0,0,0,0.2);
      background-color: #fff;
      color: #000;
    }

    .btn-custom {
      background: #f39c12;
      border: none;
      color: #111;
      font-weight: 600;
      text-transform: uppercase;
      width: 100%;
      padding: 12px 0;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.3);
      transition: all 0.3s ease;
      font-size: 1.1rem;
    }

    .btn-custom:hover {
      background: #ffb347;
      transform: scale(1.05);
      color: #111;
    }

    .alert {
      border-radius: 10px;
      font-weight: 600;
      letter-spacing: 0.03em;
      max-width: 800px;
      margin: 0 auto 30px auto;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
      border: none;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: none;
    }

    .form-icon {
      font-size: 1.5rem;
      margin-right: 10px;
      color: #f39c12;
    }

  </style>

</head>
<body>

<div class="profile-page">
  <div class="profile-container">

    <p class="welcome-msg text-center mb-4">
      <i class="bi bi-person-circle form-icon"></i>
      Welcome, <?= esc($userData->firstname) ?> <?= esc($userData->lastname) ?>!
    </p>

    <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session('errors') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

  
    <form action="<?= base_url('dashboard/updateProfile') ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label for="firstname"><i class="bi bi-person-fill form-icon"></i>First Name:</label>
            <input
                type="text"
                class="form-control"
                id="firstname"
                name="firstname"
                value="<?= esc($userData->firstname) ?>"
                required
                autofocus
            >
        </div>
        <div class="form-group">
            <label for="lastname"><i class="bi bi-person-fill form-icon"></i>Last Name:</label>
            <input
                type="text"
                class="form-control"
                id="lastname"
                name="lastname"
                value="<?= esc($userData->lastname) ?>"
                required
            >
        </div>
        <div class="form-group">
            <label for="email"><i class="bi bi-envelope-fill form-icon"></i>Email:</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="<?= esc($userData->email) ?>"
                required
            >
        </div>
        <div class="form-group">
            <label for="password"><i class="bi bi-key-fill form-icon"></i>Password:</label>
            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
                placeholder="Enter new password"
            >
        </div>

        <button type="submit" class="btn btn-custom mt-3">Update Profile</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS dependencies (unchanged) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>


