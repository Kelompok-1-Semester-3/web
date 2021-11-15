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
                            <td class="fw-bold"><?= ($transaction['time_estimates'] > 5) ? $transaction['time_estimates'] . 'D' : $transaction['time_estimates'] . ' H' ?></td>
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

<!-- Modal -->
<!-- <div class="modal fade" id="addNewTransaction" tabindex="-1" aria-labelledby="addNewTransactionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTransactionLabel">Add New Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/transaction/insert" method="POST">
                    <div class="mb-3">
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
                        <select name="time_estimater" id="time_estimates" class="form-select">
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
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="play_time" class="form-label">Play Time</label>
                        <input type="time" name="play_time" id="play_time" class="form-control">
                    </div>
                    <div class="mb-3">
                        <h4>-</h4>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> -->

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
                        <input type="hidden" name="place_id" value="" id="place_id">
                        <input type="hidden" name="id" value="" id="id">
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
                        <input type="hidden" name="total" id="total">
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