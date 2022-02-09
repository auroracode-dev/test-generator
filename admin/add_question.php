<?php
include_once('../middlewares/auth.php');

require_once '../config/Database.php';

$db = (new Database)->connect();

$test_id = $_POST['test_id'];

$question = $_POST['question'];
$answer_a =$_POST['answer_a'];
$answer_b =$_POST['answer_b'];
$answer_c =$_POST['answer_c'];
$answer_d =$_POST['answer_d'];
$correct = $_POST['correct'];

$stmt = $db->prepare("INSERT INTO questions(question, answer_a, answer_b, answer_c, answer_d, correct, test_id) VALUES (?,?,?,?,?,?,?)");

$stmt->bind_param('ssssssi', $question, $answer_a, $answer_b, $answer_c, $answer_d, $correct, $test_id);

$stmt->execute();

header("Location: /admin/test.php?test_id=".$test_id."&title=".$_GET['title']);

?>
