<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>

<div class="hero-section">
    <div class="shape">
        <div class="shape-1"></div>
        <div class="shape-2"></div>
        <div class="shape-3"></div>
    </div>
    <div class="hero-single">
        <div class="container-fluid px-lg-5">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="hero-content">
                        <h6 style="font-size: 16px;" class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
                            Discover, Collect And Share your moments</h6>
                        <h1 style="font-size:40px;" class="hero-title" data-animation="fadeInLeft" data-delay=".50s">
                            Discover Rare <span>Digital Art</span> And Collect Memories Forever!
                        </h1>
                        <p data-animation="fadeInRight" data-delay="1s">
                            Easily explore your photo collection with our engaging gallery app. Discover the beauty in every image, enhance your photo experience, and frame unforgettable moments with the new features we present.
                        </p>
                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1.25s">
                            <a href="#" class="theme-btn"><span class="far fa-paper-plane"></span>Explore
                                More</a>
                            <a href="#" class="theme-btn theme-btn2"><span class="far fa-pen-swirl"></span>Create Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="hero-img hero-img-ani-2">
                        <img src="/public/img/hero/hero-img.png" alt>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="explore-area pb-70">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="site-heading-inline">
                    <div>
                        <h2 class="site-title">Explore</h2>
                        <div class="heading-divider"></div>
                    </div>
                    <div class="explore-category">
                        <a href="#" class="active">All</a>
                        <?php foreach ($category as $c) : ?>
                            <a href="javascript:void(0)" onclick="setAlbum(<?= $c->id ?>)"><?= $c->name ?></a>
                        <?php endforeach; ?>

                    </div>
                    <div class="explore-category-sort">

                    </div>
                </div>
            </div>
        </div>
        <div class="item-wrap">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="item-top">
                            <div class="item-bid">
                                <div class="item-bid-img">
                                    <a href="#"><img src="/public/img/user/04.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/05.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/06.jpg" alt></a>
                                </div>
                                <h5>10 + Place Bid</h5>
                            </div>
                            <div class="item-option">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="far fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="far fa-flag"></i>
                                                Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item-img">
                            <a href="#"><img src="/public/img/item/11.jpg" alt></a>
                        </div>
                        <div class="item-content">
                            <h4 class="item-title"><a href="#">Modern Abstract Painting</a></h4>
                            <div class="item-info">
                                <div class="item-author">
                                    <div class="item-author-img">
                                        <img src="/public/img/user/14.jpg" alt>
                                        <div class="item-author-badge">
                                            <img src="/public/img/shape/03.png" alt>
                                        </div>
                                    </div>
                                    <div class="item-author-content">
                                        <span>Creator</span>
                                        <a href="#">@morgan28</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item-bottom">
                            <a href="#" class="item-like"><i class="far fa-heart"></i>1.25k</a>
                            <a href="#" class="theme-btn btn-sm" data-bs-toggle="modal" data-bs-target="#placebid">
                                <span class="far fa-comments"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="item-top">
                            <div class="item-bid">
                                <div class="item-bid-img">
                                    <a href="#"><img src="/public/img/user/07.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/08.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/09.jpg" alt></a>
                                </div>
                                <h5>10 + Place Bid</h5>
                            </div>
                            <div class="item-option">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="far fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="far fa-flag"></i>
                                                Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item-img">
                            <a href="#"><img src="/public/img/item/12.jpg" alt></a>
                        </div>
                        <div class="item-content">
                            <h4 class="item-title"><a href="#">Modern Abstract Painting</a></h4>
                            <div class="item-info">
                                <div class="item-author">
                                    <div class="item-author-img">
                                        <img src="/public/img/user/15.jpg" alt>
                                        <div class="item-author-badge">
                                            <img src="/public/img/shape/03.png" alt>
                                        </div>
                                    </div>
                                    <div class="item-author-content">
                                        <span>Creator</span>
                                        <a href="#">@morgan28</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item-bottom">
                            <a href="#" class="item-like"><i class="far fa-heart"></i>1.25k</a>
                            <a href="#" class="theme-btn btn-sm" data-bs-toggle="modal" data-bs-target="#placebid">
                                <span class="far fa-comments"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="item-top">
                            <div class="item-bid">
                                <div class="item-bid-img">
                                    <a href="#"><img src="/public/img/user/10.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/11.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/12.jpg" alt></a>
                                </div>
                                <h5>10 + Place Bid</h5>
                            </div>
                            <div class="item-option">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="far fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="far fa-flag"></i>
                                                Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item-img">
                            <a href="#"><img src="/public/img/item/13.jpg" alt></a>
                        </div>
                        <div class="item-content">
                            <h4 class="item-title"><a href="#">Modern Abstract Painting</a></h4>
                            <div class="item-info">
                                <div class="item-author">
                                    <div class="item-author-img">
                                        <img src="/public/img/user/16.jpg" alt>
                                        <div class="item-author-badge">
                                            <img src="/public/img/shape/03.png" alt>
                                        </div>
                                    </div>
                                    <div class="item-author-content">
                                        <span>Creator</span>
                                        <a href="#">@morgan28</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item-bottom">
                            <a href="#" class="item-like"><i class="far fa-heart"></i>1.25k</a>
                            <a href="#" class="theme-btn btn-sm" data-bs-toggle="modal" data-bs-target="#placebid">
                                <span class="far fa-comments"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="item-top">
                            <div class="item-bid">
                                <div class="item-bid-img">
                                    <a href="#"><img src="/public/img/user/01.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/02.jpg" alt></a>
                                    <a href="#"><img src="/public/img/user/03.jpg" alt></a>
                                </div>
                                <h5>10 + Place Bid</h5>
                            </div>
                            <div class="item-option">
                                <div class="dropdown">
                                    <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="far fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="far fa-share-alt"></i>
                                                Share</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="far fa-flag"></i>
                                                Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item-img">
                            <a href="#"><img src="/public/img/item/17.jpg" alt></a>
                        </div>
                        <div class="item-content">
                            <h4 class="item-title"><a href="#">Modern Abstract Painting</a></h4>
                            <div class="item-info">
                                <div class="item-author">
                                    <div class="item-author-img">
                                        <img src="/public/img/user/17.jpg" alt>
                                        <div class="item-author-badge">
                                            <img src="/public/img/shape/03.png" alt>
                                        </div>
                                    </div>
                                    <div class="item-author-content">
                                        <span>Creator</span>
                                        <a href="#">@morgan28</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item-bottom">
                            <a href="#" class="item-like"><i class="far fa-heart"></i>1.25k</a>
                            <a href="#" class="theme-btn btn-sm" data-bs-toggle="modal" data-bs-target="#placebid">
                                <span class="far fa-comments"></span>
                            </a>
                        </div>
                    </div>
                        </div>
            </div>
            <div class="col-12">
                <div class="explore-btn">
                    <a href="#" class="theme-btn"><span class="far fa-arrow-rotate-right"></span>View All
                        Items</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area pb-80">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h2 class="site-title">Latest News <span>Update & Blog</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="/public/img/blog/01.jpg" alt="Thumb">
                        <div class="blog-date"><i class="fal fa-calendar-alt"></i> Jan 02, 2024</div>
                    </div>
                    <div class="blog-info">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-tag"></i> Digital</a></li>
                                <li><a href="#"><i class="far fa-user"></i> By Alicia Davis</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="#">There are many variations passage fact that suffered available.</a>
                        </h4>
                        <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="/public/img/blog/02.jpg" alt="Thumb">
                        <div class="blog-date"><i class="fal fa-calendar-alt"></i> Jan 02, 2024</div>
                    </div>
                    <div class="blog-info">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-tag"></i> Digital</a></li>
                                <li><a href="#"><i class="far fa-user"></i> By Alicia Davis</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="#">There are many variations passage fact that suffered available.</a>
                        </h4>
                        <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="/public/img/blog/03.jpg" alt="Thumb">
                        <div class="blog-date"><i class="fal fa-calendar-alt"></i> Jan 02, 2024</div>
                    </div>
                    <div class="blog-info">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#"><i class="far fa-tag"></i> Digital</a></li>
                                <li><a href="#"><i class="far fa-user"></i> By Alicia Davis</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                        <h4 class="blog-title">
                            <a href="#">There are many variations passage fact that suffered available.</a>
                        </h4>
                        <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    function setAlbum(cat_id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('getAlbumByCategory') ?>/" + cat_id,
            dataType: "JSON ",
            success: function (response) {
                
            }
        });
    }
</script>
<?= $this->endSection() ?>
