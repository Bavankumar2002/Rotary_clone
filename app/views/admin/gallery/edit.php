<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Gallery Item</h1>
    <a href="<?= URLROOT ?>/admingallery" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= URLROOT ?>/admingallery/edit/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Image Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" id="title" value="<?= $data['title_input']; ?>" placeholder="e.g. Health Camp 2026">
                <div class="invalid-feedback"><?= $data['title_err']; ?></div>
            </div>
            
            <div class="mb-3">
                <label for="category" class="form-label">Category (Optional)</label>
                <input type="text" name="category" class="form-control" id="category" value="<?= $data['category']; ?>" placeholder="e.g. Community Service, Health, Education">
                <small class="form-text text-muted">This helps organize images on the homepage photo grid.</small>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Current Image</label>
                <?php if(!empty($data['image_url'])): ?>
                    <img src="<?= $data['image_url']; ?>" alt="Gallery Image" class="img-thumbnail mb-3" style="max-height: 150px; border-radius: 4px;">
                <?php else: ?>
                    <p class="text-muted">No image uploaded.</p>
                <?php endif; ?>
                
                <label for="image" class="form-label d-block">Replace Image (Optional)</label>
                <input type="file" name="image" class="form-control <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" id="image">
                <div class="invalid-feedback"><?= $data['image_err']; ?></div>
                <small class="form-text text-muted">Leave blank if you do not want to replace the current image.</small>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Gallery Item</button>
            </div>
        </form>
    </div>
</div>
