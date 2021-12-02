<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?= Flasher::flash() ?>
    <div class="d-block flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <p class="h2">Personal Details</p>
        <p>This section includes your personal data, change your password </p>
    </div>
    <div class="row">
        <div class="card card-box">
            <!-- event picture -->
            <form action="<?= BASE_URL ?>/account/update" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $data['account']['id']; ?>">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?= ($data['account']['profile'] == '') ? BASE_URL . '/img/user_sample.png' : BASE_URL . '/img/' . $data['account']['profile'] ?>" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="col-md-4 align-self-center mt-4">
                                <input type="hidden" name="profile">
                                <input type="file" name="profile" class="form-control mb-2">
                                <p class=" text-muted">Your can add your profile picture. Only JPG, PNG, and GIF to allow permission</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- event details -->
                <div class="row mt-4">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $data['account']['fullname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?= $data['account']['phone'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?= $data['account']['email'] ?>">
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