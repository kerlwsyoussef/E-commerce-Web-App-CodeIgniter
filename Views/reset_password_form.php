<!-- reset_password_form.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <!-- Bootstrap CSS for layout and styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-body {
            padding: 2rem;
        }

        h2 {
            font-size: 1.75rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        label {
            font-size: 1rem;
            font-weight: 600;
            color: #555;
        }

        input[type="password"] {
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
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2>Reset Your Password</h2>

               

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
                <form action="<?= base_url('update-password/' . $token) ?>" method="post">
    <?= csrf_field() ?>
    
    <div>
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirm">Confirm Password</label>
        <input type="password" name="password_confirm" id="password_confirm" required>
    </div>
    
    <!-- Show validation errors if any -->
    <?php if (isset($validation)): ?>
        <div class="errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    
    <button type="submit">Reset Password</button>
</form>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
