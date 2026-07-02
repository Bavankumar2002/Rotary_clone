<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Event</h1>
    <a href="<?= URLROOT ?>/adminevents" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="<?= URLROOT ?>/adminevents/create" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" id="title" value="<?= $data['title_input']; ?>">
                <div class="invalid-feedback"><?= $data['title_err']; ?></div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="event_date" class="form-label">Event Date <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="event_date" class="form-control <?= (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" id="event_date" value="<?= $data['event_date']; ?>">
                    <div class="invalid-feedback"><?= $data['date_err']; ?></div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" id="location" value="<?= $data['location']; ?>" placeholder="e.g. Club House, Madurai">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Brief Description (Excerpt)</label>
                <textarea name="description" class="form-control" id="description" rows="2"><?= $data['description']; ?></textarea>
                <small class="form-text text-muted">A short summary of the event.</small>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Event Content Details</label>
                <textarea name="content" class="form-control" id="content" rows="6"><?= $data['content']; ?></textarea>
                <small class="form-text text-muted">Full detailed description of the event.</small>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Event Image (Optional)</label>
                <input type="file" name="image" class="form-control <?= (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" id="image">
                <div class="invalid-feedback"><?= $data['image_err']; ?></div>
                <small class="form-text text-muted">Allowed formats: JPG, PNG, GIF.</small>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Event</button>
            </div>
        </form>
    </div>
</div>
