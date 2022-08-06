<?php require_once 'partials/login-header.view.php' ?>

<h1>Register</h1>

<form action="/register" method="POST">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="username" name="username" id="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
    </div>


    <div class="mt-3 mb-3">
        <button type="submit" class="btn btn-danger">Register</button>
    </div>
</form>

<?php require_once 'partials/footer.view.php' ?>
