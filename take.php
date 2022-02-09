<?php
include_once('./middlewares/auth.php');
require_once('./config/Database.php');

$db = (new Database())->connect();

$test_id = $_GET['test_id'];

$questions = $db->query("SELECT tests.title, questions.* FROM tests LEFT JOIN questions ON questions.test_id = tests.id WHERE tests.id = '$test_id'");

$test_title = ($questions->fetch_assoc())['title'];

include('./template/header.php');
?>

<h1 class="fs-2 mt-4"><?= $test_title ?></h1>

<form action="validation_test.php" method="POST">
    <?php while ($question = $questions->fetch_assoc()) { ?>

        <div class="card mt-4">
            <div class="card-header fs-5 px-4"><?= $question['question'] ?></div>
            <div class="card-body px-4">
                <div class="form-group mb-4">
                    <label for="res_<?= $question['id'] ?>" class="form-label fs-6">Seleccione su respuesta</label>
                    <select class="form-select" name="res_<?= $question['id'] ?>" id="res_<?= $question['id'] ?>">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>

                <p class="mt-2"><span class="fw-bold fs-5">A.</span> <?= $question['answer_a'] ?></p>
                <p class="mt-2"><span class="fw-bold fs-5">B.</span> <?= $question['answer_b'] ?></p>
                <p class="mt-2"><span class="fw-bold fs-5">C.</span> <?= $question['answer_c'] ?></p>
                <p class="mt-2"><span class="fw-bold fs-5">D.</span> <?= $question['answer_d'] ?></p>
            </div>
        </div>

    <?php } ?>

    <button type="submit" class="btn btn-success btn-lg float-end mt-4">Enviar Test</button>
</form>

<?php
include('./template/footer.php');
?>