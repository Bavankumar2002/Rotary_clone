<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Gallery</h1>
    <a href="<?= URLROOT ?>/admingallery/create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Gallery Item
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['gallery'])) : ?>
                <?php foreach($data['gallery'] as $item) : ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td>
                            <?php if (!empty($item->image_url)) : ?>
                                <img src="<?= $item->image_url ?>" alt="Gallery" style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $item->title ?></td>
                        <td>
                            <?php if(!empty($item->category)): ?>
                                <span class="badge bg-info text-dark"><?= $item->category ?></span>
                            <?php else: ?>
                                <span class="text-muted">None</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= URLROOT ?>/admingallery/edit/<?= $item->id ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?= URLROOT ?>/admingallery/delete/<?= $item->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this gallery item?');">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">No gallery items found. Add one to show in the homepage photo gallery!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
