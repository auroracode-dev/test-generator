<?php
include_once('../middlewares/auth.php');

include('./template/header.php');

require_once('../config/Database.php');

$db = (new Database())->connect();

/* Create and update test */
$test_id = $_GET['test_edit_id'];
$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$grade = $_POST['grade'];
$description = $_POST['description'];
$action = $_POST['action'];

if (!empty($title)) {
    switch ($action) {
        case 'create':
            $query = "INSERT INTO tests (title, description, user_id, grade_id) VALUES (?,?,?,?);";
            break;
        
        case 'update':
            $query = "UPDATE tests SET title=?, description=?, user_id=?, grade_id=? WHERE id='$test_id'";
            break;
    }

    $stmt = $db->prepare($query);
    $stmt->bind_param('ssii', $title, $description, $user_id, $grade);
    $stmt->execute();
    header('Location: /admin');
}

/* Edit test data */
$test_edit = null;

if (isset($test_id)) {
    $test = $db->query("SELECT * FROM tests WHERE id='$test_id'");
    $test = $test->fetch_assoc();

    $test_edit = $test;
}

/* Get degrees */
$degrees = $db->query("SELECT * FROM degrees");

/* Get tests */
$result = $db->query("SELECT * FROM tests ORDER BY id DESC");


?>

<!-- Render view -->
<div class="row mt-5">
    <div class="col-md-5">
        <form action="<?= isset($test_edit) ? '/admin?test_edit_id='.$test_edit['id'] : '/admin' ?>" method="POST" class="card">
            <div class="card-header fs-4">Crear un nuevo Test</div>
            <div class="card-body">
                <div class="form group">
                    <label for="title" class="form-label">Ingrese el titulo del test</label>
                    <input value="<?= $test_edit['title'] ?>" type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form group">
                    <label for="grade" class="form-label">¿Para cual grado es el test?</label>
                    <select name="grade" id="grade" class="form-select">
                        <?php while ($grade = $degrees->fetch_assoc()) {
                        ?>
                            <option <?php if($test_edit['grade_id'] == $grade['id']){ echo 'selected'; }; ?> value="<?= $grade['id'] ?>"><?= $grade['grade'] ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="form group mt-2">
                    <label for="description" class="form-label">Ingrese una descripción</label>
                    <textarea name="description" id="description" cols="20" rows="5" class="form-control"> <?= $test_edit['description'] ?> </textarea>
                </div>
                <button name="action" value="<?= isset($test_edit) ? 'update' : 'create' ?>" type="submit" class="btn btn-primary mt-4 w-100"><?= isset($test_edit) ? 'Actualizar test' : 'Crear test' ?></button>
            </div>
        </form>
    </div>

    <!-- Render tests -->
    <div class="col">
        <?php while ($test = $result->fetch_assoc()) { ?>
            <div class="card mb-4">
                <div class="card-header fs-5"><?= $test['title'] ?></div>
                <div class="card-body">
                    <p><?= $test['description'] ?></p>
                    <div>
                        <a href="/admin/test.php?test_id=<?= $test['id'] ?>&title=<?= $test['title'] ?>" class="btn btn-primary">Ver test</a>
                        <a href="/admin?test_edit_id=<?= $test['id'] ?>" class="btn btn-success mx-2">Editar</a>
                        <a href="/admin/delete_test.php?test_id=<?= $test['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include('./template/footer.php') ?>