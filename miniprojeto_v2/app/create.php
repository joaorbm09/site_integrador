<?php 
require_once __DIR__ . '/../includes/functions.php';

$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $turma = $_POST['turma'] ?? '';
    $email = $_POST['email'] ?? '';
    $nasc = $_POST['nasc'] ?? '';
    $ativo = $_POST['ativo'] ?? 'false';

    if (!empty($nome) && !empty($turma) && !empty($email)) {
        if (cadastrar($conexao, $nome, $turma, $nasc, $ativo, $email)) {
            $mensagem = '<p style="color: green;">Aluno cadastrado com sucesso!</p>';
        } else {
            $mensagem = '<p style="color: red;">Erro ao cadastrar aluno.</p>';
        }
    } else {
        $mensagem = '<p style="color: orange;">Por favor, preencha todos os campos obrigatórios.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h2>Cadastrar Novo Aluno</h2>
        <?php echo $mensagem; ?>
        <br>
        <form action="" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required><br><br>

            <label for="turma">Turma: </label>
            <input type="text" name="turma" id="turma" required><br><br>

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="nasc">Nascimento: </label>
            <input type="date" name="nasc" id="nasc"><br><br>

            <label>Ativo?</label><br>
            <input type="radio" name="ativo" id="ativo_sim" value="true" checked>
            <label for="ativo_sim">Sim!</label>
            <input type="radio" name="ativo" id="ativo_nao" value="false">
            <label for="ativo_nao">Não!</label><br><br>

            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </form>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>