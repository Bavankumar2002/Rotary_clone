<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Banners</h1>
    <a href="<?= URLROOT ?>/adminbanners/create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Banner
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Order</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['banners'])) : ?>
                <?php foreach($data['banners'] as $banner) : ?>
                    <tr>
                        <td><?= $banner->id ?></td>
                        <td>
                            <?php if (!empty($banner->image_url)) : ?>
                                <img src="<?= $banner->image_url ?>" alt="Banner" style="width: 80px; height: auto; border-radius: 4px;">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $banner->title ?></td>
                        <td><?= $banner->display_order ?></td>
                        <td>
                            <?php if ($banner->status == 'Active') : ?>
                                <span class="badge bg-success">Active</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= URLROOT ?>/adminbanners/edit/<?= $banner->id ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?= URLROOT ?>/adminbanners/delete/<?= $banner->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No banners found. Create one to show on the homepage slider!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
