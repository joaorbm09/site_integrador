<?php 
require_once __DIR__ . '/connect.php';

echo "<h2>Instalador Automático do Banco de Dados HighTech</h2>";

if (!$conexao) {
    die("<p style='color:red;'>Erro: Não foi possível conectar ao banco de dados PostgreSQL. Verifique o arquivo connect.php.</p>");
}

try {
    $sql_script = file_get_contents(__DIR__ . '/schema.sql');
    $conexao->exec($sql_script);
    echo "<p style='color:green;'>✅ Tabela de Cursos, Alunos e Matrículas criadas e cadastradas com sucesso no PostgreSQL!</p>";
    echo "<p><a href='../portal_empresa.php'>Clique aqui para acessar o Portal HighTech</a></p>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Erro ao executar script SQL: " . $e->getMessage() . "</p>";
}
?>
