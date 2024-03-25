<?= $this->extend('layouts/master_public') ?>

<?= $this->section('content') ?>

<div class="auth-area py-80">
    <div class="container">
        <div class="col-md-5 col-lg-4 mx-auto">
            <div class="auth-wrap">
                <!-- <div class="auth-header">
                    <img src="assets/img/logo/logo.png" class="logo-dark-mode" alt>
                    <img src="assets/img/logo/logo-dark.png" class="logo-light-mode" alt>
                    <p>Login with your netox account</p>
                </div> -->
                <div class="auth-form">
                    <?= $this->include('partials/msg_validation') ?>

                    <form action="<?= base_url('lupapassword') ?>" method="post">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="auth-btn">
                            <button type="submit" class="theme-btn"><span class="far fa-paper-plane"></span>Send Email</button>
                        </div>
                    </form>
                    <div class="auth-footer">
                        <div class="auth-social">
                            <!-- <span class="auth-divider">or</span>
                            <div class="auth-social-list d-block w-100">
                                <a href="javascript:void(0);" class="auth-gl w-100" id="google-sign-in-button"><i class="fab fa-google"></i>Sign In With Google</a>
                            </div>
                        </div> -->
                            <p>Already have an account? <a href="<?= base_url('login') ?>">Login.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>

    <?= $this->section('script') ?>
    <script>
        function checkLogin() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('login/ceklogin') ?>",
                data: $('#loginForm').serialize(),
                dataType: "JSON",
                success: function(response) {

                    if (response.message == 'success') {
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Login",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        if (response.role == "admin") {
                            setInterval(() => {
                                window.location.href = "<?= base_url("dashboard"); ?>"
                            }, 1500);
                        } else {
                            setInterval(() => {
                                window.location.href = "<?= base_url(""); ?>"
                            }, 1500);
                        }
                    } else if (response.message == 'failLogin') {
                        Swal.fire({
                            position: "top-center",
                            icon: "error",
                            title: "Username / Email tidak ditemukan!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else if (response.message == 'failPassword') {
                        Swal.fire({
                            position: "top-center",
                            icon: "danger",
                            title: "error",
                            text: "Password yang anda masukkan salah!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });

        }
    </script>
    <?= $this->endSection() ?>