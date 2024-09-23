<?php
// Conexão com o banco de dados (mesma conexão utilizada em outros arquivos)
// ...

// Recebendo os dados do formulário
$id = $_POST['id'];
$horario = $_POST['horario'];
$disciplina = $_POST['disciplina'];
$sala = $_POST['sala'];
$data_aula = $_POST['data_aula'];
$atividades = $_POST['atividades'];
$observacoes = $_POST['observacoes'];
$nome_professor = $_POST['nome_professor'];

// Preparando a query
$stmt = $conn->prepare("UPDATE aulas SET horario=?, disciplina=?, sala=?, data_aula=?, atividades=?, observacoes=?, nome_professor=? WHERE id=?");

// Executando a query
$stmt->execute([$horario, $disciplina, $sala, $data_aula, $atividades, $observacoes, $nome_professor, $id]);

// Redirecionando para a página de listagem
header('Location: read.php');
exit;