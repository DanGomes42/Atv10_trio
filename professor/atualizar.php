<?php
require_once "db.php";

$id = null;
$professor = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $response = $conn->query("SELECT * FROM aulas WHERE id = '$id'");

    
    if ($response->num_rows === 1) {
        $professor = $response->fetch_assoc();
    } else {
        $id = null;
    }
}
?>


<?php if ($id === null): ?>
<h1>Professor invalido</h1>
<?php else: ?>
<h2>Atualizar Professor</h2>
<a href="professor/home.php">Voltar</a>

<form method="POST" action="">
    Nome do Professor: <input type="text" name="nome_professor" required value="<?= $professor["nome_professor"] ?>"><br><br>
    Especialidade: <input type="text" name="especialidade" required value="<?= $professor["especialidade"] ?>"><br><br>
    Email: <input type="number" name="email" required value="<?= $professor["email"] ?>"><br><br>
    <input type="submit" name="update" value="Atualizar professor">
</form>
<?php endif ?>