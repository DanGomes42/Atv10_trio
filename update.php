<?php

$id = $_POST['id'];
$horario = $_POST['horario'];
$disciplina = $_POST['disciplina'];
$sala = $_POST['sala'];
$data_aula = $_POST['data_aula'];
$atividades = $_POST['atividades'];
$observacoes = $_POST['observacoes'];
$nome_professor = $_POST['nome_professor'];

$stmt = $conn->prepare("UPDATE aulas SET horario=?, disciplina=?, sala=?, data_aula=?, atividades=?, observacoes=?, nome_professor=? WHERE id=?");

$stmt->execute([$horario, $disciplina, $sala, $data_aula, $atividades, $observacoes, $nome_professor, $id]);

header('Location: read.php');
exit;