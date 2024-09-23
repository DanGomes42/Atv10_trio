<?php
// Conexão com o banco de dados (mesma conexão utilizada em outros arquivos)
// ...

// Recebe o ID da aula a ser excluída pela URL
$id = $_GET['id'];

// Prepara a query
$stmt = $conn->prepare("DELETE FROM aulas WHERE id=?");

// Executa a query
$stmt->execute([$id]);

// Redireciona para a página de listagem
header('Location: read.php');
exit;