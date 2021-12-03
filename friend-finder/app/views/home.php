<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASE_URL ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/mystyle.css">

    <title>Hello, world!</title>
</head>

<body>

    <!-- navbar -->
    <nav class="d-flex flex-wrap mt-4 container align-items-center justify-content-center justify-content-md-between py-3">
        <a href="/" class="d-flex my-nav-brand align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <div class="d-flex align-items-center">
                <img src="<?= BASE_URL ?>/img/logo2.png" width="40" height="40" alt="">
                <h4 class="fw-bold my-auto ms-2">Friend Finder</h4>
            </div>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link me-2 px-2 link-dark active">Event</a></li>
            <li><a href="#" class="nav-link me-2 px-2 link-dark">New Event</a></li>
            <li><a href="#" class="nav-link me-2 px-2 link-dark">Contributors</a></li>
        </ul>

        <div class="col-md-4 text-end">
            <div class="d-flex justify-content-end">
                <a href="<?= BASE_URL ?>/auth/sign_in" class="btn btn-light me-3">Sign in</a>
                <a href="<?= BASE_URL ?>/auth/sign_up" class="btn btn-primary btn-shadow">Sign up</a>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="container mt-5">
        <!-- hero -->
        <section class="hero">
            <div class="row my-auto align-items-center">
                <div class="col-md-6 ">
                    <h1 class="fw-bold">Friend Finder</h1>
                    <p class="fw-light">Friend finder is a friend finder application, event maker, place finder for those of you who want to do activities together quickly and effectively</p>

                    <a href="<?= BASE_URL ?>/auth/sign_up" class="btn btn-primary mt-4 btn-shadow">Get Started</a>
                </div>
                <div class="col-md-6 text-end">
                    <img src="<?= BASE_URL ?>/img/hero2.svg" width="500" class="img-fluid">
                </div>
            </div>
        </section>
        <!-- end hero -->

        <!-- New Events -->
        <section class="event">
            <div class="row my-section-title my-event-title">
                <h3 class="text-center">New Event</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= BASE_URL ?>/img/sample_event1.jpg" alt="" class="img-fluid">
                    <p class="mt-4 h6">Design | Coding</p>
                    <h3 class="mt-2 my-event-title">Hack A Design</h3>
                    <p class="mt-3 my-event-description">Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia in
                        deserunt mollit anim id est sint laborum.</p>
                    <button class="btn btn-primary mt-4">Detail</button>
                </div>
                <div class="col-md-4">
                    <img src="<?= BASE_URL ?>/img/sample_event2.jpg" alt="" class="img-fluid">
                    <p class="mt-4 h6">Design | Coding</p>
                    <h3 class="mt-2 my-event-title">Hackacton 21K</h3>
                    <p class="mt-3 my-event-description">Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia in
                        deserunt mollit anim id est sint laborum.</p>
                    <button class="btn btn-primary mt-4">Detail</button>
                </div>
                <div class="col-md-4">
                    <img src="<?= BASE_URL ?>/img/sample_event3.jpg" alt="" class="img-fluid">
                    <p class="mt-4 h6">Game | Tournament</p>
                    <h3 class="mt-2 my-event-title">AR Mobile Racing</h3>
                    <p class="mt-3 my-event-description">Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia in
                        deserunt mollit anim id est sint laborum.</p>
                    <button class="btn btn-primary mt-4">Detail</button>
                </div>
            </div>
            <!-- <div class="row my-section-title my-event-title">
                <div class="col text-center">
                    <button class="btn btn-primary">More</button>
                </div>
            </div> -->
        </section>
        <!-- end event -->

        <!-- sport -->
        <section class="sport">
            <div class="row my-section-title my-event-title">
                <div class="col text-center">
                    <h3>Category</h3>
                </div>
            </div>
            <div class="row my-auto align-items-center">
                <div class="col-md-5">
                    <h1 class="fw-bold">Sport</h1>
                    <p class="fw-light mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero odit magni rerum animi minima atque laboriosam consectetur rem, cumque vel, modi non molestiae eaque ipsum eius corporis,</p>

                    <button class="btn btn-primary mt-4 btn-shadow">Get Started</button>
                </div>
                <div class="col-md-6 ms-auto">
                    <img src="<?= BASE_URL ?>/img/sport.svg" class="img-fluid">
                </div>
            </div>
        </section>
        <!-- end sport -->

        <!-- education -->
        <section class="education">
            <div class="row my-auto align-items-center">
                <div class="col-md-6">
                    <img src="<?= BASE_URL ?>/img/education.svg" class="img-fluid">
                </div>
                <div class="col-md-5 ms-auto">
                    <h1 class="fw-bold">Education</h1>
                    <p class="fw-light mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero odit magni rerum animi minima atque laboriosam consectetur rem, cumque vel, modi non molestiae eaque ipsum eius corporis,</p>
                    <button class="btn btn-primary mt-4 btn-shadow">Get Started</button>
                </div>
            </div>
        </section>
        <!-- end education -->

        <!-- mobile -->
        <section class="mobile">
            <div class="row my-auto align-items-center">
                <div class="col-md-5">
                    <h1 class="fw-bold">Mobile Game</h1>
                    <p class="fw-light mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero odit magni rerum animi minima atque laboriosam consectetur rem, cumque vel, modi non molestiae eaque ipsum eius corporis,</p>
                    <button class="btn btn-primary mt-4 btn-shadow">Get Started</button>
                </div>
                <div class="col-md-6 ms-auto">
                    <img src="<?= BASE_URL ?>/img/mobile.svg" class="img-fluid">
                </div>
            </div>
        </section>
        <!-- end mobile -->


        <!-- contributors -->
        <section class="contributor">
            <div class="row my-section-title my-event-title">
                <h2 class="text-center">Contributors</h2>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <img width="200" src="<?= BASE_URL ?>/img/sample_event1.jpg" class="img-fluid rounded-circle">
                    <h4 class="mt-4 my-event-title">M Fahmi</h4>
                    <h6 class="text-muted">Team Leader</h6>
                </div>
                <div class="col-md-3 text-center">
                    <img width="200" src="<?= BASE_URL ?>/img/sample_event2.jpg" class="img-fluid rounded-circle">
                    <h4 class="mt-4 my-event-title">Moh Ibnu</h4>
                    <h6 class="text-muted">Team Leader</h6>
                </div>
                <div class="col-md-3 text-center">
                    <img width="200" src="<?= BASE_URL ?>/img/sample_event3.jpg" class="img-fluid rounded-circle">
                    <h4 class="mt-4 my-event-title">Thariks Ibnu A.</h4>
                    <h6 class="text-muted">Team Leader</h6>
                </div>
                <div class="col-md-3 text-center">
                    <img width="200" src="<?= BASE_URL ?>/img/sample_event2.jpg" class="img-fluid rounded-circle">
                    <h4 class="mt-4 my-event-title">Rifqi V</h4>
                    <h6 class="text-muted">Team Leader</h6>
                </div>
            </div>
        </section>




    </div>



    <script src="<?= BASE_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/js/jquery.js"></script>

</body>

</html>