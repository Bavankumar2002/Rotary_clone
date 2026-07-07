<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-4">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header bg-primary text-white text-center py-4">
                <h3 class="font-weight-light my-2">Admin Login</h3>
            </div>
            <div class="card-body p-4">
                <?php if(isset($data['error'])) : ?>
                    <div class="alert alert-danger"><?= $data['error']; ?></div>
                <?php endif; ?>
                <form action="<?= URLROOT; ?>/admin/login" method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputUsername" type="text" name="username" placeholder="Username" required />
                        <label for="inputUsername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required />
                        <label for="inputPassword">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="<?= URLROOT; ?>">Back to Website</a>
                        <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
