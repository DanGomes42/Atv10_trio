<?php
require_once "db.php";
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM aulas WHERE id=?");

$stmt->execute([$id]);

header('Location: home.php');
exit;

