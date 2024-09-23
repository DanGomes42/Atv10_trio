<?php
// Conexão com o banco de dados (substitua os dados)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "aulas_atv10";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();   

}

// Função para inserir uma nova aula
function createAula($data, $disciplina, $assunto, $atividades, $observacoes) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO aulas (data, disciplina, assunto, atividades, observacoes) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$data, $disciplina, $assunto, $atividades, $observacoes]);
}

// Função para listar todas as aulas
function readAulas() {
    global $conn;
    $stmt = $conn->query("SELECT * FROM aulas");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// ... outras funções para atualizar e deletar

// Exemplo de uso:
createAula("2024-04-01", "Matemática", "Equações de segundo grau", "Resolver exercícios", "Aluno João teve dificuldade");
$aulas = readAulas();
foreach ($aulas as $aula) {
    echo "Data: " . $aula['data'] . "<br>";
    // ... outros dados
}