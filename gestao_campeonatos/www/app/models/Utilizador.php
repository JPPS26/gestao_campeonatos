<?php
require_once '../core/Database.php';

class Utilizador {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function getUserByIdAndPassword($id_jogador, $palavra_passe) {
        $stmt = $this->db->prepare("SELECT * FROM utilizadores WHERE id_jogador = :id_jogador");
        $stmt->bindParam(':id_jogador', $id_jogador);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($palavra_passe, $user['palavra_passe'])) {
            return $user;
        }
        return false;
    }

    public function verificarIdJogador($id_jogador) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM utilizadores WHERE id_jogador = :id_jogador");
        $stmt->bindParam(':id_jogador', $id_jogador);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function createUser($nome_completo, $id_jogador, $data_nascimento, $numero_documento_identificacao, $palavra_passe, $tipo_utilizador) {
        try {
            $stmt = $this->db->prepare("INSERT INTO utilizadores (nome_completo, id_jogador, data_nascimento, numero_documento_identificacao, palavra_passe, tipo_utilizador) VALUES (:nome_completo, :id_jogador, :data_nascimento, :numero_documento_identificacao, :palavra_passe, :tipo_utilizador)");
            
            $stmt->bindParam(':nome_completo', $nome_completo);
            $stmt->bindParam(':id_jogador', $id_jogador);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':numero_documento_identificacao', $numero_documento_identificacao);
            $stmt->bindParam(':palavra_passe', $palavra_passe);
            $stmt->bindParam(':tipo_utilizador', $tipo_utilizador);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao criar usuário: " . $e->getMessage());
            return false;
        }
    }
    public function verificarDocumentoIdentificacao($numero_documento_identificacao) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM utilizadores WHERE numero_documento_identificacao = :numero_documento_identificacao");
        $stmt->bindParam(':numero_documento_identificacao', $numero_documento_identificacao);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    public function getAllUtilizadores() {
        $stmt = $this->db->prepare("SELECT * FROM utilizadores");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>