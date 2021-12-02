<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="d-block">
            <p class="h2">All Place</p>
            <p>Find your place to start your event</p>
        </div>
    </div>

    <!-- table -->
    <div class="row">
        <div class="table-responsive">
            <table class="table align-middle table-hover table-borderless" id="table_place">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Availiblity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['place'] as $place) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?= BASE_URL ?>/img/<?= $place['place_picture'] ?>" width="100" height="100" class="img-fluid" alt="">
                                    <h6 class="ms-4 fw-bold"><?= $place['place_name'] ?></h6>
                                </div>
                            </td>
                            <td><?= $place['location'] ?></td>
                            <td><span class="badge bg-success"><?= $place['status'] ?></span></td>
                            <td>
                                <h6 class="fw-bold">IDR <?= $place['price'] ?></h6>
                            </td>
                            <td>
                                <a href="<?= BASE_URL ?>/place/visit/<?= $place['id'] ?>" class="btn btn-primary">
                                    Visit
                                    <i class="fas fa-chevron-right fs-fs-6 ms-2"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>