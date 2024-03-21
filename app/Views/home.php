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
            <div class="col-lg-12">
                <div class="site-heading-inline">
                    <div class="explore-category" style="width: 100%; text-align: center!important;">
                        <a href="javascript:void(0)" onclick="setAllAlbum()" class="active">All</a>
                        <?php foreach ($category as $c) : ?>
                            <a href="javascript:void(0)" onclick="setAlbum(<?= $c->id ?>)"><?= $c->name ?></a>
                        <?php endforeach; ?>

                    </div>
                    <div class="explore-category-sort">

                    </div>
                </div>
            </div>
        </div>
        <div id="konten">

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
            success: function(response) {

            }
        });
    }

    function setAllAlbum() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Home/getAllAlbum') ?>",
            dataType: "JSON",
            success: function(response) {
                let html = '';
                let html2 = '';
                for (let i = 0; i < response.album.length; i++) {
                    html += `
    <div class="item-wrap">
        <div style="margin-bottom: 40px;">
            <h2 class="site-title">${response.album[i].album_name}</h2>
            <div class="heading-divider"></div>
        </div>
        <div class="row">
        `;
                    for (let j = 0; j < response.photos.length; j++) {
                        if (response.album[i].id == response.photos[j].album_id) {
                            html += `
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="item">
                    <div class="item-img" style="max-height:200px;">
                        <a href="#"><img src="/uploads/${response.photos[j].location}" alt></a>
                    </div>
                    <div class="item-content">
                        <h4 class="item-title"><a href="#">${response.photos[j].photo_name}</a></h4>
                        <div class="item-info">
                            <div class="item-author">
                                <div class="item-author-img">
                                    <img src="/public/img/${response.album[i].avatar}" alt>
                                    <div class="item-author-badge">
                                        <img src="/public/img/shape/03.png" alt>
                                    </div>
                                </div>
                                <div class="item-author-content">
                                    <span>Creator</span>
                                    <a href="#">@${response.album[i].username}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-bottom">
                        <a href="javascript:void(0)" class="item-like"><i class="far fa-heart"  onclick="sendLike(${response.photos[j].id})"></i><span id="like-photo-${response.photos[j].id}">0</span></a>
                        <a href="javascript:void(0)" class="theme-btn btn-sm" onclick="setComment(${response.photos[j].id})">
                            <span class="far fa-comments"></span>
                        </a>
                    </div>
                </div>
            </div>
            `;
                        }
                    }
                    html += `
        </div>
    </div>`;
                }
                $("#konten").html(html);
                callGetCountLike(response.photos[0].id)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
    }

    setAllAlbum()

    let sesiLogin = <?= session()->has('isLogin') ? 'true' : 'false' ?>

    function sendComment() {
        if (sesiLogin == true) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/sendComment') ?>",
                data: {
                    photo_id: $("#photo-id").val(),
                    comment: $("#comment-type").val()
                },
                dataType: "JSON",
                success: function(response) {
                    $('#comment-type').val('')
                    callGetComment($("#photo-id").val())
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        } else {
            alert("Silahkan login dulu")
        }

    }

    function sendLike(pId) {
        if (sesiLogin == true) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('home/sendLike') ?>/" + pId,
                dataType: "JSON",
                success: function(response) {
                    callGetCountLike(pId);
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error); // Tampilkan error pada konsol
                    // Lakukan sesuatu dengan error jika diperlukan
                }
            });

        } else {
            alert("Silahkan login dulu")
        }

    }

    function callGetCountLike(pId) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('home/getCountLike') ?>/" + pId,
            dataType: "JSON",
            success: function(response) {
                console.log(response)
                $('#like-photo-' + pId + '').html(response.count)
            }
        });
    }

    function setComment(pId) {
        $('#modal-komentar').modal('show');
        $('#photo-id').val(pId);
        callGetComment(pId)

    }

    function callGetComment(pId) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('home/getComment') ?>/" + pId,
            dataType: "JSON",
            success: function(response) {
                html = ''
                for (let i = 0; i < response.comment.length; i++) {
                    html += `
                    <div class="item-info">
                                    <div class="item-author">
                                        <div class="item-author-img">
                                            <img src="/public/img/default.png" alt>
                                            <div class="item-author-badge">
                                                <img src="/public/img/shape/03.png" alt>
                                            </div>
                                        </div>
                                        <div class="item-author-content">
                                            <span>Creator</span>
                                            <a href="#">@${response.comment[i].username}</a>
                                        </div>

                                    </div>
                                    <div class="item-author-content">
                                        <span>${response.comment[i].created_at}</span>
                                    </div>
                                </div>
                                <p>
                                ${response.comment[i].comment}
                                </p>
                                <hr>
                    `
                }

                $('#message-comment').html(html)
            }
        });
    }
</script>
<?= $this->endSection() ?>