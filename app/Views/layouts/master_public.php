<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from live.themewild.com/netox/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Feb 2024 10:53:30 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content>
    <meta name="keywords" content>

    <title>UKK APRIL</title>

    <link rel="icon" type="image/x-icon" href="/public/img/logo/favicon.png">

    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="/public/css/feather.min.css">
    <link rel="stylesheet" href="/public/css/animate.min.css">
    <link rel="stylesheet" href="/public/css/magnific-popup.min.css">
    <link rel="stylesheet" href="/public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/public/css/nice-select.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery Scrollbar Plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.css">
    <style>
        .item-bid-summary {
            max-height: 300px;
            /* Atur tinggi maksimum */
            overflow-y: auto;
            /* Biarkan konten scrollable jika melebihi tinggi maksimum */
        }
    </style>
</head>

<body>
    <?php if (session()->has('pesan')) : ?>
        <script>
            function errorSwal() {
                Swal.fire({
                    icon: 'error',
                    title: '<?= session()->getFlashdata('pesan') ?>',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
            errorSwal()
        </script>
    <?php endif; ?>

    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>


    <header class="header">
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid px-xl-5">
                    <a class="navbar-brand" href="index-2.html">
                        <img src="/public/img/logo/logo.png" class="logo-dark-mode" alt="logo">
                        <img src="/public/img/logo/logo-dark.png" class="logo-light-mode" alt="logo">
                    </a>

                    <div class="mobile-menu-right">
                        <div class="color-mode theme-mode-control">
                            <button type="button" class="nav-right-link light-btn"><i class="feather-sun"></i></button>
                            <button type="button" class="nav-right-link dark-btn"><i class="feather-moon"></i></button>
                        </div>
                        <div class="nav-notification dropdown">
                            <a href="#" class="nav-right-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-sign-in"></i>
                            </a>
                        </div>
                        <div class="nav-profile dropdown">
                            <a href="#" class="nav-profile-img" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/public/img/avatar/avatar.png" alt>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="#" class="d-block">
                                        <div class="profile-balance">
                                            <div class="profile-balance-img">
                                                <img src="/public/img/icon/coin.svg" alt>
                                            </div>
                                            <div class="profile-balance-content">
                                                <h6>Balance</h6>
                                                <span>45.25 ETH</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <span class="profile-text">Welcome! <span>John B. Wilson</span></span>
                                    <div class="profile-wallet copy-box">
                                        <span class="copy-text">452wqrwertew34353dfgr12</span>
                                        <button type="button" class="copy-btn"><i class="far fa-copy"></i></button>
                                        <span class="copy-notify">Copied!</span>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="far fa-user-tie"></i>My Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="far fa-fill-drip"></i>Manage Items </a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="far fa-cog"></i>Account Setting</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" id=""><i class="far fa-sign-out"></i>Log Out</a></li>
                            </ul>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-mobile-icon"><i class="feather-menu"></i></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse mx-4">
                        <ul class="d-flex justify-content-center align-item-center">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Explore</a></li>
                            <?php if (session()->has('id')) : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('my-photos') ?>">My Photos</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('add-photo') ?>">Add Photo</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('add-album') ?>">Add Album</a></li>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'admin') : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse mx-4" style="justify-content: flex-end;">
                        <div class="nav-right">
                            <div class="nav-right-btn ">
                                <a href="<?= base_url('login') ?>" class="theme-btn">
                                    <?php
                                    if (session()->has('id')) {
                                        echo session()->get('fullname');
                                    } else {
                                        echo '<span class="far fa-sign-in"></span>Login';
                                    }
                                    ?>
                                </a>
                                <?php if (session()->has('id')) : ?>
                                    <a href="<?= base_url('logout') ?>" class="theme-btn theme-btn2">Logout</a>
                                <?php endif; ?>
                            </div>

                            <div class="nav-profile dropdown">
                                <a href="#" class="nav-profile-img" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= session()->get('photoUrl') ?>" alt>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <span class="profile-text">Welcome! <span><?= session()->get('fullname') ?></span></span>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <li><a class="dropdown-item" href="javascript:void(0);" id="logout-button"><i class="far fa-sign-out"></i>Log Out</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="color-mode theme-mode-control">
                                <button type="button" class="nav-right-link light-btn"><i class="feather-sun"></i></button>
                                <button type="button" class="nav-right-link dark-btn"><i class="feather-moon"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="main">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer-area">
        <div class="container-fluid px-lg-5">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p class="copyright-text">
                            &copy; Copyright <span id="date"></span> <a href="#"> Aprillia Gallery </a> All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ul class="footer-menu">
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Terms Of Services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>


    <div class="modal fade item-bid-modal" id="modal-komentar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-xmark"></i></button>
                <div class="modal-body">
                    <div class="item-bid-form">
                        <h4>Tambah Komentar</h4>
                        <form action="#" id="komentar">
                            <input type="hidden" id="photo-id">
                            <input type="hidden" name="user_id" value="<?= session()->get('id') ?>">
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="comment" id="comment-type" placeholder="Masukkan komentar..."></textarea>
                            </div>
                            <div class="item-bid-summary" id="message-comment">

                            </div>
                            <div class="text-center mt-40">
                                <button class="theme-btn" type="button" onclick="sendComment()"><span class="far fa-paper-plane"></span>
                                    Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/public/js/jquery-3.6.0.min.js"></script>
    <script src="/public/js/modernizr.min.js"></script>
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/imagesloaded.pkgd.min.js"></script>
    <script src="/public/js/jquery.magnific-popup.min.js"></script>
    <script src="/public/js/isotope.pkgd.min.js"></script>
    <script src="/public/js/jquery.appear.min.js"></script>
    <script src="/public/js/jquery.easing.min.js"></script>
    <script src="/public/js/owl.carousel.min.js"></script>
    <script src="/public/js/counter-up.js"></script>
    <script src="/public/js/wow.min.js"></script>
    <script src="/public/js/countdown.min.js"></script>
    <script src="/public/js/jquery.nice-select.min.js"></script>
    <script src="/public/js/main.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.item-bid-summary').scrollbar(); // Inisialisasi scrollbar menggunakan plugin jQuery
        });
    </script>
    <?= $this->renderSection('script') ?>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-analytics.js";

        import {
            getAuth,
            GoogleAuthProvider,
            signInWithPopup
        } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";

        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyC15yEZsXi0VddSrvJ7ZpUG-xwqPqRFi4U",
            authDomain: "ukk-aprillia.firebaseapp.com",
            projectId: "ukk-aprillia",
            storageBucket: "ukk-aprillia.appspot.com",
            messagingSenderId: "210032824670",
            appId: "1:210032824670:web:4aafcfb2f43f7acde8ffcf",
            measurementId: "G-5PCSVHTZSK"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);

        // Mendapatkan instance auth
        const auth = getAuth();

        // Mendefinisikan provider Google
        const provider = new GoogleAuthProvider();

        // Menambahkan event listener pada tombol login Google
        document.getElementById('google-sign-in-button').addEventListener('click', async () => {
            try {
                // Melakukan sign in dengan popup Google
                const result = await signInWithPopup(auth, provider);
                const userData = {
                    displayName: result.user.displayName,
                    email: result.user.email,
                    photoUrl: result.user.photoURL
                };
                console.log(userData)
                // Mengirim data user ke PHP menggunakan AJAX
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= base_url("login/set_google_session") ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log('Session user telah di set.');
                        } else {
                            console.error('Gagal mengatur session user.');
                        }
                    }
                };
                xhr.send(JSON.stringify(userData));

            } catch (error) {
                console.error(error);
            }
        });

        // Menambahkan event listener pada tombol logout (atau tempat yang sesuai)
        document.getElementById('logout-button').addEventListener('click', async () => {
            try {
                // Melakukan sign out dari Firebase Authentication
                await signOut(auth);
                console.log('User has been signed out.');
            } catch (error) {
                console.error(error);
            }
        });
    </script>
</body>


</html>