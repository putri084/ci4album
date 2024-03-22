<?= $this->extend('layouts/master_public') ?>

<?= $this->section('content') ?>
<div class="explore-area pb-70 pt-5">
    <div class="container-fluid px-lg-5 mx-lg-5">
        <div class="row">
        <div class="col-md-12">
                <div class="item">
                    <div class="item-img" >
                        <a href="<?=base_url() ?>detailfoto/<?= $url_title ?>"><img src="/uploads/<?= $location ?>" alt></a>
                    </div>
                    <div class="item-content">
                        <h4 class="item-title"><a href="#"><?= $photo_name ?></a></h4>
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
                                    <a href="#">@<?= $username ?></a>
                                </div>
                            </div>
                        </div>
                        <h4 class="item-title"><a href="#">Description</a></h4>
                        <div class="item-info">
                            <div class="item-author">
                                <p><?= $description ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="item-bottom">
                        <a href="javascript:void(0)" class="item-like"><i class="far fa-heart"  onclick="sendLike(<?= $id ?>)"></i><span id="like-photo-<?= $id ?>">0</span></a>
                        <a href="javascript:void(0)" class="theme-btn btn-sm" onclick="setComment(<?= $id ?>)">
                            <span class="far fa-comments"></span>
                        </a>
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