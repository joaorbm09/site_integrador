<?php 
require_once __DIR__ . '/../database/connect.php';

/* ==========================================================================
   FUNÇÕES DO MÓDULO DE CURSOS
   ========================================================================== */

function listarCursos($conexao) {
    if (!$conexao) return [];
    try {
        $stmt = $conexao->query("SELECT * FROM cursos ORDER BY id ASC");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Erro ao listar cursos: " . $e->getMessage());
        return [];
    }
}

function buscarCursoPorId($conexao, $id) {
    if (!$conexao) return false;
    try {
        $stmt = $conexao->prepare("SELECT * FROM cursos WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Erro ao buscar curso: " . $e->getMessage());
        return false;
    }
}

function cadastrarCurso($conexao, $nome, $categoria, $descricao, $carga_horaria, $ativo = true) {
    if (!$conexao) return false;
    try {
        $sql = "INSERT INTO cursos (nome, categoria, descricao, carga_horaria, ativo) VALUES (:nome, :categoria, :descricao, :carga_horaria, :ativo)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":carga_horaria", $carga_horaria, PDO::PARAM_INT);
        $stmt->bindValue(":ativo", ($ativo === 'true' || $ativo === true || $ativo === 1 || $ativo === '1'), PDO::PARAM_BOOL);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao cadastrar curso: " . $e->getMessage());
        return false;
    }
}

function atualizarCurso($conexao, $id, $nome, $categoria, $descricao, $carga_horaria, $ativo) {
    if (!$conexao) return false;
    try {
        $sql = "UPDATE cursos SET nome = :nome, categoria = :categoria, descricao = :descricao, carga_horaria = :carga_horaria, ativo = :ativo WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":carga_horaria", $carga_horaria, PDO::PARAM_INT);
        $stmt->bindValue(":ativo", ($ativo === 'true' || $ativo === true || $ativo === 1 || $ativo === '1'), PDO::PARAM_BOOL);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao atualizar curso: " . $e->getMessage());
        return false;
    }
}

function excluirCurso($conexao, $id) {
    if (!$conexao) return false;
    try {
        $stmt = $conexao->prepare("DELETE FROM cursos WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao excluir curso: " . $e->getMessage());
        return false;
    }
}

/* ==========================================================================
   FUNÇÕES DO MÓDULO DE ALUNOS
   ========================================================================== */

function listarAlunos($conexao) {
    if (!$conexao) return [];
    try {
        $stmt = $conexao->query("SELECT * FROM alunos ORDER BY id ASC");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Erro ao listar alunos: " . $e->getMessage());
        return [];
    }
}

function buscarAlunoPorId($conexao, $id) {
    if (!$conexao) return false;
    try {
        $stmt = $conexao->prepare("SELECT * FROM alunos WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Erro ao buscar aluno: " . $e->getMessage());
        return false;
    }
}

function cadastrarAluno($conexao, $nome, $cpf, $email, $turma, $nasc, $ativo = true) {
    if (!$conexao) return false;
    try {
        $sql = "INSERT INTO alunos (nome, cpf, email, turma, nascimento, ativo) VALUES (:nome, :cpf, :email, :turma, :nascimento, :ativo)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":turma", $turma);
        $stmt->bindParam(":nascimento", $nasc);
        $stmt->bindValue(":ativo", ($ativo === 'true' || $ativo === true || $ativo === 1 || $ativo === '1'), PDO::PARAM_BOOL);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao cadastrar aluno: " . $e->getMessage());
        return false;
    }
}

function atualizarAluno($conexao, $id, $nome, $cpf, $email, $turma, $nasc, $ativo) {
    if (!$conexao) return false;
    try {
        $sql = "UPDATE alunos SET nome = :nome, cpf = :cpf, email = :email, turma = :turma, nascimento = :nascimento, ativo = :ativo WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":turma", $turma);
        $stmt->bindParam(":nascimento", $nasc);
        $stmt->bindValue(":ativo", ($ativo === 'true' || $ativo === true || $ativo === 1 || $ativo === '1'), PDO::PARAM_BOOL);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao atualizar aluno: " . $e->getMessage());
        return false;
    }
}

function excluirAluno($conexao, $id) {
    if (!$conexao) return false;
    try {
        $stmt = $conexao->prepare("DELETE FROM alunos WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao excluir aluno: " . $e->getMessage());
        return false;
    }
}

/* ==========================================================================
   FUNÇÕES DO MÓDULO DE MATRÍCULAS (RELACIONAMENTO RELACIONAL N:N)
   ========================================================================== */

function matricularAluno($conexao, $id_aluno, $id_curso, $status = 'Ativa') {
    if (!$conexao) return false;
    try {
        $sql = "INSERT INTO matriculas (id_aluno, id_curso, status) VALUES (:id_aluno, :id_curso, :status)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id_aluno", $id_aluno, PDO::PARAM_INT);
        $stmt->bindParam(":id_curso", $id_curso, PDO::PARAM_INT);
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao matricular aluno: " . $e->getMessage());
        return false;
    }
}

function listarMatriculas($conexao) {
    if (!$conexao) return [];
    try {
        $sql = "SELECT m.id, m.data_matricula, m.status, 
                       a.nome AS aluno_nome, a.email AS aluno_email, a.turma,
                       c.nome AS curso_nome, c.categoria AS curso_categoria
                FROM matriculas m
                JOIN alunos a ON m.id_aluno = a.id
                JOIN cursos c ON m.id_curso = c.id
                ORDER BY m.id DESC";
        $stmt = $conexao->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("Erro ao listar matrículas: " . $e->getMessage());
        return [];
    }
}

function excluirMatricula($conexao, $id) {
    if (!$conexao) return false;
    try {
        $stmt = $conexao->prepare("DELETE FROM matriculas WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Erro ao cancelar matrícula: " . $e->getMessage());
        return false;
    }
}
?>
