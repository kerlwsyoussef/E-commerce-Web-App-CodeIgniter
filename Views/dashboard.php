<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Include Font Awesome CSS -->

    <style>
        .container {
            margin-top: 5px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }
        h1, h2 {
            color: #007bff;
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 35px;
            line-height: 1.5;
        }
       
    </style>
</head>
<body>



<div class="container">
    <p class="lead" style="font-size: 24px; text-transform: uppercase; font-weight: bold;">Welcome, <?= esc($userData->firstname) ?> <?= esc($userData->lastname) ?>!</p>
</div>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        .btn-custom {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            border: none; /* Remove border */
        }
        .btn-custom:hover {
            background-color: #333; /* Darker black on hover */
            color: #fff; /* White text */
        }
        .btn-block-wide {
            display: block;
            width: 100%;
            margin-bottom: 10px; /* Space between buttons */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">MY ACCOUNT</h1>
        <p class="lead text-center">.</p>
        <div class="row">
            <div class="col-md-6">
                <h2>Profile</h2>
                <p>Manage your profile:</p>
                <ul class="list-unstyled">
                   
                    <li><a href="<?= base_url('dashboard/editProfile') ?>" class="btn btn-custom btn-block btn-block-wide">Edit Profile</a></li>
                    <li><a href="<?= base_url('dashboard/deleteProfile') ?>" class="btn btn-custom btn-block btn-block-wide">Delete Profile</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Orders</h2>
                <p>Manage your orders:</p>
                <a href="<?= base_url('dashboard/orders') ?>" class="btn btn-custom btn-block btn-block-wide">View Orders</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Wishlist</h2>
                <p>View and manage your wishlist:</p>
                <a href="<?= base_url('dashboard/wishlist') ?>" class="btn btn-custom btn-block btn-block-wide">View Wishlist</a>
            </div>
            <div class="col-md-6">
                <h2>Support</h2>
                <p>Contact customer support:</p>
                <a href="<?= base_url('dashboard/support') ?>" class="btn btn-custom btn-block btn-block-wide">Contact Support</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <a href="<?= base_url('dashboard/logout') ?>" class="btn btn-custom btn-block btn-block-wide">Logout</a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
