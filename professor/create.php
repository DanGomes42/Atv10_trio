<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $nome_professor = $_POST['nome_professor'];
    $especialidade = $_POST['despecialidade'];
    $email = $_POST['email'];

  
   
   
    

    $stmt = $conn->prepare("INSERT INTO aulas (horario, disciplina, sala, data_aula, atividades, observacoes, nome_professor) VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$horario, $disciplina, $sala, $data_aula, $atividades, $observacoes, $nome_professor]);

    header('Location: read.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Professor</title>
</head>
<body>
    <h2>Adicionar Novo Professor</h2>
    <form method="post">
        <label for="nome_professor">Nome do Professor:</label> 
        <input type="text" id="text" name="text" required> <br> <br>
        <label for="especialidade">Especialidade:</label> 
        <input type="text" id="text" name="text" required> <br> <br>
        <label for="email">Email:</label>
        <input type="text" id="text" name="text" required><br> <br> 
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>