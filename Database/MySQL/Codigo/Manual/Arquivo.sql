CREATE DATABASE IF NOT EXISTS db_pizzaria;

USE db_pizzaria;

CREATE TABLE IF NOT EXISTS Funcionario (

id INT AUTO_INCREMENT PRIMARY KEY,
administrador BOOLEAN DEFAULT FALSE,
nome VARCHAR(255) NOT NULL,
cpf CHAR(11) NULL DEFAULT 'Nenhum',
email VARCHAR(70) UNIQUE DEFAULT "Não Informado",
telefone VARCHAR(20) UNIQUE DEFAULT "Não Informado",
senha VARCHAR(50) NOT NULL,
data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE IF NOT EXISTS Cliente (

id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL,
cpf CHAR(11) NULL DEFAULT 'Nenhum',
email VARCHAR(70) UNIQUE DEFAULT "Não Informado",
telefone VARCHAR(20) UNIQUE DEFAULT "Não Informado",
data_nascimento TIMESTAMP DEFAULT NULL

);

CREATE TABLE IF NOT EXISTS Produto (

id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) UNIQUE NOT NULL,
estoque INT NOT NULL,
preco DOUBLE NOT NULL,
observacoes VARCHAR(255) DEFAULT "Nenhuma observação"

);

CREATE TABLE IF NOT EXISTS Venda (

id INT AUTO_INCREMENT PRIMARY KEY,
data_venda TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
delivery BOOLEAN DEFAULT FALSE,
valor_total DOUBLE,
id_funcionario INT,
id_cliente INT,

FOREIGN KEY(id_funcionario) REFERENCES Funcionario(id),
FOREIGN KEY(id_cliente) REFERENCES Cliente(id)

);

CREATE TABLE IF NOT EXISTS Venda_Produto_Assoc (

id_produto INT,
id_venda INT,
quantidade_produto INT,
valor_item_venda DOUBLE,

FOREIGN KEY(id_produto) REFERENCES Produto(id),
FOREIGN KEY(id_venda) REFERENCES Venda(id)

);
