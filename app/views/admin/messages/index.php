<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Contact Messages</h2>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['messages'] as $msg) : ?>
                    <tr>
                        <td><small class="text-muted"><?= date('M d, Y h:i A', strtotime($msg->created_at)); ?></small></td>
                        <td class="fw-bold"><?= htmlspecialchars($msg->first_name . ' ' . $msg->last_name); ?></td>
                        <td><a href="mailto:<?= htmlspecialchars($msg->email); ?>"><?= htmlspecialchars($msg->email); ?></a></td>
                        <td><?= htmlspecialchars($msg->phone); ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#msgModal<?= $msg->id; ?>">
                                View Message
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="msgModal<?= $msg->id; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Message from <?= htmlspecialchars($msg->first_name); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?= nl2br(htmlspecialchars($msg->message)); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="<?= URLROOT; ?>/adminmessages/delete/<?= $msg->id; ?>" method="POST" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete this message?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($data['messages'])) : ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No contact messages received yet.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
