<?php
require_once '../core/Database.php';

class Campeonato {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function createCampeonato($nome_campeonato, $data_inicio, $data_fim) {
        try {
            // Verifica se já existe um campeonato com o mesmo nome
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM campeonatos WHERE nome_campeonato = :nome_campeonato");
            $stmt->bindParam(':nome_campeonato', $nome_campeonato);
            $stmt->execute();
            
            if ($stmt->fetchColumn() > 0) {
                // Retorna falso se o campeonato já existir
                return false;
            }
    
            // Se não existir, insere o novo campeonato
            $stmt = $this->db->prepare("INSERT INTO campeonatos (nome_campeonato, data_inicio, data_fim) VALUES (:nome_campeonato, :data_inicio, :data_fim)");
            
            $stmt->bindParam(':nome_campeonato', $nome_campeonato);
            $stmt->bindParam(':data_inicio', $data_inicio);
            $stmt->bindParam(':data_fim', $data_fim);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao criar campeonato: " . $e->getMessage());
            return false;
        }
    }
}
?>