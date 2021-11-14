<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?= Flasher::flash() ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Welcome, <?= $data['account']['fullname'] ?></p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card badge-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="rec-icon bg-primary">
                                <i class="far fa-calendar-check"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="color-primary mt-3">12</h3>
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <span class="card-title-footer">Total Event</span>
                            <strong class="ms-auto color-primary">1.3%</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card badge-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="rec-icon bg-warning">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="color-warning mt-3">10</h3>
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <span class="card-title-footer">Your Event</span>
                            <strong class="ms-auto color-warning">+3</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card badge-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="rec-icon bg-danger">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="color-danger mt-3">100</h3>
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <span class="card-title-footer">Total Login Session</span>
                            <strong class="ms-auto color-danger">+1</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap mt-5 flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Your Place</p>
        <button type="button" class="btn btn-primary" id="btnAddNewPlace" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Place
        </button>
    </div>
    <div class="row">
        <?php if (empty($data['place'])) : ?>
            <h2 class="text-center mt-4">There is no Place!</h2>
        <?php else : ?>
            <?php foreach ($data['place'] as $place) : ?>
                <div class="col-md-6 col-lg-4">
                    <!-- Bootstrap 5 card box -->
                    <div class="card-box">
                        <div class="card-thumbnail">
                            <img src="<?= BASE_URL ?>/img/<?= $place['place_picture'] ?>" class="img-fluid" alt="">
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <span class="color-danger fw-semibold">
                                    <?php foreach ($data['categories'] as $category) : ?>
                                        <?= ($category['id'] == $place['category_id']) ? $category['name'] : '' ?>
                                    <?php endforeach; ?>
                                </span>
                                <h4 class="mt-1"><strong><?= $place['place_name'] ?></strong></h4>
                                <span class="color-secondary mt-0 py-0"><?= $data['account']['fullname'] ?></span>
                                <ul class="list-unstyled mt-3">
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <span data-feather="tag" class="me-2 color-primary"></span>IDR <?= $place['price'] ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <span data-feather="map-pin" class="me-2 color-primary"></span><?= $place['location'] ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <span data-feather="clock" class="me-2 color-primary"></span><?= $place['place_open_time'] ?> - <?= $place['place_close_time'] ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex justify-content-between">
                                <a href="<?= BASE_URL ?>/place/detail/<?= $place['id'] ?>" class="btn btn-primary btn-shadow">JOIN</a>
                                <div class="d-flex">
                                    <a href="<?= BASE_URL ?>/place/edit/<?= $place['id'] ?>" class="me-2 btn btn-warning btn-shadow"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteplace">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Place</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/place/store" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="place_name" class="form-label">Place Name</label>
                        <input type="text" class="form-control" required name="place_name" id="place_name">
                    </div>
                    <div class="mb-3">
                        <label for="place_owner" class="form-label">Owner</label>
                        <input type="text" class="form-control" required name="place_owner" id="place_owner">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" required name="price" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" required name="location" id="location">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" required name="description" id="description">
                    </div>
                    <div class="mb-3">
                        <label for="place_picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" required name="place_picture" id="place_picture">
                    </div>
                    <div class="mb-3">
                        <label for="place_open_time" class="form-label">Time Open</label>
                        <input type="time" class="form-control" required name="place_open_time" id="place_open_time">
                    </div>
                    <div class="mb-3">
                        <label for="place_close_time" class="form-label">Time Close</label>
                        <input type="time" class="form-control" required name="place_close_time" id="place_close_time">
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <?php foreach ($data['categories'] as $category) : ?>
                                <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" required name="contact_person" id="contact_person">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal For delete place -->
<!-- Modal -->
<div class="modal fade" id="modalDeleteplace" tabindex="-1" aria-labelledby="modalDeleteplaceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteplaceLabel">Attention!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= BASE_URL ?>/place/delete/<?= $place['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>