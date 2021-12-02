<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Detail Event</p>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card p-4 mb-4">
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-4">
                        <img src="<?= BASE_URL ?>/img/<?= $data['event']['event_picture'] ?>" class="img-fluid card-thumbnail" alt="">
                    </div>
                    <div class="col-md-8 ps-4">
                        <h5 class="color-danger fw-semibold">
                            <?php foreach ($data['categories'] as $category) : ?>
                                <?= ($category['id'] == $data['event']['category_id']) ? $category['name'] : '' ?>
                            <?php endforeach; ?>
                        </h5>
                        <h3 class="my-2"><strong><?= $data['event']['name_event'] ?></strong></h3>
                        <h6 class="fw-semibold mb-2 mt-5 d-block text-muted">Deskripsi</h6>
                        <p><?= $data['event']['description'] ?></p>
                        <div class="row mt-4">
                            <div class="col">
                                <h6 class="fw-medium text-muted">Event Owner</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['event']['event_owner'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="fw-medium text-muted">Harga</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['event']['price'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="fw-medium text-muted">Alamat</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['event']['location'] ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="fw-medium text-muted">Contact Person</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2"><?= $data['event']['contact_person'] ?></p>
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
                                <a target="_blank" class="btn btn-primary btn-shadow" href="https://api.whatsapp.com/send?phone=<?php
                                                                                                                                $contact_person = $data['event']['contact_person'];
                                                                                                                                $contact_person = '62' . substr($contact_person, 1);
                                                                                                                                echo $contact_person; ?>&text=Hei%20there%21%2C%20can%20i%20get%20in%20to%20your%20event%3F">
                                    <div class="d-flex align-items-center">
                                        <span class="d-block my-auto me-2 fw-medium">CONTACT OWNER</span>
                                        <span data-feather="phone" class="color-white"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- Modal C -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->