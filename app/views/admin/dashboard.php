<h2 class="mb-4">Dashboard Overview</h2>
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 border-0 border-start border-4 border-success">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Articles Written</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">54</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-project-diagram fa-2x text-muted opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2 border-0 border-start border-4 border-info">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Upcoming Events</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-muted opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card shadow mb-4 border-0">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
            </div>
            <div class="card-body">
                <?php if(!empty($data['recent_messages'])): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach($data['recent_messages'] as $message): ?>
                            <li class="list-group-item">
                                <strong><?php echo htmlspecialchars($message->first_name . ' ' . $message->last_name); ?></strong> sent a message.
                                <br>
                                <small class="text-muted"><?php echo date('M j, Y h:i A', strtotime($message->created_at)); ?></small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No recent activity found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow mb-4 border-0">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Quick Links</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New Blog</a>
                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add New Article</a>
                    <a href="#" class="btn btn-info btn-sm text-white"><i class="fas fa-cog"></i> Update Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
