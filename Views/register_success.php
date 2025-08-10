<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


<!-- register_success.php -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-light">
                <div class="card-header text-center bg-success text-white">
                    <h3><i class="fas fa-check-circle"></i> Registration Successful!</h3>
                </div>
                <div class="card-body">
                    <p class="lead">Thank you for registering! A verification email has been sent to your email address. Please check your inbox and follow the instructions to verify your email and activate your account.</p>
                    <p>If you don't see the email in your inbox, please check your spam/junk folder.</p>
                    <p class="text-muted">You will be redirected to the login page shortly...</p>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" disabled>Redirecting...</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Redirect to the login page after 5 seconds
        setTimeout(function() {
            window.location.href = "<?= site_url('login'); ?>";
        }, 5000);
    </script>
</div>

<!-- Add some custom styles (optional) -->
<style>
    .card {
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0;
    }
    .card-footer {
        border-radius: 0 0 10px 10px;
    }
    .container {
        max-width: 800px;
    }
</style>
