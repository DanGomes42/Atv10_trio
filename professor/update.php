<?php

require_once "db.php";


$id = $_POST['id'];
$nome_professor = $_POST['nome_professor'];
$especialidade = $_POST['especialidade'];
$email = $_POST['email'];


$stmt = $conn->prepare("UPDATE professores SET nome_professor=?, especialidade=?, email=? WHERE id_professor=?");

$stmt->execute([$especialidade, $email, $nome_professor, $id]);

header('Location: professor/home.php');
exit;

