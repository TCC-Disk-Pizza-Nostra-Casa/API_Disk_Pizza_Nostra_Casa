CREATE DATABASE IF NOT EXISTS db_pizzaria;

USE db_pizzaria;

CREATE TABLE IF NOT EXISTS Funcionario (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    nome_social varchar(255) DEFAULT "Não possui",
    genero VARCHAR(30) DEFAULT "Não informado",
    pronome varchar(13) DEFAULT "Não informado",
    cpf CHAR(11) UNIQUE NOT NULL,
    rg CHAR(9) UNIQUE NOT NULL,
    cargo VARCHAR(20) NOT NULL,
    cep CHAR(8) NOT NULL,
    email VARCHAR(60) UNIQUE DEFAULT "Não informado",
    telefone VARCHAR(20) UNIQUE NOT NULL,
    senha VARCHAR(32) NOT NULL,
    administrador BOOL DEFAULT 0,
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1

);

CREATE TABLE IF NOT EXISTS Cliente (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    nome_social varchar(255) DEFAULT "Não possui",
    genero VARCHAR(30) DEFAULT "Não informado",
    pronome varchar(13) DEFAULT "Não informado",
    cpf CHAR(11) UNIQUE NOT NULL,
    cep CHAR(8) NOT NULL,
    email VARCHAR(60) UNIQUE DEFAULT "Não informado",
    telefone VARCHAR(20) UNIQUE DEFAULT "Não informado",
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_nascimento TIMESTAMP DEFAULT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1

);

CREATE TABLE IF NOT EXISTS Fornecedor (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cnpj CHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(20) UNIQUE DEFAULT "Não informado",
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1

);

CREATE TABLE IF NOT EXISTS Produto (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) UNIQUE NOT NULL,
    estoque INT NOT NULL,
    preco DOUBLE NOT NULL,
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    id_fornecedor INT,
    FOREIGN KEY(id_fornecedor) REFERENCES Fornecedor(id)

);

CREATE TABLE IF NOT EXISTS Venda (

    id INT AUTO_INCREMENT PRIMARY KEY,
    data_venda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    delivery BOOL DEFAULT 0,
    valor_total DOUBLE DEFAULT 0,

    id_funcionario INT,
    FOREIGN KEY(id_funcionario) REFERENCES Funcionario(id),

    id_cliente INT,
    FOREIGN KEY(id_cliente) REFERENCES Cliente(id)

);

CREATE TABLE IF NOT EXISTS Venda_Produto_Assoc (

    id_venda INT,
    FOREIGN KEY(id_venda) REFERENCES Venda(id) ON DELETE CASCADE,

    id_produto INT,
    FOREIGN KEY(id_produto) REFERENCES Produto(id),

    quantidade_produto INT,
    valor_total_item_venda DOUBLE DEFAULT 0

);