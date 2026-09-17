-- Script DDL para criação do Banco de Dados Relacional da HighTech
-- Banco SGBD: PostgreSQL

-- 1. Tabela de Cursos
CREATE TABLE IF NOT EXISTS cursos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descricao TEXT,
    carga_horaria INT NOT NULL,
    ativo BOOLEAN DEFAULT true
);

-- 2. Tabela de Alunos
CREATE TABLE IF NOT EXISTS alunos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE,
    email VARCHAR(100) NOT NULL,
    turma VARCHAR(20),
    nascimento DATE,
    ativo BOOLEAN DEFAULT true,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabela de Matrículas (Relacionamento N:N entre Alunos e Cursos)
CREATE TABLE IF NOT EXISTS matriculas (
    id SERIAL PRIMARY KEY,
    id_aluno INT NOT NULL REFERENCES alunos(id) ON DELETE CASCADE,
    id_curso INT NOT NULL REFERENCES cursos(id) ON DELETE CASCADE,
    data_matricula DATE DEFAULT CURRENT_DATE,
    status VARCHAR(20) DEFAULT 'Ativa'
);

-- Dados Iniciais (Seeds) para Testes

INSERT INTO cursos (nome, categoria, descricao, carga_horaria, ativo) VALUES
('Desenvolvimento Web & PHP', 'Desenvolvimento', 'Aprenda a criar aplicações web dinâmicas, modernas e integradas com banco de dados PostgreSQL.', 80, true),
('Gestão e Negócios Digitais', 'Gestão & Ágil', 'Capacitação voltada para a gestão estratégica de empresas, Scrum, Kanban e projetos de TI.', 60, true),
('Transformação Digital para PMEs', 'Inovação & PMEs', 'Modernize os processos do seu negócio utilizando ferramentas de automação e análise de dados.', 40, true)
ON CONFLICT DO NOTHING;

INSERT INTO alunos (nome, cpf, email, turma, nascimento, ativo) VALUES
('João Victor', '111.222.333-44', 'joao@hightech.com', 'DEV-2026', '2005-04-12', true),
('Maria Silva', '222.333.444-55', 'maria@hightech.com', 'GES-2026', '2003-08-25', true)
ON CONFLICT DO NOTHING;

INSERT INTO matriculas (id_aluno, id_curso, status) VALUES
(1, 1, 'Ativa'),
(2, 2, 'Ativa')
ON CONFLICT DO NOTHING;
