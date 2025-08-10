<!-- reset_password_request.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <!-- W3CSS for additional styling -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
     

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        label {
            font-size: 1rem;
            font-weight: 600;
            color: #555;
        }

        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: #000000; /* Change to black */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #333333; /* Darken the button on hover */
        }

        .alert {
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Reset Your Password</h3>

                        <!-- Error Message Section -->
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger">
                                <p><?= $error; ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Validation Errors -->
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($validation->getErrors() as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Password Reset Form -->
                        <form method="post" action="<?= site_url('reset-password-request') ?>">
                            <div class="form-group">
                                <label for="email">Email Address:</label>
                                <input type="email" name="email" id="email" value="<?= old('email'); ?>" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Request Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Optional for interactivity) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
