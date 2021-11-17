<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php Flasher::flash() ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">All Transaction</p>
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewTransaction">
            Add New Transaction
        </button> -->
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-borderless table-striped align-middle" id="table_transaction">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Contact Person</th>
                        <th>Book Date</th>
                        <th>Time Estimates</th>
                        <th>Menu</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['transaction'] as $transaction) : ?>
                        <tr>
                            <td><?= $transaction['customer_name'] ?></td>
                            <td><?= $transaction['contact_person'] ?></td>
                            <td><?= $transaction['book_date'] ?></td>
                            <td>
                                <?php
                                $open = explode(':', $transaction['start']);
                                $open = $open[0] . ':' . $open[1];
                                $close = explode(':', $transaction['end']);
                                $close = $close[0] . ':' . $close[1];
                                echo $open . ' - ' . $close;
                                ?>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="me-2 btn btn-warning btn-shadow btn-sm buttonEditTransaction" data-id="<?= $transaction['id'] ?>" data-bs-toggle="modal" data-bs-target="#modalEditTransaction"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn-sm btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteTransaction">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <a href="<?= BASE_URL ?>/transaction/invoice/<?= $transaction['id'] ?>" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Invoice">
                                    <i class="fas fa-receipt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal For delete transaction -->
<!-- Modal -->
<div class="modal fade" id="modalDeleteTransaction" tabindex="-1" aria-labelledby="modalDeleteTransactionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTransactionLabel">Attention!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= BASE_URL ?>/transaction/delete/<?= $transaction['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- modal edit transaction -->
<div class="modal fade" id="modalEditTransaction" tabindex="-1" aria-labelledby="modalEditTransactionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditTransactionLabel">Edit Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/transaction/edit" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="place_id" id="place_id" value="">
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
                            <span id="start_time"></span>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">End Time</label>
                        <input type="time" name="end" id="end" class="form-control">
                        <small class="text-muted">
                            End in
                            <span id="end_time"></span>
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