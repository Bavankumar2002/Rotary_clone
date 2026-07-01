<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Blogs</h2>
    <a href="<?= URLROOT; ?>/adminblogs/add" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Blog</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['blogs'] as $blog) : ?>
                    <tr>
                        <td><?= $blog->id; ?></td>
                        <td><?= $blog->title; ?></td>
                        <td><?= $blog->author_name; ?></td>
                        <td><span class="badge bg-<?= $blog->status == 'Published' ? 'success' : 'secondary'; ?>"><?= $blog->status; ?></span></td>
                        <td><?= date('M d, Y', strtotime($blog->created_at)); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i> Edit</a>
                            <form action="<?= URLROOT; ?>/adminblogs/delete/<?= $blog->id; ?>" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog post?');"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($data['blogs'])) : ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">No blog posts found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
