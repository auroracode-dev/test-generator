<?php include('./template/header.php') ?>

<?php  
require_once('../config/Database.php');

$db = (new Database())->connect();

/* Get tests */
$result = $db->query("SELECT * FROM tests ORDER BY id DESC");

/* Create new test */
$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$action = $_POST['action'];

if(!empty($title)){
    $query = "INSERT INTO tests (title, description, user_id) VALUES (?,?,?);";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssi', $title, $description, $user_id);
    $stmt->execute();
}

?>

<!-- Render view -->
<div class="row mt-5">
    <div class="col-md-5">
        <form method="POST" class="card">
            <div class="card-header fs-4">Crear un nuevo Test</div>
            <div class="card-body">
                <div class="form group">
                    <label for="title" class="form-label">Ingrese el titulo del test</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form group mt-2">
                    <label for="description" class="form-label">Ingrese una descripción</label>
                    <textarea name="description" id="description" cols="20" rows="5" class="form-control"></textarea>
                </div>
                <button name="action" value="create" type="submit" class="btn btn-primary mt-4 w-100">Crear test</button>
            </div>
        </form>
    </div>

    <!-- Render tests -->
    <div class="col">
        <?php while($test = $result->fetch_assoc()) {?>
        <div class="card mb-4">
            <div class="card-header fs-5"><?= $test['title'] ?></div>
            <div class="card-body">
                <p><?= $test['description'] ?></p>
                <div>
                <a href="/admin/test.php?test_id=<?= $test['id'] ?>&title=<?= $test['title'] ?>" class="btn btn-primary">Ver test</a>
                    <button class="btn btn-success mx-2">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                    <button class="btn btn-info mx-2">Presentar test</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include('./template/footer.php') ?>
