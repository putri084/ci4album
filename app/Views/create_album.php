<?= $this->extend('layouts/master_public') ?>
<?= $this->section('content') ?>
<div class="create-area py-80">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <!-- <div class="col-lg-5 col-xl-4">
                <div class="upload-wrap">
                    <div class="upload-heading">
                        <h4>Upload File</h4>
                        <p>Drag or choose your file to upload</p>
                    </div>
                    <div class="upload-box file-btn">
                        <div class="upload-content">
                            <i class="fal fa-cloud-upload"></i>
                            <h4>Choose File</h4>
                            <p>PNG, JPG, JPEG | Max 1Gb</p>
                        </div>
                    </div>
                    <input type="file" class="file-input d-none">
                </div>
            </div> -->
            <div class="col-lg-7 col-xl-8">
                <div class="create-form">
                    <form action="<?= base_url('add-album') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="select" name="category_id">
                                <?php foreach ($category as $c) : ?>
                                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Album Name</label>
                            <input type="text" name="album_name" class="form-control" placeholder="e.g. Modern Art">
                        </div>
                        <div class="form-group">
                            <label>Album Description</label>
                            <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Write description"></textarea>
                        </div>
                        <div class="create-btn">
                            <button type="submit" class="theme-btn"><span class="far fa-pen-swirl"></span>Create</button>
                            <a href="<?= base_url() ?>" class="theme-btn theme-btn2"><span class="far fa-chevron-left"></span>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>