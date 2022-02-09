<?php
include_once('./middlewares/auth.php');
require_once('./config/Database.php');

$db = (new Database)->connect();

$user_id = $_SESSION['user_id'];
$user_grade = $_SESSION['grade_id'];

$tests = $db->query("SELECT tests.id, tests.title, tests.description, scores.* FROM tests LEFT JOIN scores ON scores.test_id=tests.id WHERE tests.grade_id='$user_grade' AND (scores.user_id!='$user_id' OR scores.id IS NULL)");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Students</title>

    <!-- Bootswatch import -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 fs-3">Dashboard</span>

            <ul class="navbar-nav mx-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['fullname'] ?>
                    </a>
                    <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Cerrar sesiòn</a></li>
                    </ul>
                </li>
            </ul>

        </div>

    </nav>

    <!-- Conatainer -->
    <div class="container">
        <h1 class="fs-2 my-4">Evaluaciones sin presentar</h1>
        
        <?php while ($test = $tests->fetch_assoc()) { ?>

            <div class="card mt-4">
                <div class="card-header"><?= $test['title'] ?></div>
                <div class="card-body"> 
                    <p><?= $test['description'] ?></p>
                    <a href="#" class="btn btn-primary">Presentar Evaluaciones</a>
                </div>
            </div>

        <?php } ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>