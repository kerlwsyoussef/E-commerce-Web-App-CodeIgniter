<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
    <style>
        .container {
            margin-top: 50px;
        }
        h1, h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        .btn-primary, .btn-secondary, .btn-danger {
            margin-right: 10px;
            background-color: black; /* Change background color to black */
            color: white; /* Change text color to white */
            border: none; /* Remove any border */
        }
    </style>
</head>
<body>
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

    <div class="container">
        <h1>Edit Profile</h1>
        <form action="<?= base_url('dashboard/updateProfile') ?>" method="post">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= esc($userData->firstname) ?>" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= esc($userData->lastname) ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc($userData->email) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
