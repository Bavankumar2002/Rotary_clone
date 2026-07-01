<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Global Site Settings</h2>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminsettings" method="POST">
            
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

            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4">Hero Section Configuration</h5>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Hero Main Title</label>
                    <input type="text" name="hero_title" class="form-control" value="<?= $data['settings']['hero_title'] ?? ''; ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Hero Subtitle Text</label>
                    <textarea name="hero_subtitle" class="form-control" rows="2"><?= $data['settings']['hero_subtitle'] ?? ''; ?></textarea>
                </div>
            </div>

            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4">About Us Section</h5>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Mission Statement</label>
                    <textarea name="about_mission" class="form-control" rows="3"><?= $data['settings']['about_mission'] ?? ''; ?></textarea>
                </div>
            </div>

            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-4">Impact Statistics (Animated Counters)</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Members Count</label>
                    <input type="number" name="stat_members" class="form-control" value="<?= $data['settings']['stat_members'] ?? '0'; ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Projects Count</label>
                    <input type="number" name="stat_projects" class="form-control" value="<?= $data['settings']['stat_projects'] ?? '0'; ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Years of Service</label>
                    <input type="number" name="stat_years" class="form-control" value="<?= $data['settings']['stat_years'] ?? '0'; ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Beneficiaries Count</label>
                    <input type="number" name="stat_beneficiaries" class="form-control" value="<?= $data['settings']['stat_beneficiaries'] ?? '0'; ?>">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success px-5 fw-bold"><i class="fas fa-save"></i> Save All Settings</button>
            </div>
        </form>
    </div>
</div>
