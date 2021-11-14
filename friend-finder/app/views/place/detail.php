<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Detail Place</p>
    </div>

    <div class="row">
        <div class="col-lg-12">
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
                                <h6 class="fw-medium text-muted">place Owner</h6>
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
                                <button class="btn btn-primary btn-shadow">
                                    <div class="d-flex align-items-center">
                                        <span class="d-block my-auto me-2 fw-medium">CONTACT OWNER</span>
                                        <span data-feather="phone" class="color-white"></span>
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