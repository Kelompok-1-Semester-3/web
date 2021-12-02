<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php Flasher::flash() ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p class="h2">Detail Transaction</p>
            <p>Download the proof of payment for the reservation as personal documentation</p>
        </div>
    </div>
    <div class="row mt-3 mb-4 justify-content-center">
        <div class="col-md-6">
            <div class="card p-4" id="invoice_card">
                <!-- image -->
                <div class="row border-bottom justify-content-between d-flex align-items-center">
                    <div class="col d-flex my-auto align-items-center">
                        <div class="d-flex my-auto me-auto">
                            <img src="<?= BASE_URL ?>/img/logo2.png" width="30" height="30" alt="">
                            <h5 class="fw-bold my-auto ms-2">Friend Finder</h5>
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
                        <span>Start Time</span>
                        <span class="fw-bold">
                            <?php
                            $start = explode(':', $data['transaction']['start']);
                            $start = $start[0] . ':' . $start[1];
                            echo $start;
                            ?>
                        </span>
                    </div>
                    <div class="item mb-2 d-flex justify-content-between">
                        <span>End Time</span>
                        <span class="fw-bold">
                            <?php
                            $end = explode(':', $data['transaction']['end']);
                            $end = $end[0] . ':' . $end[1];
                            echo $end;
                            ?>
                        </span>
                    </div>
                    <div class="item border-bottom my-2"></div>
                    <div class="item d-flex justify-content-between">
                        <span>Total</span>
                        <span class="fw-bold h6">IDR. <span class="span text-success"><?= $data['transaction']['total'] ?></span></span>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col">
                    <button onclick="goBack()" class="btn btn-light">Back</button>
                    <button class="btn btn-primary" id="btn_print">
                        Print
                        <i class="fas fa-print ms-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>