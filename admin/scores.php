<?php
require_once('../middlewares/auth.php');
require_once('../config/Database.php');
include('./template/header.php');

$db = (new Database)->connect();

$test_id = $_GET['test_id'];
$test_title = $_GET['title'];

$students = $db->query("SELECT users.id, users.fullname, scores.score as correct_questions FROM scores LEFT JOIN users ON scores.user_id = users.id WHERE scores.test_id='$test_id' ORDER BY scores.score DESC");

$query = $db->query("SELECT id FROM questions WHERE test_id='$test_id'");
$num_questions = $query->num_rows;

?>

<p class="mt-4 fs-2"><?= $test_title ?></p>

<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre completo</th>
            <th scope="col">Preguntas Correctas</th>
            <th scope="col">Preguntas Incorrectas</th>
            <th scope="col">Nota</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($student = $students->fetch_assoc()) { ?>

            <tr>
                <th scope="row"><?= $student['id'] ?></th>
                <td><?= $student['fullname'] ?></td>
                <td><?= $student['correct_questions'] ?></td>
                <td><?=$num_questions - $student['correct_questions'] ?></td>
                <td><?= round(($student['correct_questions'] * 5)/$num_questions, 1) ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>