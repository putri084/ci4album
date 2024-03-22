<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>


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
            url: "<?= base_url('Home/getAllAlbumMe') ?>",
            dataType: "JSON",
            success: function(response) {
                let html = '';
                let html2 = '';
                for (let i = 0; i < response.album.length; i++) {
                    html += `
    <div class="item-wrap">
        <div style="margin-bottom: 40px;">
            <h2 class="site-title">${response.album[i].album_name}</h2>
           <span> <a href="javascript:void(0)" class="btn-sm btn-block w-100 text-center" onclick="setRemoveAlbum(${response.album[i].id})">
                            <span class="far fa-trash-alt"></span>
                        </a></span>
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
                    <a href="<?=base_url() ?>detailfoto/${response.photos[j].url_title}"><img src="/uploads/${response.photos[j].location}" alt></a>
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
                        <a href="javascript:void(0)" class="theme-btn theme-btn2 btn-sm btn-block w-100 text-center" onclick="setRemove(${response.photos[j].id})">
                            <span class="far fa-trash-alt"></span>
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

    function setRemove(pId) {
        if (sesiLogin) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Home/remove_photo') ?>/" + pId,
                dataType: "JSON",
                success: function(response) {
                    setAllAlbum()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data berhasil dihapus'
                    })
                }
            });
        } else {
            alert('Anda harus login terlebih dahulu')
        }
    
    }

    function setRemoveAlbum(AId) {
        if (sesiLogin) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Home/remove_album') ?>/" + AId,
                dataType: "JSON",
                success: function(response) {
                    setAllAlbum()
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data berhasil dihapus'
                    })
                }
            });
        } else {
            alert('Anda harus login terlebih dahulu')
        }
    }

</script>
<?= $this->endSection() ?>