<?php require_once 'partials/header.view.php' ?>

    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <a href="/cars" class="btn btn-info">Back</a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="cols m-auto">
                <form action="/cars/update" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $car->id ?>">

                    <div class="form-group">
                        <label for="name" class="m-0">name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $car->name ?>">
                    </div>

         

                    <div class="form-group">
                        <label for="price" class="m-0">Price</label>
                        <input type="text" id="price" name="price" class="form-control"
                               value="<?= number_format($car->price, 2) ?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea value=<?= $car->description ?> name="description" class="form-control"
                                  id="description" cols="55" rows="5"><?= $car->description ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="year_manufactured">Year Manufactured</label>
                        <input type="number" placeholder="1955" min="1955" max="1990" class="form-control"
                               id="year_manufactured" name="year_manufactured" value=<?= $car->year_manufactured ?>>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once 'partials/footer.view.php' ?>