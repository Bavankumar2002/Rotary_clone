<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Introduction Configuration</h2>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminaboutsection" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">About Title</label>
                    <input type="text" name="about_title" class="form-control" value="<?= $data['settings']['about_title'] ?? ''; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">About Image</label>
                    <input type="file" name="about_image" class="form-control" accept="image/*">
                    <?php if(!empty($data['settings']['about_image'])): ?>
                        <div class="mt-2">
                            <img src="<?= $data['settings']['about_image']; ?>" alt="About Image" style="max-height: 100px; border-radius: 5px;">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Mission Statement</label>
                    <textarea name="about_mission" class="form-control" rows="5"><?= $data['settings']['about_mission'] ?? ''; ?></textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success px-5 fw-bold"><i class="fas fa-save"></i> Save Settings</button>
            </div>
        </form>
    </div>
</div>
