<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Detail Place</p>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash() ?>
            <div class="card p-4 mb-4">
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-4">
                        <img src="<?= BASE_URL ?>/img/<?= $data['place']['place_picture'] ?>" class="img-fluid card-thumbnail" alt="">
                    </div>
                    <div class="col-md-8 ps-4">
                        <h5 class="color-danger fw-semibold">
                            <?php foreach ($data['categories'] as $category) : ?>
                                <?= ($category['id'] == $data['place']['category_id']) ? $category['name'] : '' ?>
                            <?php endforeach; ?>
                        </h5>
                        <h3 class="my-2"><strong><?= $data['place']['place_name'] ?></strong></h3>
                        <h6 class="fw-semibold mb-2 mt-5 d-block text-muted">Deskripsi</h6>
                        <p><?= $data['place']['description'] ?></p>
                        <div class="row mt-4">
                            <div class="col">
                                <h6 class="fw-medium text-muted">Place Owner</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['place']['place_owner'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="fw-medium text-muted">Harga</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['place']['price'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="fw-medium text-muted">Time Open</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['place']['place_open_time'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="fw-medium text-muted">Time Close</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['place']['place_close_time'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="fw-medium text-muted">Alamat</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['place']['location'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="fw-medium text-muted">Contact Person</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['place']['contact_person'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <button onclick="goBack()" class="btn btn-outline-secondary me-2">
                                    <div class="d-flex align-items-center">
                                        <span class="d-block my-auto me-2 fw-medium">BACK</span>
                                        <span data-feather="corner-down-left" class="color-white"></span>
                                    </div>
                                </button>
                                <button <?= ($data['place']['status'] == 'not available') ? 'disabled' : '' ?> data-id="<?= $data['place']['id']; ?>" class="btn btn-primary btn-shadow addNewTransactionButton" data-bs-toggle="modal" data-bs-target="#addNewTransaction">
                                    <div class="d-flex align-items-center">
                                        <span class="d-block my-auto me-2 fw-medium">ADD NEW TRANSACTION</span>
                                        <span data-feather="plus-circle" class="color-white"></span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- transaction modal -->
<!-- Modal -->
<div class="modal fade" id="addNewTransaction" tabindex="-1" aria-labelledby="addNewTransactionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTransactionLabel">Add New Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/transaction/insert" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="place_id" value="<?= $data['place']['id'] ?>">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="time_estimates" class="form-label">Time Estimates</label>
                        <select name="time_estimates" id="time_estimates" class="form-select">
                            <option value="1">1 Hour</option>
                            <option value="2">2 Hour</option>
                            <option value="3">3 Hour</option>
                            <option value="4">4 Hour</option>
                            <option value="5">5 Hour</option>
                            <option value="24">1 Day</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" readonly class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="play_time" class="form-label">Play Time</label>
                        <input type="time" name="play_time" id="play_time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h4 class="color-primary fw-semibold">IDR <span id="total">-</span></h4>
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