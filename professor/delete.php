<?php
require_once "db.php";
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM professores WHERE id_professor=?");

$stmt->execute([$id]);

header('Location: home.php');
exit;

