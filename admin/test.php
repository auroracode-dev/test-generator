<?php include('./template/header.php'); ?>

<?php  
require_once('../config/Database.php');
$db = (new Database())->connect();

$test_title = $_GET['title'];
$test_id = $_GET['test_id'];


$query = "SELECT * FROM questions WHERE test_id='$test_id'";
$result = $db->query($query);

?>

<div class="d-flex align-items-center justify-content-between">
    <p class="fs-1"><?= $test_title ?></p>
    
    <a href="/admin/add_question.php" class="btn btn-primary fs-5">Agregar una pregunta</a>
</div>

<?php while($item = $result->fetch_assoc()) { ?>
<div class="card">
    <div class="card-header pb-3">
        <?= $item['question']; ?> 

        <a href="/admin/edit_question.php" class="btn btn-primary">Editar pregunta</a>
        <a href="/admin/delete_question.php" class="btn btn-danger mx-2">Eliminar pregunta</a>
    </div>
    <div class="card-body">
        <ul type="a" class="list-group">
            <li class="list-group-item">A. <?= $item['answer_a']; ?></li>
            <li class="list-group-item">B. <?= $item['answer_b']; ?></li>
            <li class="list-group-item">C. <?= $item['answer_c']; ?></li>
            <li class="list-group-item">D. <?= $item['answer_d']; ?></li>
        </ul>
    </div>
</div>
<?php } ?>

<?php include('./template/footer.php'); ?>
