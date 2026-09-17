<?php 
$base_url = (basename(dirname($_SERVER['SCRIPT_NAME'] ?? '')) === 'app') ? '../' : '';
?>
<header>
    <nav>
        <a href="<?php echo $base_url; ?>index.php">Inicio</a> | 
        <a href="<?php echo $base_url; ?>app/create.php">Cadastrar</a> | 
        <a href="<?php echo $base_url; ?>app/delete.php">Excluir</a> | 
        <a href="<?php echo $base_url; ?>app/update.php">Atualizar</a> | 
        <a href="<?php echo $base_url; ?>app/select.php">Relatório</a> | 
        <a href="<?php echo $base_url; ?>app/select_w.php">Consultar</a>
    </nav>
</header>
<hr>