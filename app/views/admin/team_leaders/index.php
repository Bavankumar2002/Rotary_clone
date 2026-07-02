<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Team Leaders</h1>
    <a href="<?= URLROOT ?>/adminteamleaders/create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Team Leader Image
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['leaders'])) : ?>
                <?php foreach($data['leaders'] as $leader) : ?>
                    <tr>
                        <td><?= $leader->id ?></td>
                        <td>
                            <?php if (!empty($leader->image_url)) : ?>
                                <img src="<?= $leader->image_url ?>" alt="Leader" style="width: 200px; height: auto; border-radius: 4px;">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= URLROOT ?>/adminteamleaders/edit/<?= $leader->id ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?= URLROOT ?>/adminteamleaders/delete/<?= $leader->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No team leaders found. Create one to show on the homepage!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
