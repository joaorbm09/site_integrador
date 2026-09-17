<?php 
require_once __DIR__ . '/../database/connect.php';

/**
 * Cadastra um novo aluno no banco de dados.
 */
function cadastrar($conexao, $nome, $turma, $nasc, $ativo, $email){
    $sql = "INSERT INTO alunos (nome, turma, nascimento, ativo, email) VALUES (:nome, :turma, :nascimento, :ativo, :email)";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":turma", $turma);
        $stmt->bindParam(":nascimento", $nasc);
        $stmt->bindValue(":ativo", ($ativo === 'true' || $ativo === true || $ativo === 1 || $ativo === '1'), PDO::PARAM_BOOL);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
        return false;
    }
}

/**
 * Retorna todos os alunos cadastrados.
 */
function listarAlunos($conexao){
    $sql = "SELECT * FROM alunos ORDER BY id ASC";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao listar alunos: " . $e->getMessage();
        return [];
    }
}

/**
 * Busca um aluno específico pelo seu ID.
 */
function buscarAlunoPorId($conexao, $id){
    $sql = "SELECT * FROM alunos WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar aluno: " . $e->getMessage();
        return false;
    }
}

/**
 * Atualiza os dados de um aluno específico pelo seu ID.
 */
function atualizarAluno($conexao, $id, $nome, $turma, $nasc, $ativo, $email){
    $sql = "UPDATE alunos SET nome = :nome, turma = :turma, nascimento = :nascimento, ativo = :ativo, email = :email WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":turma", $turma);
        $stmt->bindParam(":nascimento", $nasc);
        $stmt->bindValue(":ativo", ($ativo === 'true' || $ativo === true || $ativo === 1 || $ativo === '1'), PDO::PARAM_BOOL);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao atualizar aluno: " . $e->getMessage();
        return false;
    }
}

/**
 * Exclui um aluno do banco de dados pelo seu ID.
 */
function excluirAluno($conexao, $id){
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro ao excluir aluno: " . $e->getMessage();
        return false;
    }
}
?>