-- Criação da base de dados
CREATE DATABASE gestao_campeonatos;

-- Selecionar a base de dados
USE gestao_campeonatos;

-- Criação da tabela utilizadores
CREATE TABLE utilizadores (
    id_utilizador INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100) NOT NULL,
    id_jogador VARCHAR(50) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    numero_documento_identificacao VARCHAR(50) NOT NULL,
    tipo_utilizador ENUM('administrador', 'utilizador') NOT NULL DEFAULT 'utilizador',
    palavra_passe VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Criação da tabela campeonatos
CREATE TABLE campeonatos (
    id_campeonato INT AUTO_INCREMENT PRIMARY KEY,
    nome_campeonato VARCHAR(100) NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    CONSTRAINT chk_data CHECK (data_fim > data_inicio)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Criação da tabela Temporadas
CREATE TABLE temporadas (
    id_temporada INT AUTO_INCREMENT PRIMARY KEY,
    ano_temporada INT NOT NULL,
    numero_jogos INT NOT NULL,
    pontuacoes INT NOT NULL,
    id_campeonato INT,
    id_utilizador INT NULL,
    FOREIGN KEY (id_campeonato) REFERENCES campeonatos(id_campeonato) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_utilizador) REFERENCES utilizadores(id_utilizador) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;