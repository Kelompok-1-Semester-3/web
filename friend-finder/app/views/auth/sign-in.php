<!doctype html>
<html lang="en" class="h-100">

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
                    <a href="<?= BASE_URL ?>/auth/sign_up" class="btn btn-outline-primary btn-shadow">Create Account</a>
                </div>
            </div>
        </nav>
        <!-- end navbar -->

        <div class="container align-items-center my-auto">

            <div class="row align-self my-auto-center justify-content-center">
                <div class="col-md-4">
                    <?= Flasher::flash() ?>
                    <div class="row">
                        <h2 class="text-center">Sign In</h2>
                    </div>
                    <div class="row">
                        <form action="<?= BASE_URL ?>/auth/login" method="POST">
                            <div class="col form-component">
                                <div class="mb-3">
                                    <label for="email" class="form-label my-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label my-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <button class="btn w-100 btn-primary btn-sign-in mt-4 btn-shadow">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mt-auto container d-flex justify-content-between">
            <h6 class="fw-semibold">Made by Kelompok 1</h6>
            <div class="d-flex">
                <h6 class="fw-semibold me-4 color-primary">instagram: @friendfinder</h6>
                <h6 class="fw-semibold color-primary">Tugas akhir workshop</h6>
            </div>
        </footer>
    </div>



    <script src="<?= BASE_URL ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/js/jquery.js"></script>

</body>

</html>