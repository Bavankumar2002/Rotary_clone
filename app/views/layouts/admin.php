<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?= SITENAME; ?></title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Inter', sans-serif; }
        .sidebar { min-height: 100vh; background: #343a40; color: #fff; }
        .sidebar a { color: #c2c7d0; text-decoration: none; display: block; padding: 10px 15px; border-radius: 5px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #007bff; color: #fff; }
        .content { width: 100%; padding: 20px; }
        .topbar { background: #fff; border-bottom: 1px solid #dee2e6; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php if(isset($_SESSION['rotary_admin_id'])) : ?>
        <div class="sidebar p-3" style="width: 250px;">
            <h4 class="text-center mb-4"><i class="fas fa-cog text-primary"></i> CMS Admin</h4>
            <hr class="border-secondary">
            <a href="<?= URLROOT; ?>/admin/dashboard" class="active"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
            <a href="<?= URLROOT; ?>/adminpages"><i class="fas fa-file-alt me-2"></i> Pages</a>
            <a href="<?= URLROOT; ?>/adminblogs"><i class="fas fa-blog me-2"></i> Blogs</a>
            <a href="<?= URLROOT; ?>/adminevents"><i class="fas fa-calendar-alt me-2"></i> Events</a>
            <a href="<?= URLROOT; ?>/adminprojects"><i class="fas fa-project-diagram me-2"></i> Projects</a>
            <a href="<?= URLROOT; ?>/adminmembers"><i class="fas fa-users me-2"></i> Members</a>
            <a href="<?= URLROOT; ?>/admingallery"><i class="fas fa-images me-2"></i> Gallery</a>
            <a href="<?= URLROOT; ?>/adminsettings"><i class="fas fa-cogs me-2"></i> Settings</a>
            <hr class="border-secondary">
            <a href="<?= URLROOT; ?>/admin/logout" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
        </div>
        <?php endif; ?>

        <!-- Main Content -->
        <div class="content p-0">
            <?php if(isset($_SESSION['rotary_admin_id'])) : ?>
            <div class="topbar">
                <h5><?= SITENAME; ?> Control Panel</h5>
                <div>
                    <span class="me-3"><i class="fas fa-user-circle"></i> <?= $_SESSION['rotary_admin_name']; ?></span>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="p-4">
                <?php require_once '../app/views/' . $view . '.php'; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
