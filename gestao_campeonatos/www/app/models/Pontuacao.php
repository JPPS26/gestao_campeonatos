<?php
require_once '../core/Database.php'; // Certifique-se de que o caminho está correto

class Pontuacao {
    private $db;

    public function __construct() {
        $this->db = Database::conectar(); // Conectar ao banco de dados
    }

    public function createPontuacao($id_jogador, $id_campeonato, $id_parametro, $pontuacao) {
        try {
            $stmt = $this->db->prepare("INSERT INTO pontuacoes (id_jogador, id_campeonato, id_parametro, pontuacao) VALUES (:id_jogador, :id_campeonato, :id_parametro, :pontuacao)");
            
            // Vincular os parâmetros
            $stmt->bindParam(':id_jogador', $id_jogador); // Agora estamos usando id_jogador
            $stmt->bindParam(':id_campeonato', $id_campeonato);
            $stmt->bindParam(':id_parametro', $id_parametro);
            $stmt->bindParam(':pontuacao', $pontuacao);
            
            return $stmt->execute(); // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            error_log("Erro ao inserir pontuação: " . $e->getMessage());
            return false; // Retorna false em caso de erro
        }
    }
}
?>