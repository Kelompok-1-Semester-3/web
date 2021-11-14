<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Edit Place</p>
    </div>

    <div class="row">
        <?= Flasher::flash() ?>
        <div class="card card-box">
            <!-- place picture -->
            <form action="<?= BASE_URL ?>/place/update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $data['place']['id']; ?>">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= BASE_URL ?>/img/<?= $data['place']['place_picture'] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-4 align-self-center mt-4">
                                <input type="hidden" name="place_picture">
                                <input type="file" name="place_picture" class="form-control mb-2"">
                                <p class=" text-muted">Your must add your place picture. Only JPG, PNG, and GIF to allow permission</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- place details -->
                <div class="row mt-4">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="place_name" class="form-label">Place Name</label>
                            <input type="text" name="place_name" id="place_name" class="form-control" value="<?= $data['place']['place_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="place_owner" class="form-label">Place Owner</label>
                            <input type="text" name="place_owner" id="place_owner" class="form-control" value="<?= $data['place']['place_owner'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?= $data['place']['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="<?= $data['place']['location'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="<?= $data['place']['description'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <?php foreach ($data['categories'] as $category) : ?>
                                    <option value="<?= $category['id']; ?>" <?= ($category['id'] == $data['place']['category_id']) ? 'selected' : '' ?>><?= $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?= $data['place']['contact_person'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="place_open_time" class="form-label">Time Open</label>
                            <input type="time" name="place_open_time" min="01:00" max="23:00" id="place_open_time" class="form-control" value="<?= $data['place']['place_open_time'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="place_close_time" class="form-label">Time Close</label>
                            <input type="time" name="place_close_time" min="01:00" max="23:00" id="place_close_time" class="form-control" value="<?= $data['place']['place_close_time'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label mb-3">Status</label>
                            <div class="form-check">
                                <input <?= ($data['place']['status'] == 'available') ? 'checked' : '' ?> class="form-check-input" type="radio" value="available" name="status" id="available">
                                <label class="form-check-label" for="available">
                                    Available
                                </label>
                            </div>
                            <div class="form-check">
                                <input <?= ($data['place']['status'] == 'not_available') ? 'checked' : '' ?> class="form-check-input" type="radio" value="not_available" name="status" id="not_available">
                                <label class="form-check-label" for="not_available">
                                    Not Available
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <a onclick="goBack()" class="btn btn-outline-secondary">BACK</a>
                        <button type="submit" class="btn btn-primary ms-2">SAVE CHANGES</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>