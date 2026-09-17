<?php 
$host = "192.168.10.52";
$dbname = "escola";
$user = "escola";
$pass = "senha2";

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
    // Conexão estabelecida com sucesso
} catch (PDOException $e){
    echo "Erro: ". $e->getMessage();
}
?>