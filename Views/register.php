<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Include Font Awesome CSS -->

    <style>
        /* Custom CSS styles can go here if needed */
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Register</h3>
                    <hr>
                    <?php if (session()->get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?= set_value('firstname') ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?= set_value('lastname') ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password">
                        </div>
                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-dark btn-block">Register</button> <!-- Added btn-dark class for black button -->
                    </form>
                    <div class="text-center mt-3">
                        <a href="/public/login">Already have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
