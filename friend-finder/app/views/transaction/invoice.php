<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php Flasher::flash() ?>
    <div class="row">
        <div class="col-md-4">
            <p class="h2">Detail Transaction</p>
            <p>Download the proof of payment for the reservation as personal documentation</p>
        </div>
    </div>
    <div class="row mt-3 mb-4">
        <div class="col-md-6">
            <div class="card p-4">
                <!-- image -->
                <div class="row border-bottom justify-content-between d-flex align-items-center">
                    <div class="col d-flex my-auto align-items-center">
                        <div class="d-flex my-auto me-auto">
                            <img src="<?= BASE_URL ?>/img/logo2.png" width="40" height="40" alt="">
                            <h5 class="fw-bold mt-2 ms-2">Friend Finder</h5>
                        </div>
                    </div>
                    <div class="col text-end">
                        <p>Date: <?= $data['transaction']['book_date'] ?><br>
                            Status: <b class="text-success">SUCCESS</b></p>
                    </div>
                </div>
                <div class="row mt-4">
                    <span class="fw-bold mb-4">Details</span>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Customer Name</span>
                        <span class="fw-bold"><?= $data['transaction']['customer_name'] ?></span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Contact Person</span>
                        <span class="fw-bold"><?= $data['transaction']['contact_person'] ?></span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Start Date</span>
                        <span class="fw-bold"><?= $data['transaction']['start_date'] ?></span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>End Date</span>
                        <span class="fw-bold"><?= $data['transaction']['end_date'] ?></span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Time Estimates</span>
                        <span class="fw-bold"><?= ($data['transaction']['time_estimates'] > 5) ? $data['transaction']['time_estimates'] . ' D' : $data['transaction']['time_estimates'] . ' Hour' ?></span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Price</span>
                        <span class="fw-bold"><?= $data['transaction']['price'] ?></span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Play Time</span>
                        <span class="fw-bold"><?= $data['transaction']['play_time'] ?></span>
                    </div>
                    <div class="item border-bottom my-2"></div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>Total</span>
                        <span class="fw-bold  h6">IDR. <span class="span text-success"><?= $data['transaction']['total'] ?></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>