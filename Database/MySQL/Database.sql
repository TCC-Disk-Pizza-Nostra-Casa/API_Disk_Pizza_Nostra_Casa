CREATE DATABASE IF NOT EXISTS db_pizzaria;

USE db_pizzaria;

SET GLOBAL lc_time_names=pt_BR;

CREATE TABLE IF NOT EXISTS Funcionario (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sexo VARCHAR(13) NOT NULL,
    estado_civil VARCHAR(13) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    cep CHAR(8) NOT NULL,
    email VARCHAR(60) DEFAULT "Não informado",
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
    sexo VARCHAR(13) NOT NULL,
    estado_civil VARCHAR(13) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    cep CHAR(8) NOT NULL,
    email VARCHAR(60) DEFAULT "Não informado",
    telefone VARCHAR(20) UNIQUE NOT NULL,
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_nascimento DATE DEFAULT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1

);

CREATE TABLE IF NOT EXISTS Fornecedor (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) UNIQUE NOT NULL,
    cnpj CHAR(14) UNIQUE NOT NULL,
    email VARCHAR(60) DEFAULT "Não informado",
    telefone VARCHAR(20) UNIQUE NOT NULL,
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1

);

CREATE TABLE IF NOT EXISTS Produto (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) UNIQUE NOT NULL,
    preco DOUBLE NOT NULL,
    tamanho VARCHAR(6) NOT NULL,
    categoria VARCHAR(20) NOT NULL,
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_modificacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1,

    fk_fornecedor INT NOT NULL,
    FOREIGN KEY(fk_fornecedor) REFERENCES Fornecedor(id)

);

CREATE TABLE IF NOT EXISTS Venda (

    id INT AUTO_INCREMENT PRIMARY KEY,
    delivery BOOL DEFAULT 0,
    valor_total DOUBLE DEFAULT 0,
    observacoes VARCHAR(255) DEFAULT "Nenhuma observação",
    data_venda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo BOOL DEFAULT 1,

    fk_funcionario INT NOT NULL,
    FOREIGN KEY(fk_funcionario) REFERENCES Funcionario(id),

    fk_cliente INT NOT NULL,
    FOREIGN KEY(fk_cliente) REFERENCES Cliente(id)

);

CREATE TABLE IF NOT EXISTS Venda_Produto_Assoc (

    fk_venda INT NOT NULL,
    FOREIGN KEY(fk_venda) REFERENCES Venda(id),

    fk_produto INT NOT NULL,
    FOREIGN KEY(fk_produto) REFERENCES Produto(id),

    quantidade_produto INT,
    valor_total_item_venda DOUBLE DEFAULT 0,
    ativo BOOL DEFAULT 1

);