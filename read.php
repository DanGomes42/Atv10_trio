
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "aulas_atv10";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>

<?php

include 'db.php';

$sql = "SELECT * FROM user";

$result = $conn -> query($sql);

if ($result -> num_rows > 0){
    echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Especialidade </th>
        </tr>";
        while($row = $result -> fetch_assoc()){
            echo "<tr>
                    <td> {$row['id']} </td>
                    <td> {$row['name']} </td>
                    <td> {$row['email']} </td>
                    <td> {$row['especialidade']} </td>
                    <td>
                        <a href='update.php?id={$row['id']}'>Editar</a> |
                        <a href='delete.php?id={$row['id']}'>Excluir</a>
                    </td>
                </tr>";
        }
    echo "</table>";
}else{
    echo "Nenhum registro encontrado.";
}
$conn -> close();

?>

<a href="create.php">Adicionar Aula</a>
