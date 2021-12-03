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
                    <h3 class="color-primary mt-3"><?= $data['total_event']['total'] ?></h3>
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
                    <h3 class="color-warning mt-3"><?= $data['self_event']['total'] ?></h3>
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
        <p class="h2">Your Events</p>
        <button type="button" class="btn btn-primary" id="btnTambahData" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Event
        </button>
    </div>
    <div class="row">
        <?php if (empty($data['events'])) : ?>
            <h2 class="text-center mt-4">Tidak ada event</h2>
        <?php else : ?>
            <?php foreach ($data['events'] as $event) : ?>
                <div class="col-md-6 col-lg-4">
                    <!-- Bootstrap 5 card box -->
                    <div class="card-box">
                        <div class="card-thumbnail">
                            <img src="<?= BASE_URL ?>/img/<?= $event['event_picture'] ?>" class="img-fluid" alt="">
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <span class="color-danger fw-semibold">
                                    <?php foreach ($data['categories'] as $category) : ?>
                                        <?= ($category['id'] == $event['category_id']) ? $category['name'] : '' ?>
                                    <?php endforeach; ?>
                                </span>
                                <h4 class="mt-1"><strong><?= $event['name_event'] ?></strong></h4>
                                <span class="color-secondary mt-0 py-0"><?= $data['account']['fullname'] ?></span>
                                <ul class="list-unstyled mt-3">
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <span data-feather="tag" class="me-2 color-primary"></span>IDR <?= $event['price'] ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <span data-feather="map-pin" class="me-2 color-primary"></span><?= $event['location'] ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <span data-feather="calendar" class="me-2 color-primary"></span><?= $event['event_start_date'] ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col d-flex justify-content-between">
                                <a href="<?= BASE_URL ?>/event/detail/<?= $event['id'] ?>" class="btn btn-primary btn-shadow">JOIN</a>
                                <div class="d-flex">
                                    <a href="<?= BASE_URL ?>/event/edit/<?= $event['id'] ?>" class="me-2 btn btn-warning btn-shadow"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteEvent">
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/event/insert" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="event_picture">
                        <input type="hidden" name="created_by">
                        <label for="name_event" class="form-label">Name</label>
                        <input type="text" name="name_event" id="name_event" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="event_owner" class="form-label">Owner</label>
                        <input type="text" name="event_owner" id="event_owner" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="event_picture" class="form-label">Event Picture</label>
                        <input type="file" name="event_picture" id="event_picture" class="form-control">
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
                        <label for="event_start_date" class="form-label">Start Date</label>
                        <input type="date" name="event_start_date" id="event_start_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="event_end_date" class="form-label">End Date</label>
                        <input type="date" name="event_end_date" id="event_end_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control">
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

<!-- Modal For delete event -->
<!-- Modal -->
<div class="modal fade" id="modalDeleteEvent" tabindex="-1" aria-labelledby="modalDeleteEventLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteEventLabel">Attention!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?= BASE_URL ?>/event/delete/<?= $event['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>