<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>

                <?php if (empty($user['id'])): ?>
                    Create new User
                <?php else: ?>
                    Update User:
                    <?php echo $user['name']; ?>
                <?php endif; ?>
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name"
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        value="<?php echo $user['name'] ?>"
                    <?php else: ?>
                        placeholder="<?php echo $user['name'] ?>"
                    <?php endif; ?>
                    class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username"
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        value="<?php echo $user['username'] ?>"
                    <?php else: ?>
                        placeholder="<?php echo $user['username'] ?>"
                    <?php endif; ?>
                        class="form-control <?php echo $errors['username'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['username'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email"
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        value="<?php echo $user['email'] ?>"
                    <?php else: ?>
                        placeholder="<?php echo $user['email'] ?>"
                    <?php endif; ?>
                        class="form-control  <?php echo $errors['email'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['email'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone"
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        value="<?php echo $user['phone'] ?>"
                    <?php else: ?>
                        placeholder="<?php echo $user['phone'] ?>"
                    <?php endif; ?>
                        class="form-control  <?php echo $errors['phone'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['phone'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website"
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        value="<?php echo $user['website'] ?>"
                    <?php else: ?>
                        placeholder="<?php echo $user['website'] ?>"
                    <?php endif; ?>
                        class="form-control  <?php echo $errors['website'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['website'] ?>
                    </div>
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>