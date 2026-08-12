<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task Management</title>
    <!-- Google Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Dashboard CSS (optional for styling) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fa;
        }

        .sidenav {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, #1a1c2b, #2c2f48);
            color: white;
            position: fixed;
            transition: width 0.3s;
        }

        .sidenav .nav-link {
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
        }

        .sidenav .nav-link:hover,
        .sidenav .nav-link.active {
            background: #4e5d78;
            border-radius: 8px;
        }

        .sidenav .material-icons {
            margin-right: 12px;
        }

        main {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-top {
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navbar-top .nav-user {
            display: flex;
            align-items: center;
        }

        .navbar-top .nav-user i {
            margin-right: 8px;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded mb-4" style="margin-left:250px;">
        <div class="container-fluid">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?? 'Page' ?></li>
            </ol>
            <div class="d-flex align-items-center">
                <span class="me-3">Admin</span>
                <a href="#" class="text-decoration-none text-dark"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </div>
    </nav>