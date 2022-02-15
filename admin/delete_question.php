<?php
include_once('../middlewares/auth.php');

require_once('../config/Database.php');
$db = (new Database)->connect();


$question_id = $_GET['question_id'];

$test_id = $_GET['test_id'];
$test_title =$_GET['test_title'];

$db->query("DELETE FROM questions WHERE id='$question_id'");

header('Location: /admin/test.php?test_id='.$test_id.'&title='.$test_title);