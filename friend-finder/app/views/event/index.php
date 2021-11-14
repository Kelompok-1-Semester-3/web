<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Your Events</p>
    </div>
    <div class="row mb-4 justify-content-between">
        <div class="col-md-6 d-flex">
            <a class="btn btn-primary me-3 mb-2" href="<?= BASE_URL ?>/event">See All</a>
            <div class="col-md-8">
                <form action="<?= BASE_URL ?>/event/category" method="POST">
                    <select class="form-select event-category" name="category_id" id="category">
                        <?php foreach ($data['categories'] as $category) : ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="search" class="form-control search-event" placeholder="Search">
        </div>
    </div>
    <!-- display events -->
    <div class="row row-event">
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
                                <span class="color-secondary mt-0 py-0"><?= $event['event_owner'] ?></span>
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
                            <div class="col">
                                <a href="<?= BASE_URL ?>/event/detail/<?= $event['id'] ?>" class="btn btn-primary btn-shadow">JOIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>