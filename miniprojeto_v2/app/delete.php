<?php 
require_once __DIR__ . '/../includes/functions.php';

$mensagem = '';
$id = $_GET['id'] ?? $_POST['id'] ?? null;
$aluno = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_exclusao'])) {
    $id = $_POST['id'] ?? null;
    if ($id && excluirAluno($conexao, $id)) {
        $mensagem = '<p style="color: green;">Aluno excluído com sucesso!</p>';
        $aluno = null;
        $id = null;
    } else {
        $mensagem = '<p style="color: red;">Erro ao excluir o aluno.</p>';
    }
} else if ($id) {
    $aluno = buscarAlunoPorId($conexao, $id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h2>Excluir Aluno</h2>
        <?php echo $mensagem; ?>

        <form action="" method="get">
            <label for="id">ID do Aluno: </label>
            <input type="number" name="id" id="id" value="<?php echo htmlspecialchars($id ?? ''); ?>" required>
            <input type="submit" value="Buscar">
        </form>

        <br>

        <?php if ($aluno): ?>
            <div style="border: 1px solid #ff4d4d; padding: 15px; width: 320px; background-color: #fff0f0;">
                <h3 style="color: #cc0000;">Confirmar Exclusão</h3>
                <p>Tem certeza que deseja excluir o aluno <strong><?php echo htmlspecialchars($aluno['nome']); ?></strong> (ID: <?php echo htmlspecialchars($aluno['id']); ?>)?</p>
                <p><strong>Turma:</strong> <?php echo htmlspecialchars($aluno['turma']); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($aluno['email']); ?></p>
                
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($aluno['id']); ?>">
                    <input type="hidden" name="confirmar_exclusao" value="1">
                    <input type="submit" value="Sim, Excluir" style="background-color: #cc0000; color: white; border: none; padding: 8px 12px; cursor: pointer;">
                    <a href="select.php" style="margin-left: 10px;">Cancelar</a>
                </form>
            </div>
        <?php elseif ($id && !isset($_POST['confirmar_exclusao'])): ?>
            <p style="color: red;">Aluno não encontrado com o ID fornecido.</p>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>