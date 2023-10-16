/******** CLIENTE, FUNCIONÁRIO E FORNECEDOR ********/
INSERT INTO Cliente(nome, cpf, cep, email, telefone, sexo, data_nascimento) VALUES ("Joaquim", "12345678909", "12345678", "joaquim@email.com", "12345678901", "Masculino", CURRENT_TIMESTAMP());
INSERT INTO Cliente(nome, cpf, cep, email, telefone, sexo, data_nascimento) VALUES ("Irineu", "12345678911", "12345699", "irineu@email.com", "12345678902", "Masculino", CURRENT_TIMESTAMP());
INSERT INTO Funcionario(nome, senha, cpf, cep, telefone, sexo, estado_civil) VALUES ("John", "123", "12345678909", "17209233", "996592724", "Masculino", "casado");
INSERT INTO Fornecedor (nome, cnpj, telefone) VALUES ("teste", 12345678901234, 149999999999);


/******* BEBIDAS *******/
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Refrigerante Guaraná 2L", 20, 8, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Refrigerante Soda 2L", 20, 8, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Refrigerante Cola 2L", 20, 8, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Refrigerante Coca Cola 2L", 20, 14, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Refrigerante Antártica 1L", 20, 7, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Suco Tampico 2L", 20, 12, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Suco Tampico 450ml", 20, 5, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Água", 20, 2.50, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Latinha Coca Cola 225ml", 20, 5, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Latinha Conti Zero Grau 225ml", 20, 4, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Latinha Conti Brahma 225ml", 20, 5, 1);
/******* PIZZAS TRADICIONAIS *******/
-- GRANDE --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Alho e Óleo (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Bacon (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Baiana (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Bauru (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Calabresa (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Canadense (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Catupiry (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Corn Bacon (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Escarola (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Frango (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("lombo (Grande)", 20, 35, 1);

-- BROTO --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Alho e Óleo (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Bacon (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Baiana (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Bauru (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Calabresa (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Canadense (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Catupiry (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Corn Bacon (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Escarola (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Frango (Broto)", 20, 20, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("lombo (Broto)", 20, 35, 1);



/******* PIZZAS VARIADAS *******/
-- GRANDE --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Escondidinho (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Nostra Italia (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Parmegiana (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Strogonoff Frango (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Strogonoff Carne (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Picanha (Grande)", 20, 35, 1);

-- BROTO --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Escondidinho (Broto)", 20, 30, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Nostra Italia (Broto)", 20, 30, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Parmegiana (Broto)", 20, 30, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Strogonoff Frango (Broto)", 20, 30, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Strogonoff Carne (Broto)", 20, 30, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Picanha (Broto)", 20, 30, 1);




/******* PIZZAS ESPECIAIS *******/
-- GRANDE --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("4 Queijos (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("5 Queijos (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Amazonas (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Aliche (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("A Moda da Casa (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Carijo (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Catufrango (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Cheddar (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Italiana (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Jahu (Grande)", 20, 43, 1);
--
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Atum (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Brasileira (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Lazanha (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Light (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Maria Bonita (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Nostra Casa (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Portuguesa (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Provolone (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Rainha (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Siciliana (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Tomate Seco (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("X-Burguer (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Brocolis (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Champignon (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Caipira (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Escarola 2 (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Palmito (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Paulista (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Vegetariana (Grande)", 20, 43, 1);

-- BROTO --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("4 Queijos (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("5 Queijos (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Amazonas (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Aliche (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("A Moda da Casa (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Carijo (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Catufrango (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Cheddar (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Italiana (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Jahu (Broto)", 20, 25, 1);
--
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Atum (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Brasileira (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Lazanha (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Light (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Maria Bonita (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Nostra Casa (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Portuguesa (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Provolone (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Rainha (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Siciliana (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Tomate Seco (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("X-Burguer (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Brocolis (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Champignon (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Caipira (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Escarola 2 (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Palmito (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Paulista (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Vegetariana (Broto)", 20, 25, 1);



/******* PIZZAS DOCES *******/
-- GRANDE --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Brigadeiro (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Macaca (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Romeu e Julieta (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Prestigio (Grande)", 20, 35, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Nutella (Grande)", 20, 43, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Sonho meu (Grande)", 20, 35, 1);

-- BROTO --
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Brigadeiro (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Macaca (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Romeu e Julieta (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Prestigio (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Nutella (Broto)", 20, 25, 1);
INSERT INTO Produto(nome, estoque, preco, fk_fornecedor) VALUES ("Sonho meu (Broto)", 20, 25, 1);
