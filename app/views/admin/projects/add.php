<div class="mb-4">
    <a href="<?= URLROOT; ?>/adminprojects" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back to Projects</a>
</div>

<div class="card shadow border-0 mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 font-weight-bold text-primary">Add New Project</h5>
    </div>
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminprojects/add" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Project Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Short Description</label>
                <textarea name="description" class="form-control" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="Completed">Completed</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Planned">Planned</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Full Content</label>
                <textarea name="content" class="form-control" rows="6" required></textarea>
                <small class="text-muted">HTML is allowed here. In a full production environment, this would use CKEditor.</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Project</button>
        </form>
    </div>
</div>
