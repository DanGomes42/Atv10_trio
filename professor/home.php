<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "aulas_atv10";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['create'])) {
    $id = $_POST['id'];
    $nome_professor = $_POST['nome_professor'];
    $especialidade = $_POST['especialidade'];
    $email = $_POST['email'];

    $sql = "INSERT INTO aulas (nome_professor, especialidade, email) VALUES ('$nome_professor', '$especialidade', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo pedido adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome_professor = $_POST['nome_professor'];
    $especialidade = $_POST['especialidade'];
    $email = $_POST['email'];
    $sql = "UPDATE diaria SET horario='$horario', disciplina='$disciplina'
    , sala='$sala', data_aula='$data_aula', atividades='$atividades', observacoes='$observacoes', nome_professor='$nome_professor' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Aula atualizada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM diaria WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Aula excluída com sucesso!";
    } else {
        echo "Erro ao excluir a aula: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM aulas");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Diário do Professor</title>
</head>
<body>

<a href="index.php">Voltar</a>

<h2>Criar Aula</h2>
<form method="POST" action="">
    Horário: <input type="float" name="horario" required><br><br>
    Disciplina: <input type="text" name="disciplina" required><br><br>
    Sala: <input type="number" name="sala" required><br><br>
    Data da aula: <input type="date" name="data_aula" required><br><br>
    Atividades: <input type="text" name="atividades" required><br><br>
    Observações: <input type="text" name="observacoes" required><br><br>
    Nome do Professor: <input type="text" name="nome_professor" required><br><br>
    <input type="submit" name="create" value="Adicionar Aula">
</form>

<h2>Lista de aulas</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Horário</th>
        <th>Disciplina</th>
        <th>Sala</th>
        <th>Data da aula</th>
        <th>Atividades</th>
        <th>Observações</th>
        <th>Nome do Professor</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['horario']; ?></td>
        <td><?php echo $row['disciplina']; ?></td>
        <td><?php echo $row['sala']; ?></td>
        <td><?php echo $row['data_aula']; ?></td>
        <td><?php echo $row['atividades']; ?></td>
        <td><?php echo $row['observacoes']; ?></td>
        <td><?php echo $row['nome_professor']; ?></td>
        <td>
            <a href="delete.php?id=<?php echo $row['id']; ?>">Excluir</a>
            <a href="atualizar.php?id=<?php echo $row['id']; ?>">Update</a>
        </td>
    </tr>
    <?php } ?>
</table>


</body>
</html>

<?php $conn->close(); ?>