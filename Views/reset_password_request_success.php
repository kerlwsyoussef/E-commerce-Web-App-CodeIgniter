


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">Password Reset Request Sent</h3>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <p class="text-center">
                        We've sent a password reset link to your email address. 
                        Please check your inbox (and spam/junk folder) for an email from us.
                    </p>
                    
                    <div class="text-center">
                        <p>The reset link will expire in 2 hours.</p>
                        <p>
                            Didn't receive an email? 
                            <a href="<?= site_url('reset-password-request') ?>">Try again</a>
                            or contact support.
                        </p>
                    </div>

                    <div class="text-center mt-4">
                        <a href="<?= site_url('login') ?>" class="btn btn-primary">
                            Return to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>