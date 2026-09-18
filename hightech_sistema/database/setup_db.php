<?php 
require_once __DIR__ . '/connect.php';

echo "<h2>Instalador Automático do Banco de Dados HighTech</h2>";

if (!$conexao) {
    die("<p style='color:red;'>Erro: Não foi possível conectar ao banco de dados PostgreSQL. Verifique o arquivo connect.php.</p>");
}

try {
    // 1. Executa o script schema.sql (Criando tabelas)
    $sql_script = file_get_contents(__DIR__ . '/schema.sql');
    $conexao->exec($sql_script);

    // 2. Insere usuário Administrador padrão
    $admin_email = 'admin@hightech.com';
    $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt->bindParam(":email", $admin_email);
    $stmt->execute();

    if (!$stmt->fetch()) {
        $admin_senha = password_hash('admin123', PASSWORD_BCRYPT);
        $stmt_ins = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES ('Administrador HighTech', :email, :senha, 'admin')");
        $stmt_ins->bindParam(":email", $admin_email);
        $stmt_ins->bindParam(":senha", $admin_senha);
        $stmt_ins->execute();
    }

    // 3. Insere usuário Aluno padrão
    $aluno_email = 'joao@hightech.com';
    $stmt_a = $conexao->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt_a->bindParam(":email", $aluno_email);
    $stmt_a->execute();

    if (!$stmt_a->fetch()) {
        $aluno_senha = password_hash('123456', PASSWORD_BCRYPT);
        $stmt_ins_a = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES ('João Victor', :email, :senha, 'aluno')");
        $stmt_ins_a->bindParam(":email", $aluno_email);
        $stmt_ins_a->bindParam(":senha", $aluno_senha);
        $stmt_ins_a->execute();
    }

    echo "<p style='color:green;'>✅ Tabelas do Banco de Dados (Cursos, Alunos, Matrículas e Usuários) criadas com sucesso no PostgreSQL!</p>";
    echo "<h3>Usuários de Teste Criados:</h3>";
    echo "<ul>";
    echo "<li><strong>Admin:</strong> admin@hightech.com | Senha: <code>admin123</code> (Acesso aos Painéis Administrativos)</li>";
    echo "<li><strong>Aluno:</strong> joao@hightech.com | Senha: <code>123456</code> (Acesso à HighTech School)</li>";
    echo "</ul>";
    echo "<p><a href='../portal_empresa.php'>Clique aqui para acessar o Portal HighTech</a></p>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Erro ao executar script SQL: " . $e->getMessage() . "</p>";
}
?>
