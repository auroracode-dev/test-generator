<?php
require_once('../middlewares/auth.php');

require_once('../config/Database.php');

$db = (new Database)->connect();

$test_id = $_GET['test_id'];

$db->query("DELETE FROM questions WHERE test_id='$test_id'");
$db->query("DELETE FROM tests WHERE id='$test_id'");

header('Location: /admin');