<?php 
$is_app_dir = (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'app');
$base_url = $is_app_dir ? '../' : '';
$current_page = basename($_SERVER['SCRIPT_NAME'] ?? '');
?>
<header>
    <div class="container header-content">
        <img src="<?php echo $base_url; ?>assets/logo_highTech.png" alt="Logo HighTech" class="logo">
        <h1>HighTech Inovações & Gestão Escolar</h1>
        <p>Soluções Corporativas Integradas com Banco de Dados PostgreSQL</p>
    </div>
</header>

<nav>
    <div class="nav-container">
        <a href="<?php echo $base_url; ?>portal_empresa.php" class="<?php echo ($current_page === 'portal_empresa.php' || $current_page === 'index.php') ? 'active' : ''; ?>">🏢 Portal Empresa</a>
        <a href="<?php echo $base_url; ?>aplicacao.php" class="<?php echo ($current_page === 'aplicacao.php') ? 'active' : ''; ?>">🎓 HighTech School</a>
        <a href="<?php echo $base_url; ?>app/alunos.php" class="<?php echo ($current_page === 'alunos.php') ? 'active' : ''; ?>">👨‍🎓 Gestão de Alunos</a>
        <a href="<?php echo $base_url; ?>app/cursos.php" class="<?php echo ($current_page === 'cursos.php') ? 'active' : ''; ?>">📚 Gestão de Cursos</a>
        <a href="<?php echo $base_url; ?>app/matriculas.php" class="<?php echo ($current_page === 'matriculas.php') ? 'active' : ''; ?> btn-cta">📝 Matrículas (N:N)</a>
    </div>
</nav>
