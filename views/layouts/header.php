<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - SIPATKA</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand bg-custom-header align-items-center px-3">
    <div class="d-flex align-items-center">
        <img src="../assets/img/logobg.png" width="40" class="me-2" alt="Logo SIPATKA">
        <a class="navbar-brand m-0 text-white fw-bold" href="../admin/index.php">
            SIPATKA
        </a>
    </div>
    <button class="btn btn-link btn-sm ms-3" id="sidebarToggle">
        <i class="fas fa-bars text-white"></i>
    </button>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fas fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="../auth/logout.php">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
</body>