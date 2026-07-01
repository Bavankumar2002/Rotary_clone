<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Banner</h1>
    <a href="<?= URLROOT ?>/adminbanners" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= URLROOT ?>/adminbanners/create" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Banner Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" id="title" value="<?= $data['title_input']; ?>">
                <div class="invalid-feedback"><?= $data['title_err']; ?></div>
            </div>
            
            <div class="mb-3">
                <label for="subtitle" class="form-label">Banner Subtitle (Optional)</label>
                <input type="text" name="subtitle" class="form-control" id="subtitle" value="<?= $data['subtitle']; ?>">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Banner Image <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" id="image">
                <div class="invalid-feedback"><?= $data['image_err']; ?></div>
                <small class="form-text text-muted">Recommended size: 1920x1080px or higher for coverflow effect.</small>
            </div>

            <div class="mb-3">
                <label for="link_url" class="form-label">Link URL (Optional)</label>
                <input type="text" name="link_url" class="form-control" id="link_url" value="<?= $data['link_url']; ?>" placeholder="e.g. https://example.com/project">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input type="number" name="display_order" class="form-control" id="display_order" value="<?= $data['display_order']; ?>" min="0">
                    <small class="form-text text-muted">Lower numbers appear first.</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" id="status">
                        <option value="Active" <?= ($data['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                        <option value="Inactive" <?= ($data['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Banner</button>
            </div>
        </form>
    </div>
</div>
