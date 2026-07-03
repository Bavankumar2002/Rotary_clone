<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>General Settings</h2>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="<?= URLROOT; ?>/admingeneralsettings" method="POST">
            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">General Information</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="<?= $data['settings']['site_name'] ?? ''; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Motto</label>
                    <input type="text" name="motto" class="form-control" value="<?= $data['settings']['motto'] ?? ''; ?>">
                </div>
            </div>

            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4">Contact Information</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="<?= $data['settings']['contact_email'] ?? ''; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control" value="<?= $data['settings']['contact_phone'] ?? ''; ?>">
                </div>
            </div>
            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4">Latest News Marquee</h5>
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label fw-bold">Marquee Text</label>
                    <input type="text" name="latest_news_text" class="form-control" value="<?= $data['settings']['latest_news_text'] ?? ''; ?>" placeholder="Enter latest news or updates to display in the marquee...">
                    <small class="text-muted">This text will scroll horizontally across the screen next to the introduction section.</small>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success px-5 fw-bold"><i class="fas fa-save"></i> Save Settings</button>
            </div>
        </form>
    </div>
</div>
