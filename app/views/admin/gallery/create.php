<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Gallery Item</h1>
    <a href="<?= URLROOT ?>/admingallery" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= URLROOT ?>/admingallery/create" method="POST" enctype="multipart/form-data">
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
                <label for="image" class="form-label">Gallery Image <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" id="image">
                <div class="invalid-feedback"><?= $data['image_err']; ?></div>
                <small class="form-text text-muted">Recommended size: Square or landscape images fit beautifully in the grid.</small>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Gallery Item</button>
            </div>
        </form>
    </div>
</div>
