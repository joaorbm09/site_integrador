<?php 
require_once __DIR__ . '/../includes/functions.php';

$alunos = listarAlunos($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Alunos</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <h2>Relatório de Alunos Cadastrados</h2>
        <?php if (empty($alunos)): ?>
            <p>Nenhum aluno encontrado.</p>
        <?php else: ?>
            <table border="1" cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>E-mail</th>
                        <th>Nascimento</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($aluno['id']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['turma']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['nascimento'] ?? ''); ?></td>
                            <td><?php echo ($aluno['ativo'] === true || $aluno['ativo'] === 't' || $aluno['ativo'] == 1) ? 'Sim' : 'Não'; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $aluno['id']; ?>">Editar</a> | 
                                <a href="delete.php?id=<?php echo $aluno['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>