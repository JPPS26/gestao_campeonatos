<?php
require_once '../core/Database.php';

class Parametro {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    // Método para criar um novo parâmetro
    public function createParametro($nome_parametro, $ponderacao, $id_campeonato) {
        try {
            $stmt = $this->db->prepare("INSERT INTO parametros (nome_parametro, ponderacao, id_campeonato) VALUES (:nome_parametro, :ponderacao, :id_campeonato)");
            $stmt->bindParam(':nome_parametro', $nome_parametro);
            $stmt->bindParam(':ponderacao', $ponderacao);
            $stmt->bindParam(':id_campeonato', $id_campeonato);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao criar parâmetro: " . $e->getMessage());
            return false;
        }
    }

    // Método para buscar todos os parâmetros (opcional)
    public function getAllParametros() {
        $stmt = $this->db->prepare("SELECT * FROM parametros");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar parâmetros por campeonato (opcional)
    public function getParametrosByCampeonato($id_campeonato) {
        $stmt = $this->db->prepare("SELECT * FROM parametros WHERE id_campeonato = :id_campeonato");
        $stmt->bindParam(':id_campeonato', $id_campeonato);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>