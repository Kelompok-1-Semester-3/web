<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Edit Event</p>
    </div>

    <div class="row">
        <?= Flasher::flash() ?>
        <div class="card card-box">
            <!-- event picture -->
            <form action="<?= BASE_URL ?>/event/update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $data['event']['id']; ?>">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= BASE_URL ?>/img/<?= $data['event']['event_picture'] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-4 align-self-center mt-4">
                                <input type="hidden" name="event_picture">
                                <input type="file" name="event_picture" class="form-control mb-2"">
                                <p class=" text-muted">Your must add your event picture. Only JPG, PNG, and GIF to allow permission</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- event details -->
                <div class="row mt-4">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="name_event" class="form-label">Event Name</label>
                            <input type="text" name="name_event" id="name_event" class="form-control" value="<?= $data['event']['name_event'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="event_owner" class="form-label">Event Owner</label>
                            <input type="text" name="event_owner" id="event_owner" class="form-control" value="<?= $data['event']['event_owner'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?= $data['event']['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="<?= $data['event']['location'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description" class="form-control" value="<?= $data['event']['description'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <?php foreach ($data['categories'] as $category) : ?>
                                    <option value="<?= $category['id']; ?>" <?= ($category['id'] == $data['event']['category_id']) ? 'selected' : '' ?>><?= $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Contact Person</label>
                            <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?= $data['event']['contact_person'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="event_start_date" class="form-label">Start Date</label>
                            <input type="date" name="event_start_date" id="event_start_date" class="form-control" value="<?= $data['event']['event_start_date'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="event_end_date" class="form-label">End Date</label>
                            <input type="date" name="event_end_date" id="event_end_date" class="form-control" value="<?= $data['event']['event_end_date'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <a onclick="goBack()" class="btn btn-outline-secondary">BACK</a>
                        <button type="submit" class="btn btn-primary ms-2">SAVE CHANGES</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>