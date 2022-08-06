<?php require_once 'partials/header.view.php' ?>

<h1>Login</h1>

<form action="/login" method="POST">

    <?php if($message): ?>
    <div class="alert alert-danger">
        <?= $message ?>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>


    <div class="mt-3 mb-3">
        <button type="submit" class="btn btn-danger">Login</button>
    </div>
</form>

<?php require_once 'partials/footer.view.php' ?>
