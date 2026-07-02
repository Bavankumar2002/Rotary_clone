<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Articles</h2>
    <a href="<?= URLROOT; ?>/adminprojects/add" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Article</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Full Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['projects'] as $project) : ?>
                    <tr>
                        <td><?= $project->id; ?></td>
                        <td><?= $project->title; ?></td>
                        <td><?= htmlspecialchars(substr(strip_tags($project->description ?? ''), 0, 50)) . (strlen(strip_tags($project->description ?? '')) > 50 ? '...' : ''); ?></td>
                        <td><?= htmlspecialchars(substr(strip_tags($project->content ?? ''), 0, 50)) . (strlen(strip_tags($project->content ?? '')) > 50 ? '...' : ''); ?></td>
                        <td>
                            <a href="<?= URLROOT; ?>/adminprojects/edit/<?= $project->id; ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i> Edit</a>
                            <form action="<?= URLROOT; ?>/adminprojects/delete/<?= $project->id; ?>" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?');"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($data['projects'])) : ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No articles found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
