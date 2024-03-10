<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>
<div class="create-area py-80">
    <div class="container">
        <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- Check for success message -->
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif ?>

        <form action="<?= base_url('add-photo') ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?= session()->get('id') ?>">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-xl-4">
                    <div class="upload-wrap">
                        <div class="upload-heading">
                            <h4>Upload Images</h4>
                            <p>Drag or choose your photo to upload</p>
                        </div>
                        <div class="upload-box file-btn" id="upload-box">
                            <div class="upload-content">
                                <i class="fal fa-cloud-upload"></i>
                                <h4 id="name-photo">Choose Images</h4>
                                <p>PNG, JPG, JPEG | Max 1Gb</p>
                            </div>
                        </div>
                        <input type="file" class="file-input d-none" name="photo" onchange="setNamePhoto(event)">
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8">
                    <div class="create-form">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label>Choose Album</label>
                            <select class="select" name="album_id">
                                <?php foreach ($album as $a) : ?>
                                    <option value="<?= $a->id ?>"><?= $a->album_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Photo Name</label>
                            <input type="text" name="photo_name" class="form-control" placeholder="e.g. Modern Photo">
                        </div>
                        <div class="form-group">
                            <label>Photo Description</label>
                            <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Write description"></textarea>
                        </div>
                        <div class="create-btn">
                            <button type="submit" class="theme-btn"><span class="far fa-pen-swirl"></span>Create</button>
                            <a href="<?= base_url() ?>" class="theme-btn theme-btn2"><span class="far fa-chevron-left"></span>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
    function setNamePhoto(event) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const fileName = file.name;
            document.getElementById('name-photo').textContent = fileName;
        };
        reader.readAsDataURL(file);
    }
</script>
<?= $this->endSection() ?>