<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>
<!-- <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
    <div class="container">
        <h2 class="breadcrumb-title">Register</h2>
        <ul class="breadcrumb-menu">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Register</li>
        </ul>
    </div>
</div> -->


<div class="auth-area py-80">
    <div class="container">
        <div class="col-md-5 col-lg-6 mx-auto">
            <div class="auth-wrap">
                <!-- <div class="auth-header">
                    <img src="assets/img/logo/logo.png" class="logo-dark-mode" alt>
                    <img src="assets/img/logo/logo-dark.png" class="logo-light-mode" alt>
                    <p>Create your netox account</p>
                </div> -->
                <div class="auth-form">
                    <form id="registerForm" action="#">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Your Username">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" placeholder="Your Address" id="floatingTextarea"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Your Password">
                        </div>
                        <div class="auth-check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value id="agree">
                                <label class="form-check-label" for="agree">
                                    I agree with the <a href="#">Terms Of Service.</a>
                                </label>
                            </div>
                        </div>
                        <div class="auth-btn">
                            <button type="button" onclick="register()" class="theme-btn"><span class="far fa-paper-plane"></span>Sign
                                Up</button>
                        </div>
                    </form>
                    <div class="auth-footer">
                        <p>Already have an account? <a href="<?= base_url('login') ?>">Sign In.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    function register() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('register/add') ?>",
            data: $('#registerForm').serialize(),
            dataType: "JSON",
            success: function(response) {

                if (response.message == 'success') {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Berhasil Registrasi",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    setInterval(() => {
                        window.location.href = "<?= base_url(""); ?>"
                    }, 1500);

                }
            }
        });

    }
</script>
<?= $this->endSection() ?>