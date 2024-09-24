<?php
require_once "db.php";

$id = null;
$aula = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $response = $conn->query("SELECT * FROM aulas WHERE id = '$id'");

    
    if ($response->num_rows === 1) {
        $aula = $response->fetch_assoc();
    } else {
        $id = null;
    }
}
?>


<?php if ($id === null): ?>
<h1>Aula invalido</h1>
<?php else: ?>
<h2>Atualizar Aula</h2>
<a href="home.php">Voltar</a>

<form method="POST" action="">
    Horário: <input type="float" name="horario" required value="<?= $aula["horario"] ?>"><br><br>
    Disciplina: <input type="text" name="disciplina" required value="<?= $aula["disciplina"] ?>"><br><br>
    Sala: <input type="number" name="sala" required value="<?= $aula["sala"] ?>"><br><br>
    Data da aula: <input type="date" name="data_aula" required value="<?= $aula["data_aula"] ?>"><br><br>
    Atividades: <input type="text" name="atividades" required value="<?= $aula["atividades"] ?>"><br><br>
    Observações: <input type="text" name="observacoes" required value="<?= $aula["observacoes"] ?>"><br><br>
    Nome do Professor: <input type="text" name="nome_professor" required value="<?= $aula["nome_professor"] ?>"><br><br>
    <input type="submit" name="update" value="Atualizar Aula">
</form>
<?php endif ?>