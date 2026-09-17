<?php 
require_once __DIR__ . '/../includes/functions.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;
$aluno = null;
$mensagem = '';

if ($id) {
    $aluno = buscarAlunoPorId($conexao, $id);
    if (!$aluno) {
        $mensagem = '<p style="color: red;">Aluno não encontrado com o ID informado.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Aluno</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h2>Consultar Aluno Específico</h2>
        <form action="" method="get">
            <label for="id">ID do Aluno: </label>
            <input type="number" name="id" id="id" value="<?php echo htmlspecialchars($id ?? ''); ?>" required>
            <input type="submit" value="Buscar">
        </form>

        <br>
        <?php echo $mensagem; ?>

        <?php if ($aluno): ?>
            <div style="border: 1px solid #ccc; padding: 15px; width: 300px;">
                <h3>Dados do Aluno</h3>
                <p><strong>ID:</strong> <?php echo htmlspecialchars($aluno['id']); ?></p>
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($aluno['nome']); ?></p>
                <p><strong>Turma:</strong> <?php echo htmlspecialchars($aluno['turma']); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($aluno['email']); ?></p>
                <p><strong>Nascimento:</strong> <?php echo htmlspecialchars($aluno['nascimento'] ?? ''); ?></p>
                <p><strong>Ativo:</strong> <?php echo ($aluno['ativo'] === true || $aluno['ativo'] === 't' || $aluno['ativo'] == 1) ? 'Sim' : 'Não'; ?></p>
                
                <a href="update.php?id=<?php echo $aluno['id']; ?>">Editar</a> | 
                <a href="delete.php?id=<?php echo $aluno['id']; ?>">Excluir</a>
            </div>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>