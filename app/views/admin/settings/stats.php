<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Impact Statistics Configuration</h2>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminimpactstats" method="POST">
            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Impact Statistics (Animated Counters)</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Articles Count</label>
                    <input type="number" name="stat_projects" class="form-control" value="<?= $data['settings']['stat_projects'] ?? '0'; ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Years of Service</label>
                    <input type="number" name="stat_years" class="form-control" value="<?= $data['settings']['stat_years'] ?? '0'; ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Beneficiaries Count</label>
                    <input type="number" name="stat_beneficiaries" class="form-control" value="<?= $data['settings']['stat_beneficiaries'] ?? '0'; ?>">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success px-5 fw-bold"><i class="fas fa-save"></i> Save Settings</button>
            </div>
        </form>
    </div>
</div>
