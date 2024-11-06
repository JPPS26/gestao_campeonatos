-- Criação do banco de dados
CREATE DATABASE gestao_campeonatos;

-- Selecionar o banco de dados
USE gestao_campeonatos;

-- Tabela de usuários
CREATE TABLE utilizadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100) NOT NULL,
    id_jogador VARCHAR(50) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    numero_documento_identificacao VARCHAR(50) NOT NULL,
    tipo_utilizador ENUM('administrador', 'utilizador') NOT NULL,
    palavra_passe VARCHAR(255) NOT NULL
);

-- Tabela de campeonatos
CREATE TABLE campeonatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL
);

-- Tabela de pontuações
CREATE TABLE pontuacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jogador VARCHAR(50) NOT NULL,
    campeonato_id INT NOT NULL,
    pontuacao INT NOT NULL,
    FOREIGN KEY (id_jogador) REFERENCES usuarios(id_jogador),
    FOREIGN KEY (campeonato_id) REFERENCES campeonatos(id)
);