<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Profile</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        margin-bottom: 30px;
        text-align: center;
    }
    .btn {
        margin-right: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <h1>User Profile</h1>
    <p class="lead">Welcome, <?= $userData->firstname ?> <?= $userData->lastname ?>!</p>
    <p>Email: <?= $userData->email ?></p>
    <div class="text-center">
        <a href="<?= base_url('dashboard') ?>" class="btn btn-primary">Back to Dashboard</a>
        <a href="<?= base_url('dashboard/logout') ?>" class="btn btn-danger">Logout</a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
