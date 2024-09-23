<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $horario = $_POST['horario'];
    $disciplina = $_POST['disciplina'];
    $sala = $_POST['sala'];
    $data_aula = $_POST['data_aula'];
    $atividades = $_POST['atividades'];
    $observacoes = $_POST['observacoes'];
    $nome_professor = $_POST['nome_professor'];

    $stmt = $conn->prepare("INSERT INTO aulas (horario, disciplina, sala, data_aula, atividades, observacoes, nome_professor) VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$horario, $disciplina, $sala, $data_aula, $atividades, $observacoes, $nome_professor]);

    header('Location: read.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Aula</title>
</head>
<body>
    <h2>Adicionar Nova Aula</h2>
    <form method="post">
        <label for="data">Horário:</label>
        <input type="date" id="data" name="data" required>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>