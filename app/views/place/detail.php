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
                        <h6 class="fw-semibold mb-2 mt-3 d-block text-muted">Deskripsi</h6>
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
                                <h6 class="fw-medium text-muted">Price / Hour</h6>
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
                                    <p class="my-auto ms-2">
                                        <?php

                                        $open = explode(':', $data['place']['place_open_time']);
                                        $open = $open[0] . ':' . $open[1];
                                        echo $open;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="fw-medium text-muted">Time Close</h6>
                                <div class="d-flex mb-2 align-items-center">
                                    <span data-feather="check-circle" class="color-primary"></span>
                                    <p class="my-auto ms-2">
                                        <?php
                                        $close = explode(':', $data['place']['place_close_time']);
                                        $close = $close[0] . ':' . $close[1];
                                        echo $close;
                                        ?></p>
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
                                <?php if ($data['account']['role_id'] == 1) : ?>
                                    <button data-id="<?= $data['place']['id']; ?>" class="btn btn-primary btn-shadow addNewTransactionButton" data-bs-toggle="modal" data-bs-target="#addNewTransaction">
                                        <div class="d-flex align-items-center">
                                            <span class="d-block my-auto me-2 fw-medium">ADD NEW TRANSACTION</span>
                                            <span data-feather="plus-circle" class="color-white"></span>
                                        </div>
                                    </button>
                                <?php else : ?>
                                    <button data-bs-toggle="modal" data-bs-target="#contactOwnerModal" class="btn btn-primary">
                                        CONTACT OWNER
                                        <i class="ms-1 fas fa-phone-alt"></i>
                                    </button>
                                <?php endif; ?>
                                <button data-id="<?= $data['place']['id']; ?>" class="btn ms-2 btn-secondary btn-shadow timeSchedule" data-bs-toggle="modal" data-bs-target="#modalSchedule">
                                    <div class="d-flex align-items-center">
                                        <span class="d-block my-auto me-2 fw-medium">VIEW SCHEDULE</span>
                                        <span data-feather="search" class="color-white"></span>
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
                        <label for="start" class="form-label">Start Time</label>
                        <input type="time" name="start" id="start" class="form-control">
                        <small class="text-muted">
                            Start from
                            <?php
                            $open = explode(':', $data['place']['place_open_time']);
                            $open = $open[0] . ':' . $open[1];
                            echo $open;
                            ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">End Time</label>
                        <input type="time" name="end" id="end" class="form-control">
                        <small class="text-muted">
                            End in
                            <?php
                            $close = explode(':', $data['place']['place_close_time']);
                            $close = $close[0] . ':' . $close[1];
                            echo $close;
                            ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="total" value="" id="total">
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

<!-- transaction modal -->
<!-- Modal -->
<div class="modal fade" id="modalSchedule" tabindex="-1" aria-labelledby="modalScheduleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScheduleLabel">Time Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h6 class="mb-3">Booking Data</h6>
                    <?php
                    $i = 1;
                    foreach ($data['transactions'] as $tr) : ?>
                        <div class="item d-flex justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <span data-feather="check-circle" class="color-success me-2"></span>
                                <span><?= $tr['customer_name'] ?></span>
                            </div>
                            <span class="fw-bold">
                                <?php
                                $start = explode(':', $tr['start']);
                                $start = $start[0] . ':' . $start[1];
                                $end = explode(':', $tr['end']);
                                $end = $end[0] . ':' . $end[1];
                                echo $start . ' - ' . $end;
                                ?>
                            </span>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- contact owner modal -->
<!-- Modal -->
<div class="modal fade" id="contactOwnerModal" tabindex="-1" aria-labelledby="contactOwnerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactOwnerModalLabel">Fill This Section</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/place/contactOwnerPlace" method="post">
                    <input type="hidden" name="place_name" required value="<?= $data['place']['place_name'] ?>">
                    <input type="hidden" name="contact_person" required value="<?= $data['place']['contact_person'] ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" required id="phone_number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">Start Time</label>
                        <input type="time" name="start" id="start" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">End Time</label>
                        <input type="time" name="end" id="end" required class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>