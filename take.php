<?php
include_once('./middlewares/auth.php');
require_once('./config/Database.php');

$db = (new Database())->connect();

$test_id = $_GET['test_id'];
$test_title = $_GET['test_title'];

$questions = $db->query("SELECT * FROM questions WHERE questions.test_id = '$test_id'");

include('./template/header.php');
?>

<h1 class="fs-2 mt-4"><?= $test_title ?></h1>

<form action="validate_test.php" method="POST">

    <input type="hidden" name="test_id" value="<?= $test_id ?>">
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

                <div class="mt-2 d-flex"><span class="fw-bold fs-6 mx-2">A.</span> <?= $question['answer_a'] ?></div>
                <div class="mt-2 d-flex"><span class="fw-bold fs-6 mx-2">B.</span> <?= $question['answer_b'] ?></div>
                <div class="mt-2 d-flex"><span class="fw-bold fs-6 mx-2">C.</span> <?= $question['answer_c'] ?></div>
                <div class="mt-2 d-flex"><span class="fw-bold fs-6 mx-2">D.</span> <?= $question['answer_d'] ?></div>
            </div>
        </div>

    <?php } ?>

    <button type="submit" class="btn btn-success btn-lg float-end my-4">Enviar Test</button>
</form>

<?php
include('./template/footer.php');
?>