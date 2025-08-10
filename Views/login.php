<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Login</h3>
                    <br>
                    <form action="/public/login" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                        <?php if (isset($error)) : ?>
                            <p class="text-danger"><?= $error ?></p>
                        <?php endif; ?>
                        <?php if (isset($validation)) : ?>
                            <div class="text-danger"><?= $validation->listErrors() ?></div>
                        <?php endif; ?>
                    </form>
                    <div class="text-center mt-3">
                        <a href="/public/register">Don't have an account?</a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/public/reset-password-request">Forgot your password?</a> <!-- Added password reset link -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

