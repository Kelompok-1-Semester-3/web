<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?= $data['title'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL ?>/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Custom styles for this template -->
    <link href="<?= BASE_URL ?>/css/dashboard.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/css/datatables.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/css/mystyleDashboard.css" rel="stylesheet" type="text/css">
</head>

<body>

    <header class="navbar navbar-light bg-transparent position-sticky flex-md-nowrap p-0 py-4 mb-2">
        <div class="container-fluid">
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav ms-auto">
                <div class="nav-item">
                    <div class="d-flex align-items-center">
                        <a href="<?= BASE_URL ?>/po_dashboard" class="d-flex text-dark" style="text-decoration: none;">
                            <img src=" <?= ($data['account']['profile'] == '') ? BASE_URL . '/img/user_sample.png' : BASE_URL . '/img/' . $data['account']['profile'] ?>" width="40" class="rounded-circle img-fluid" alt="">
                            <p class="my-auto ms-3 me-2"><strong><?= $data['account']['fullname'] ?></strong></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>