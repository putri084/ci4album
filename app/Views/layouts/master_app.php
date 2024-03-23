<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?> | Gallery <?= date('Y') ?></title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="/assets/css/vendors_css.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
    <!-- Style-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/skin_color.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div id="loader" style="display: flex; justify-content: center; align-items: center;">
        <img style="height: 12rem;width:auto;" src="/interface/images/loading.gif" alt="">
    </div>
    <div class="wrapper">
        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                </a>
                <!-- Logo -->
                <a href="index-2.html" class="logo">
                    <!-- logo-->
                    <div class="logo-lg justify-content-center align-items-center">
                        <span class="light-logo text-bold"><img src="/assets/images/putri.png" class="p-2" style="margin-left:-20px;" alt="logo"></span>
                        <span class="dark-logo text-bold"><img src="/assets/images/putri.png" class="p-2" style="margin-left:-20px;" alt="logo"></span>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item d-md-none">
                            <a href="#" class="waves-effect waves-light nav-link push-btn" data-toggle="push-menu" role="button">
                                <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
                                <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                        </li>
                        <li class="btn-group d-lg-inline-flex d-none">
                            <div class="app-menu">
                                <div class="search-bx mx-5">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>


                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
                                <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <li class="user-body">
                                    <a class="dropdown-item" href="Profil"><i class="ti-user text-muted me-2"></i> Profile</a>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="ti-lock text-muted me-2"></i> Logout</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Control Sidebar Toggle Button -->

                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" id="themeSwitch" class="waves-effect waves-light" onclick="switchTheme()">
                                <i class="icon-Moon"><span class="path1"></span><span class="path2"></span></i>
                                <i class="icon-Sun" style="display: none; color: yellow;"><span class="path1"></span><span class="path2"></span></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">Dashboard</li>
                            <li>
                                <a href="dashboard">
                                    <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="category">
                                    <i class="fad fa-list"></i><span class="path1"></span><span class="path2"></span></i>
                                    <span>Data Cateegory</span>
                                </a>
                            </li>
                            <li>
                                <a href="users">
                                    <i class="fad fa-users"></i><span class="path1"></span><span class="path2"></span></i>
                                    <span>Data Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="album">
                                    <i class="fad fa-album"></i><span class="path1"></span><span class="path2"></span></i>
                                    <span>Data Album<span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="backup()">
                                    <i class="fad fa-database"></i><span class="path1"></span><span class="path2"></span></i>
                                    <span>Backup Database<span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="javascript:void(0)" onclick="restore()">
                                    <i class="fad fa-database"></i><span class="path1"></span><span class="path2"></span></i>
                                    <span>Restore Database<span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <?php if ($title == 'Dashboard') : ?>
                                <h3 class="page-title text-capitalize"><?= $title ?></h3>
                            <?php else : ?>
                                <h3 class="page-title text-capitalize">Data <?= $title ?></h3>
                            <?php endif; ?>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="fad fa-home"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                        <?php if ($title != 'Dashboard') : ?>
                                            <li class="breadcrumb-item active text-capitalize" aria-current="page">Data <?= $title ?></li>
                                        <?php endif; ?>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Main content -->

                <?= $this->renderSection('content') ?>

                <!-- /.content -->

            </div>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer text-center">
            &copy; <?= date('Y') ?> <a href="#"> APRILLIA GALLERY</a>. All Rights Reserved.
        </footer>

    </div>
    <!-- ./wrapper -->



    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="/assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="/assets/js/vendors.min.js"></script>
    <!-- EduAdmin App -->
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/theme_change.js"></script>
    <script src="/assets/js/pages/validation.js"></script>
    <script src="/assets/js/pages/form-validation.js"></script>
    <script>
        $(document).ready(function() {
            $('#loader').hide();
        });

        function backup() {
            $('#loader').show();
            $.ajax({
                url: '<?= base_url('Utility/doBackup') ?>',
                type: 'GET',
                success: function(response) {
                    $('#loader').hide();
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                error: function() {
                    $('#loader').hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Backup database gagal',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        }

        function restore() {
            $('#loader').show();
            $.ajax({
                url: '<?= base_url('Utility/doRestore') ?>',
                type: 'GET',
                success: function(response) {
                    $('#loader').hide();
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                error: function(xhr, status, error) {
                    $('#loader').hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Restore database gagal ' + xhr.responseJSON.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        }
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>