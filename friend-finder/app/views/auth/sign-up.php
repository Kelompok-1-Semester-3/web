<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= BASE_URL ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- my font -->
    <!-- my style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>/css/mystyle.css">

    <style>
        body {
            background-color: #FFFFFF;
        }
    </style>

    <title>Hello, world!</title>
</head>

<body class="h-100">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <!-- navbar -->
        <nav class="d-flex flex-wrap mt-4 container align-items-center justify-content-center justify-content-md-between py-3">
            <a href="<?= BASE_URL ?>" class="d-flex my-nav-brand align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <div class="d-flex align-items-center">
                    <img src="<?= BASE_URL ?>/img/logo2.png" width="40" height="40" alt="">
                    <h4 class="fw-bold my-auto ms-2">Friend Finder</h4>
                </div>
            </a>

            <div class="col-md-4 ms-auto text-end">
                <div class="d-flex justify-content-end">
                    <a href="<?= BASE_URL ?>/auth/sign_in" class="btn btn-outline-primary btn-shadow">Sign In</a>
                </div>
            </div>
        </nav>
        <!-- end navbar -->

        <div class="container align-items-center my-auto">

            <div class="row align-self my-auto-center justify-content-center">
                <div class="col-lg-4">
                    <?= Flasher::flash(); ?>
                    <div class="row">
                        <h2 class="text-center">Sign Up</h2>
                    </div>
                    <div class="row">
                        <form action="<?= BASE_URL ?>/auth/register" method="POST">
                            <div class="col form-component">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label my-label">Fullname</label>
                                    <input required type="text" name="fullname" class="form-control" id="fullname">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label my-label">No Telepon</label>
                                    <input required type="text" name="phone" class="form-control" id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label my-label">Email Address</label>
                                    <input required type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3" id="password_field">
                                    <label for="password" class="form-label my-label">Password</label>
                                    <input required type="password" name="password" class="form-control" id="password">
                                    <small class="text-muted">Min 6 character</small>
                                </div>
                                <button class="btn w-100 btn-primary btn-sign-up btn-shadow mt-4">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container mt-5 d-flex justify-content-between">
            <h6 class="fw-semibold">Made by Kelompok 1</h6>
            <div class="d-flex">
                <p class="fw-normal me-4 text-muted">instagram: @friendfinder</p>
                <p class="fw-normal text-muted">Tugas akhir workshop</p>
            </div>
        </footer>
    </div>



    <script src="<?= BASE_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/js/jquery.js"></script>

</body>

</html>