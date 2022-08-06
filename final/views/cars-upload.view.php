<?php require_once 'partials/header.view.php' ?>

<div class="container" style="min-height:100vh;">
    <div class="row mt-4">
        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-9 col-10 m-auto">
            <form action="/cars/upload" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Car Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="color_id">Color</label>
                    <select name="color_id" id="color_id" class="form-control">
                        <?php foreach ($colors as $color) : ?>
                            <option value="<?= $color->id ?>"> <?= $color->color_name ?></option>
                        <?php endforeach ?>
                    </select>


                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <div>
                        <input type="file" id="image" name="image" > 
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Price (€)</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea placeholder="Type description of your car here" name="description" class="form-control"
                              id="description" cols="55" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="year_manufactured">Year Manufactured</label>
                    <input type="number" placeholder="1955" min="1955" max="1990" class="form-control"
                           id="year_manufactured" name="year_manufactured">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

        </div>

    </div>
</div>
<?php require_once 'partials/footer.view.php' ?>