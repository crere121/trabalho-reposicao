CREATE DATABASE eepd_bh;
USE eepd_bh;

CREATE TABLE usuarios (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100),
 email VARCHAR(100) UNIQUE,
 senha VARCHAR(255)
);

CREATE TABLE blog (
 id INT AUTO_INCREMENT PRIMARY KEY,
 titulo VARCHAR(255),
 conteudo TEXT,
 data_post DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE professores (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100),
 materia VARCHAR(100)
);

CREATE TABLE alunos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100),
 turma VARCHAR(100)
);

CREATE TABLE contato (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100),
 email VARCHAR(100),
 mensagem TEXT,
 data_envio DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Nova tabela para Anotações/Lembretes (requerida para funcionalidade restrita)
CREATE TABLE anotacoes (
 id INT AUTO_INCREMENT PRIMARY KEY,
 usuario_id INT NOT NULL,
 anotacao TEXT,
 lembrete VARCHAR(255),
 data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);