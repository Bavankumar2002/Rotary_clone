<div class="mb-4">
    <a href="<?= URLROOT; ?>/adminblogs" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back to Blogs</a>
</div>

<div class="card shadow border-0 mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 font-weight-bold text-primary">Add New Blog Post</h5>
    </div>
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminblogs/add" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Post Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Excerpt (Short Description)</label>
                <textarea name="excerpt" class="form-control" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="Draft">Draft</option>
                    <option value="Published">Published</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Full Content</label>
                <textarea name="content" class="form-control" rows="8" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Post</button>
        </form>
    </div>
</div>
