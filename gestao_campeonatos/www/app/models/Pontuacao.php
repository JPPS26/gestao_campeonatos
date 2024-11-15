<?php
require_once '../core/Database.php'; // Certifique-se de que o caminho está correto

class Pontuacao {
    private $db;

    public function __construct() {
        $this->db = Database::conectar(); // Conectar ao banco de dados
    }

    // Método para criar uma nova pontuação
    public function createPontuacao($id_utilizador, $id_campeonato, $id_parametro, $pontuacao) {
        try {
            // Preparar a consulta SQL
            $stmt = $this->db->prepare("INSERT INTO pontuacoes (id_utilizador, id_campeonato, id_parametro, pontuacao) VALUES (:id_utilizador, :id_campeonato, :id_parametro, :pontuacao)");
            
            // Vincular os parâmetros
            $stmt->bindParam(':id_utilizador', $id_utilizador);
            $stmt->bindParam(':id_campeonato', $id_campeonato);
            $stmt->bindParam(':id_parametro', $id_parametro);
            $stmt->bindParam(':pontuacao', $pontuacao);
            
            // Executar a consulta
            return $stmt->execute(); // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            // Log do erro (opcional)
            error_log("Erro ao inserir pontuação: " . $e->getMessage());
            return false; // Retorna false em caso de erro
        }
    }
}
?>