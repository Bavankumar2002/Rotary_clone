<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $data['title']; ?></h1>
    <a href="<?= URLROOT ?>/adminteamleaders" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card shadow border-0">
    <div class="card-body p-4">
        <form action="<?= URLROOT; ?>/adminteamleaders/create" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Image *</label>
                    <input type="file" name="image" class="form-control <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" accept="image/*">
                    <span class="invalid-feedback"><?= $data['image_err']; ?></span>
                    <small class="text-muted">Upload a full-width image for the Team Leaders section.</small>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </form>
    </div>
</div>
