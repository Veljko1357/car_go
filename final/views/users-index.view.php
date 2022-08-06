<?php require_once 'partials/header.view.php' ?>
    <div class="container viewArea">
        <div class="mb-3 text-center mt-4 mb-4">
            <a href="/users/create" class="btn btn-success">Add new user</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="border-bottom border-secondary"><?= $user->id ?></td>
                    <td class="border-bottom border-secondary"><?= $user->name ?></td>
                    <td class="border-bottom border-secondary"><?= $user->email ?></td>
                    <td class="border-bottom border-secondary"><?= $user->username ?></td>
                    
                   
                    <td class="border-bottom border-secondary">
                        <a href="/users/edit?id=<?= $user->id ?>" class="btn btn-info mb-2">Settings</a> |
                       
                         <a href="/users/destroy?id=<?= $user->id ?>" class="btn btn-danger mb-2">Delete</a></td>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php require_once 'partials/footer.view.php' ?>