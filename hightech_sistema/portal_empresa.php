<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HighTech - Inovações e Negócios</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php include __DIR__ . '/includes/header.php'; ?>

    <!-- HERO SECTION -->
    <div class="hero">
        <div class="container">
            <span class="badge">Tecnologia & Inovação</span>
            <h2>Soluções Corporativas & Capacitação de Alto Nível</h2>
            <p>Impulsionamos empresas e profissionais através de transformação digital, automação e formação especializada integrada ao banco de dados.</p>
            <div class="hero-actions">
                <a href="aplicacao.php" class="btn btn-primary">Acessar HighTech School 🎓</a>
                <a href="app/alunos.php" class="btn btn-outline">Painel Administrativo 🛠️</a>
            </div>
        </div>
    </div>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="container">
        <!-- SEÇÃO: QUEM SOMOS -->
        <section id="quem-somos">
            <div class="section-header">
                <h2>Quem Somos?</h2>
                <p>Somos uma empresa de negócios focada em ajudar você e seu empreendimento a alcançar o alto nível tecnológico.</p>
            </div>
        </section>

        <!-- SEÇÃO: DESTAQUES -->
        <section id="inicio"> 
            <div class="section-header">
                <h2>Início & Destaques</h2>
                <p>Navegue pelos principais destaques do nosso portal corporativo e acadêmico.</p>
            </div>
                
            <div class="grid">
                <article>
                    <div>
                        <span class="badge">Capacitação</span>
                        <h3>Cursos de Gestão e Negócios</h3>
                        <p>Capacitação prática sobre gestão empresarial moderna, liderança ágil e inovação contínua.</p>
                    </div>
                    <a href="aplicacao.php" class="btn btn-outline">Ver Cursos da Escola</a>
                </article>

                <article>
                    <div>
                        <span class="badge">Transformação</span>
                        <h3>Transformação Digital para PMEs</h3>
                        <p>Aprenda a implementar ferramentas de automação e dados para otimizar os processos do seu negócio.</p>
                    </div>
                    <a href="app/cursos.php" class="btn btn-outline">Gerenciar Cursos no BD</a>
                </article>
            </div>
        </section>

        <!-- SEÇÃO: SERVIÇOS -->
        <section id="negocios">
            <div class="section-header">
                <h2>Aba de Negócios e Serviços Corporativos</h2>
                <p>Oferecemos para sua empresa assistência de vários modos diferentes:</p>
            </div>
            
            <div class="grid">
                <article>
                    <h3>Nossos Serviços de Tecnologia</h3>
                    <ul>
                        <li>Consultoria em infraestrutura de TI e Banco de Dados PostgreSQL</li>
                        <li>Automação de Relatórios em PHP com PDO</li>
                        <li>Desenvolvimento de software corporativo sob medida</li>
                    </ul>
                </article>

                <article id="relatorio">
                    <h3>Gestão de Matrículas e Alunos</h3>
                    <p>Sistema totalmente relacional que conecta Alunos e Cursos através de tabelas intermediárias N:N no PostgreSQL.</p>
                    <a href="app/matriculas.php" class="btn btn-primary" style="margin-top: 1rem;">Ver Relatório de Matrículas</a>
                </article>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
