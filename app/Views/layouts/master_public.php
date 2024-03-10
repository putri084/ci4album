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
</head>

<body>

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
                        <div class="nav-search-wrap">
                            <div class="search-btn">
                                <button type="button" class="nav-right-link search-box-outer"><i class="feather-search"></i></button>
                            </div>

                            <div class="search-area">
                                <form action="#">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Type Keyword...">
                                        <button type="submit" class="search-icon-btn"><i class="feather-search"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
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

                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul style="width:55%;">
                            <li class="nav-item" style="padding-left: 20px;"><a class="nav-link" href="contact.html">Explore</a></li>
                        </ul>
                        <div class="nav-right">
                            <div class="nav-right-search">
                                <div class="search-form">
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Type keyword...">
                                            <button type="button"><i class="feather-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="nav-right-btn">
                                <a href="#" class="theme-btn"><span class="far fa-sign-in"></span>Login</a>
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
                                    <li><a class="dropdown-item" href="#"><i class="far fa-user-tie"></i>My Profile</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="far fa-cog"></i>Account Setting</a>
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


    <div class="modal fade item-bid-modal" id="placebid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-xmark"></i></button>
                <div class="modal-body">
                    <div class="item-bid-form">
                        <h4>Place A Bid</h4>
                        <form action="#">
                            <p>You Must Bid At Least <span>25.50 ETH</span></p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="00.00 ETH">
                            </div>
                            <p>Your Bid Quantity (<span>10 Available</span>)</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="1">
                            </div>
                            <div class="item-bid-summary">
                                <div class="summary-item">
                                    <span>Minimum Bid Amount:</span>
                                    <strong>25.60 ETH</strong>
                                </div>
                                <div class="summary-item">
                                    <span>Service Fee:</span>
                                    <strong>5.50 ETH</strong>
                                </div>
                                <div class="summary-item">
                                    <span>Total Bid Amount:</span>
                                    <strong>31.00 ETH</strong>
                                </div>
                            </div>
                            <div class="text-center mt-40">
                                <button class="theme-btn" type="submit"><span class="far fa-shopping-bag"></span>
                                    Confirm Bid</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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