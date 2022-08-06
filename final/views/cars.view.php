<?php require_once 'partials/header.view.php' ?>
<div class="container viewArea">
    <div class="mb-3 text-center mt-4 mb-4">
        <h1>Our Cars</h1>
    </div>
    <table class="table" >
        <thead class="thead-dark">
        <tr>
            <th>Car</th>
            <th>Color</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Year manufactured</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php foreach ($cars as $car): ?>
            <tr>
                <td class="border-bottom border-secondary"><?= $car->name ?></td>
                <td class="border-bottom border-secondary"><?= $car->color_id ?></td>
                <td class="border-bottom border-secondary"><?= $car->price ?></td>

                <td class="border-bottom border-secondary"><img src="../public/images/<?= $car->image ?>"
                                                                alt="" width="100" >
                </td>
                <td class="border-bottom border-secondary" style="max-width:300px;   overflow:auto; whitespace:nowrap; "><?= $car->description ?></td>
                <td class="border-bottom border-secondary"><?= $car->year_manufactured ?></td>
                <td class="border-bottom border-secondary">
                    <a class="btn btn-info mb-2" 
                       href="/cars/edit?id=<?= $car->id ?>">Edit</a>
                </td>
                <td class="border-bottom border-secondary">
                    <a class="btn btn-danger mb-2"
                      href="/cars/delete?id=<?= $car->id ?>">Delete</a>
                    </td>

            </tr>
        <?php endforeach; ?>
    </table>
    <button class="btn btn-dark"><a href="/cars/upload">Add a car</a></button>
</div>

<?php require_once 'partials/footer.view.php' ?>

