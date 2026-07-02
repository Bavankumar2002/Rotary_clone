<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $data['title']; ?></h1>
    <a href="<?= URLROOT ?>/adminteamleaders" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card shadow border-0">
    <div class="card-body p-4">
        <form action="<?= URLROOT; ?>/adminteamleaders/edit/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Image</label>
                    <?php if(!empty($data['image_url'])): ?>
                        <div class="mb-2">
                            <img src="<?= $data['image_url'] ?>" style="width: 200px; height: auto; border-radius: 4px;" alt="Current Image">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="image" class="form-control <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" accept="image/*">
                    <span class="invalid-feedback"><?= $data['image_err']; ?></span>
                    <small class="text-muted">Upload a new photo to replace the current one.</small>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
            </div>
        </form>
    </div>
</div>
