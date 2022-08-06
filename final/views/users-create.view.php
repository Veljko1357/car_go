<?php require_once 'partials/header.view.php' ?>

<h1>Add new user</h1>

<form action="/users" method="POST" enctype="multipart/form-data">

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
        <input type="text" name="username" id="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    

    <div class="mt-3 mb-3">
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>


<?php require_once 'partials/footer.view.php' ?>
