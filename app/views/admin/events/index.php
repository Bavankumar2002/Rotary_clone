<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Events</h1>
    <a href="<?= URLROOT ?>/adminevents/create" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Event
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Event Date</th>
                <th scope="col">Location</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['events'])) : ?>
                <?php foreach($data['events'] as $event) : ?>
                    <tr>
                        <td><?= $event->id ?></td>
                        <td>
                            <?php if (!empty($event->image_url)) : ?>
                                <img src="<?= $event->image_url ?>" alt="Event" style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                            <?php else: ?>
                                <span class="text-muted">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $event->title ?></td>
                        <td><?= date('F d, Y h:i A', strtotime($event->event_date)) ?></td>
                        <td><?= $event->location ?: '<span class="text-muted">N/A</span>' ?></td>
                        <td>
                            <a href="<?= URLROOT ?>/adminevents/edit/<?= $event->id ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="<?= URLROOT ?>/adminevents/delete/<?= $event->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No events found. Create one to show on the homepage!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
