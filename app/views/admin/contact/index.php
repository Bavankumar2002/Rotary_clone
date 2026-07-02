<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Contact Page Settings</h2>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Contact Section Content</h6>
            </div>
            <div class="card-body">
                <form action="<?= URLROOT; ?>/admincontact" method="POST" enctype="multipart/form-data">
                    
                    <h5 class="fw-bold mb-3 mt-2 border-bottom pb-2">"Join With Us" Banner</h5>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Banner Subtitle (Small Text)</label>
                        <input type="text" name="contact_banner_subtitle" class="form-control" value="<?= htmlspecialchars($data['settings']['contact_banner_subtitle'] ?? ''); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Banner Main Title</label>
                        <input type="text" name="contact_banner_title" class="form-control" value="<?= htmlspecialchars($data['settings']['contact_banner_title'] ?? ''); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Banner Image</label>
                        <?php if(!empty($data['settings']['contact_banner_image'])): ?>
                            <div class="mb-2">
                                <img src="<?= $data['settings']['contact_banner_image'] ?>" style="width: 150px; height: auto; border-radius: 4px;" alt="Current Image">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="contact_banner_image" class="form-control" accept="image/*">
                        <small class="text-muted">Upload a new image to replace the current one.</small>
                    </div>

                    <h5 class="fw-bold mb-3 mt-5 border-bottom pb-2">Main Contact Form Section</h5>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contact Form Title (HTML Allowed)</label>
                        <textarea name="contact_form_title" class="form-control" rows="2" required><?= htmlspecialchars($data['settings']['contact_form_title'] ?? ''); ?></textarea>
                        <small class="text-muted">Example: Have Questions?&lt;br&gt;Get In Touch!</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Contact Section Image (Left Side)</label>
                        <?php if(!empty($data['settings']['contact_section_image'])): ?>
                            <div class="mb-2">
                                <img src="<?= $data['settings']['contact_section_image'] ?>" style="width: 150px; height: auto; border-radius: 4px;" alt="Current Image">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="contact_section_image" class="form-control" accept="image/*">
                        <small class="text-muted">Upload a new image to replace the current one.</small>
                    </div>

                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
