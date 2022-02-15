<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test generator - Administrador</title>

    <!-- Bootswatch import -->    
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
     <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <a href="/admin" class="navbar-brand mb-0 fs-3">Dashboard - Administrador</a>

            <ul class="navbar-nav mx-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['fullname'] ?>
                    </a>
                    <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/logout.php">Cerrar sesiòn</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
     
    <div class="container">


