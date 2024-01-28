<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="news">
    <title>MONITORING PICA <?= date('Y') ?></title>

    <!-- Favicon  -->
    <link rel="icon" href="/assets/images/Logo_PTPN4.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/interface/css/bootstrap.min.css">
    <link rel="stylesheet" href="/interface/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/interface/css/aos.css">
    <link rel="stylesheet" href="/interface/css/animate.css">
    <link rel="stylesheet" href="/interface/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/interface/css/owl.theme.default.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="/interface/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="/interface/js/jquery.min.js" type="text/javascript"></script>
    <script src="/interface/js/jquery.sticky.js" type="text/javascript"></script>
    <script src="/interface/js/typewrite.js"></script>
    <script src="https://fastly.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
        <!-- Tambahkan stylesheet DataTables -->

    <!-- DataTables CSS -->

    <?= $this->renderSection('css') ?>

    <style>
    .no-scrollbar::-webkit-scrollbar {
        width: 8px;
        height: 6px;
    }

    .no-scrollbar::-webkit-scrollbar-track {
        background-color: #f1f1f1;
        border-radius: 5px;
    }

    .no-scrollbar::-webkit-scrollbar-thumb {
        background-color: var(--tagify-dd-color-primary);
        border-radius: 5px;
    }

    .no-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #555;
        background-color: var(--primary-color);

    }
</style>
</head>
<body id="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid gx-5">
            <a class="navbar-brand" href="https://ptpn4.co.id">
                <span style="font-size:16px;" class="text-white">
                    <img style="height: 50px;width:auto; transform:translateY(-5px)" src="/interface/images/logo_n4.png" alt="Logo" srcset=""/> <span> &nbsp;MONITORING PICA </span>
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse overflow-auto no-scrollbar" id="navbarNav">
                <ul class="navbar-nav ms-lg-5 me-lg-auto">

                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link curpo click-scroll">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link curpo" href="<?= base_url('detail-pks') ?>">DETAIL PKS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link curpo" href="<?= base_url('pica-pks') ?>">PICA PKS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link curpo" href="<?= base_url('pica-cluster') ?>">PICA CLUSTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link curpo" href="<?= base_url('histori') ?>">HISTORI KINERJA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link curpo" href="<?= base_url('identifikasi-masalah') ?>">IDENTIFIKASI MASALAH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link curpo" href="<?= base_url('program-kerja') ?>">PROGRAM KERJA</a>
                    </li>
                </ul>
                <div class="">
                    <a href="/login" class="navbar-icon bi-person "></a>
                </div>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <hr class="mt-0 pt-0">
    <footer class="animated fadeInUp site-footer py-4">
        <div class="container-fluid">
            <div class="row justify-content-lg-start">
                <div class="col-12 d-flex flex-row justify-content-center justify-content-lg-evenly">
                    <div class="col-3">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img style="height: 80px;width:auto" src="/assets/images/Logo_PTPN4.png" alt="Logo" srcset="">
                        </a>
                    </div>
                    <div class="col-9 d-flex align-items-center">
                        <h4 class=" d-none d-lg-block text-dark text-start me-lg-2">
                            MONITORING PICA PTPN IV <?= date('Y') ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div style="bottom:1rem;right:1rem;box-shadow: 0px 1px 63px 3px rgba(125,125,125,0.8);
-webkit-box-shadow: 0px 1px 63px 3px rgba(125,125,125,0.8);
-moz-box-shadow: 0px 1px 63px 3px rgba(125,125,125,0.8);border-radius:50%" class="position-fixed">
        <a href="#top" class="navbar-icon bi-arrow-up smoothscroll"></a>
    </div>
    
    <script src="/interface/js/custom.js" type="text/javascript"></script>
    <script src="/interface/js/bootstrap.bundle.min.js"></script>
    <script src="/interface/js/aos.js"></script>
    <script src="/interface/js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        AOS.init();
        var notyf = new Notyf();
        <?php if ((session()->getFlashdata('message') !== NULL)) {
            echo session()->getFlashdata('message');
        } ?>
    </script>

    <?php $this->renderSection('script')?>
</body>

</html>