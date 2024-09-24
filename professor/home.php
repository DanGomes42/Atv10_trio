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
    $nome_professor = $_POST['nome_professor'];
    $especialidade = $_POST['especialidade'];
    $email = $_POST['email'];

    $sql = "INSERT INTO professores (nome_professor, especialidade, email) VALUES ('$nome_professor', '$especialidade', '$email')";

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

$result = $conn->query("SELECT * FROM professores");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Diário do Professor</title>
</head>
<body>

<a href="../index.php">Voltar</a>

<h2>Cadastrar Professor</h2>
<form method="POST" action="">
    Nome do Professor: <input type="text" name="nome_professor" required><br><br>
    Especialidade: <input type="text" name="especialidade" required><br><br>
    Email: <input type="text" name="email" required><br><br>
   
    <input type="submit" name="create" value="Adicionar Professor">
</form>

<h2>Lista de professores</h2>
<table border="1">
    <tr>
        <th>Nome do Professor</th>
        <th>Especialidade</th>
        <th>Email</th>
        <th>Ações </th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['nome_professor']; ?></td>
        <td><?php echo $row['especialidade']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <a href="delete.php?id=<?php echo $row['id_professor']; ?>">Excluir</a>
            <a href="atualizar.php?id=<?php echo $row['id_professor']; ?>">Atualizar</a>
        </td>
    </tr>
    <?php } ?>
</table>


</body>
</html>

<?php $conn->close(); ?>