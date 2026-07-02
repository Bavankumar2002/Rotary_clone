<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Introduction Configuration</h2>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminaboutsection" method="POST">
            <div class="row">
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
