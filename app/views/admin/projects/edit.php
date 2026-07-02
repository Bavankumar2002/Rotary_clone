<div class="mb-4">
    <a href="<?= URLROOT; ?>/adminprojects" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back to Articles</a>
</div>

<div class="card shadow border-0 mb-5">
    <div class="card-header bg-white py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Article</h5>
    </div>
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminprojects/edit/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-bold">Article Title</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($data['title']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Article Image</label>
                <?php if(!empty($data['image_url'])): ?>
                    <div class="mb-2">
                        <img src="<?= $data['image_url']; ?>" alt="Article Image" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                <?php endif; ?>
                <input type="file" name="image" class="form-control">
                <small class="text-muted">Upload a new image to replace the current one. Leave blank to keep existing image.</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Short Description</label>
                <textarea name="description" class="form-control" rows="2" required><?= htmlspecialchars($data['description']); ?></textarea>
            </div>


            <div class="mb-4">
                <label class="form-label fw-bold">Full Content</label>
                <textarea name="content" class="form-control" rows="6" required><?= htmlspecialchars($data['content']); ?></textarea>
                <small class="text-muted">HTML is allowed here.</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Article</button>
        </form>
    </div>
</div>
