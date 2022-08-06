<?php require_once 'partials/header.view.php' ?>

    <div class="container viewArea">
        <div class="row mt-4">

            <div class="col">
                <a href="/users" class="btn btn-info">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-6 col-9 card p-5 m-auto">
                <form action="/users/edit" method="POST">
                    <input type="hidden" name="id" value="<?= $user->id ?>">

                    <div class="form-group">
                        <label for="name" class="m-0">User name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $user->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="m-0">Username</label>
                        <input type="text" id="usernamename" name="username" class="form-control"
                               value="<?= $user->username ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="m-0">User email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?= $user->email ?>">
                    </div>

                    <div class="form-group">
                        <label for="password" class="m-0">Enter user password:</label>
                        <input type="password" id="password" name="password" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password" id="confirm_password" class="form-control">
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php require_once 'partials/footer.view.php' ?>