<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Contact Page Settings</h2>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Contact Section Content</h6>
            </div>
            <div class="card-body">
                <form action="<?= URLROOT; ?>/admincontact" method="POST">
                    
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
                        <label class="form-label fw-bold">Banner Image URL</label>
                        <input type="text" name="contact_banner_image" class="form-control" value="<?= htmlspecialchars($data['settings']['contact_banner_image'] ?? ''); ?>" required>
                        <small class="text-muted">Enter a valid URL for the banner background image.</small>
                    </div>

                    <h5 class="fw-bold mb-3 mt-5 border-bottom pb-2">Main Contact Form Section</h5>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Contact Form Title (HTML Allowed)</label>
                        <textarea name="contact_form_title" class="form-control" rows="2" required><?= htmlspecialchars($data['settings']['contact_form_title'] ?? ''); ?></textarea>
                        <small class="text-muted">Example: Have Questions?&lt;br&gt;Get In Touch!</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Contact Section Image URL (Left Side)</label>
                        <input type="text" name="contact_section_image" class="form-control" value="<?= htmlspecialchars($data['settings']['contact_section_image'] ?? ''); ?>" required>
                        <small class="text-muted">Enter a valid URL for the left-side image of the contact section.</small>
                    </div>

                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow border-0">
            <div class="card-body bg-light rounded text-center py-5">
                <i class="fas fa-info-circle fs-1 text-primary mb-3"></i>
                <h5 class="fw-bold">Contact Settings</h5>
                <p class="text-muted mb-0">Update the text and images used in the footer Contact Us section directly from here. Changes will instantly appear on the public homepage.</p>
            </div>
        </div>
    </div>
</div>
