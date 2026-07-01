<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Projects</h2>
    <a href="<?= URLROOT; ?>/adminprojects/add" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Project</a>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['projects'] as $project) : ?>
                    <tr>
                        <td><?= $project->id; ?></td>
                        <td><?= $project->title; ?></td>
                        <td><span class="badge bg-<?= $project->status == 'Completed' ? 'success' : 'warning'; ?>"><?= $project->status; ?></span></td>
                        <td><?= date('M d, Y', strtotime($project->created_at)); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i> Edit</a>
                            <form action="<?= URLROOT; ?>/adminprojects/delete/<?= $project->id; ?>" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?');"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($data['projects'])) : ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No projects found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
