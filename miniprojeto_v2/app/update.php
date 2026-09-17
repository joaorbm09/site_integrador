<?php 
require_once __DIR__ . '/../includes/functions.php';

$mensagem = '';
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$aluno = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])) {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? '';
    $turma = $_POST['turma'] ?? '';
    $email = $_POST['email'] ?? '';
    $nasc = $_POST['nasc'] ?? '';
    $ativo = $_POST['ativo'] ?? 'false';

    if (!empty($id) && !empty($nome) && !empty($turma) && !empty($email)) {
        if (atualizarAluno($conexao, $id, $nome, $turma, $nasc, $ativo, $email)) {
            $mensagem = '<p style="color: green;">Aluno atualizado com sucesso!</p>';
        } else {
            $mensagem = '<p style="color: red;">Erro ao atualizar aluno.</p>';
        }
    } else {
        $mensagem = '<p style="color: orange;">Preencha todos os campos obrigatórios.</p>';
    }
}

if ($id) {
    $aluno = buscarAlunoPorId($conexao, $id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Aluno</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h2>Atualizar Cadastro de Aluno</h2>
        <?php echo $mensagem; ?>

        <!-- Formulário para buscar o ID do aluno -->
        <form action="" method="get">
            <label for="id">ID do Aluno para editar: </label>
            <input type="number" name="id" id="id" value="<?php echo htmlspecialchars($id ?? ''); ?>" required>
            <input type="submit" value="Carregar Aluno">
        </form>

        <br><hr><br>

        <?php if ($aluno): ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($aluno['id']); ?>">
                <input type="hidden" name="atualizar" value="1">

                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required><br><br>

                <label for="turma">Turma: </label>
                <input type="text" name="turma" id="turma" value="<?php echo htmlspecialchars($aluno['turma']); ?>" required><br><br>

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($aluno['email']); ?>" required><br><br>

                <label for="nasc">Nascimento: </label>
                <input type="date" name="nasc" id="nasc" value="<?php echo htmlspecialchars($aluno['nascimento'] ?? ''); ?>"><br><br>

                <label>Ativo?</label><br>
                <?php $isAtivo = ($aluno['ativo'] === true || $aluno['ativo'] === 't' || $aluno['ativo'] == 1); ?>
                <input type="radio" name="ativo" id="ativo_sim" value="true" <?php echo $isAtivo ? 'checked' : ''; ?>>
                <label for="ativo_sim">Sim!</label>
                <input type="radio" name="ativo" id="ativo_nao" value="false" <?php echo !$isAtivo ? 'checked' : ''; ?>>
                <label for="ativo_nao">Não!</label><br><br>

                <input type="submit" value="Salvar Alterações">
            </form>
        <?php elseif ($id): ?>
            <p style="color: red;">Nenhum aluno foi encontrado com o ID <?php echo htmlspecialchars($id); ?>.</p>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>