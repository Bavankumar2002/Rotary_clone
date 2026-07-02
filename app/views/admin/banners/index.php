<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $data['title'] ?? 'Manage Banners & Hero Section' ?></h1>
</div>

<div class="card shadow border-0 mb-5">
    <div class="card-body">
        <form action="<?= URLROOT; ?>/adminbanners/updateHero" method="POST">
            <h5 class="text-primary fw-bold border-bottom pb-2 mb-3">Hero Section Configuration</h5>
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

            <div class="mt-4">
                <button type="submit" class="btn btn-success px-5 fw-bold"><i class="fas fa-save"></i> Save Hero Settings</button>
            </div>
        </form>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3">Slider Banners</h2>
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
