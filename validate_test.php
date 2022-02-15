<?php
include_once('./middlewares/auth.php');
include_once('./config/Database.php');

$test_id = $_POST['test_id'];


$db = (new Database())->connect();
$query = $db->query("SELECT id, correct FROM questions WHERE test_id = '$test_id'");
$num_questions = $query->num_rows;

$correct_questions = 0;

while ($question = $query->fetch_assoc()) {
    $user_res=$_POST['res_'.$question['id']];
    if ($user_res == $question['correct']) {
        $correct_questions += 1;
    }
}

$stmt = $db->prepare("INSERT INTO scores (user_id, test_id, score) VALUES (?,?,?)");
$stmt->bind_param('iis', $_SESSION['user_id'], $test_id, $correct_questions);
$stmt->execute();

header('Location: /student_view.php');