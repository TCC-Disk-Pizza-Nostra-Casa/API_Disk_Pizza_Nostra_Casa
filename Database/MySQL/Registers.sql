/******** CLIENTE, FUNCIONÁRIO E FORNECEDOR ********/

	INSERT INTO Cliente(nome, sexo, estado_civil, cpf, cep, email, telefone, data_nascimento) VALUES("Valentina Mariane Pinto", "Feminino", "Casado(a)", "01475208863", "17202130", "vale@hotmail.com", "14994545381", "2000-06-02");
    
    INSERT INTO Funcionario(nome, sexo, estado_civil, cpf, cep, email, telefone, senha, observacoes, administrador) VALUES("root", "Não informado", "Solteiro(a)", "12345678909", "17212660", "root@etec.sp.gov.br", "14991116468", MD5("etecjau"), "Usuário de testes", 1);

	INSERT INTO Funcionario(nome, sexo, estado_civil, cpf, cep, email, telefone, senha) VALUES("Manoel Joaquim Duarte", "Masculino", "Solteiro(a)", "27249089889", "17210804", "mjduarte@gmail.com", "14985655639", MD5("1234"));

	INSERT INTO Fornecedor(nome, cnpj, email, telefone) VALUES("Local", "85899346000126", "diskpizzanostracasa@hotmail.com", "1430321313");
    
    INSERT INTO Fornecedor(nome, cnpj, email, telefone) VALUES("Nestle", "60409075000152", "falecom@nestle.com.br", "08007701176");
    
    INSERT INTO Fornecedor(nome, cnpj, email, telefone) VALUES("Coca-Cola", "61186888009301", "falecom@cocacola.com.br", "08007271100");

/******* BEBIDAS *******/

	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Refrigerante Guaraná 2L", 8, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Refrigerante Soda 2L", 8, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Refrigerante Cola 2L", 8, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Refrigerante Coca-Cola 2L", 14, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Refrigerante Antártica 1L", 7, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Suco Tampico 2L", 12, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Suco Tampico 450mL", 5, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Água", 2.50, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Latinha Coca-Cola 225mL", 5, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Latinha Conti Zero Grau 225mL", 4, "Único", "Bebida", 3);
	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Latinha Brahma 225mL", 5, "Único", "Bebida", 3);

/******* PIZZAS TRADICIONAIS *******/

	-- GRANDE --

		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Alho e Óleo (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Bacon (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Baiana (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Bauru (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Calabresa (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Canadense (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Catupiry (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Corn Bacon (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Escarola (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Frango (Grande)", 35, "Grande", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Lombo (Grande)", 35, "Grande", "Pizza Tradicional", 1);

	-- BROTO --

		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Alho e Óleo (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Bacon (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Baiana (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Bauru (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Calabresa (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Canadense (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Catupiry (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Corn Bacon (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Escarola (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Frango (Broto)", 20, "Broto", "Pizza Tradicional", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Lombo (Broto)", 20, "Broto", "Pizza Tradicional", 1);

/******* PIZZAS VARIADAS *******/

	-- GRANDE --

		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Escondidinho (Grande)", 35, "Grande", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Nostra Italia (Grande)", 35, "Grande", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Parmegiana (Grande)", 35, "Grande", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Strogonoff Frango (Grande)", 35, "Grande", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Strogonoff Carne (Grande)", 35, "Grande", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Picanha (Grande)", 35, "Grande", "Pizza Variada", 1);

	-- BROTO --
    
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Escondidinho (Broto)", 30, "Broto", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Nostra Italia (Broto)", 30, "Broto", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Parmegiana (Broto)", 30, "Broto", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Strogonoff Frango (Broto)", 30, "Broto", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Strogonoff Carne (Broto)", 30, "Broto", "Pizza Variada", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Picanha (Broto)", 30, "Broto", "Pizza Variada", 1);


/******* PIZZAS ESPECIAIS *******/

	-- GRANDE --
    
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("4 Queijos (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("5 Queijos (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Amazonas (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Aliche (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("A Moda da Casa (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Carijo (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Catufrango (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Cheddar (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Italiana (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Jahu (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Atum (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Brasileira (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Lasanha (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Light (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Maria Bonita (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Nostra Casa (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Portuguesa (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Provolone (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Rainha (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Siciliana (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Tomate Seco (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("X-Burguer (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Brócolis (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Champignon (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Caipira (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Escarola 2 (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Palmito (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Paulista (Grande)", 43, "Grande", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Vegetariana (Grande)", 43, "Grande", "Pizza Especial", 1);

	-- BROTO --
    
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("4 Queijos (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("5 Queijos (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Amazonas (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Aliche (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("A Moda da Casa (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Carijo (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Catufrango (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Cheddar (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Italiana (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Jahu (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Atum (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Brasileira (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Lasanha (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Light (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Maria Bonita (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Nostra Casa (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Portuguesa (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Provolone (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Rainha (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Siciliana (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Tomate Seco (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("X-Burguer (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Brócolis (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Champignon (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Caipira (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Escarola 2 (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Palmito (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Paulista (Broto)", 25, "Broto", "Pizza Especial", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Vegetariana (Broto)", 25, "Broto", "Pizza Especial", 1);

/******* PIZZAS DOCES *******/

	-- GRANDE --
    
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Brigadeiro (Grande)", 35, "Grande", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Macaca (Grande)", 35, "Grande", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Romeu e Julieta (Grande)", 35, "Grande", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Prestigio (Grande)", 35, "Grande", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Nutella (Grande)", 43, "Grande", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Sonho Meu (Grande)", 35, "Grande", "Pizza Doce", 1);
    
	-- BROTO --
    
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Brigadeiro (Broto)", 25, "Broto", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Macaca (Broto)", 25, "Broto", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Romeu e Julieta (Broto)", 25, "Broto", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Prestigio (Broto)", 25, "Broto", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Nutella (Broto)", 25, "Broto", "Pizza Doce", 1);
		INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Sonho Meu (Broto)", 25, "Broto", "Pizza Doce", 1);
        
/******* DOCES *******/

	INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Sonho de Valsa", 2, "Único", "Doce", 2);
    INSERT INTO Produto(nome, preco, tamanho, categoria, fk_fornecedor) VALUES("Ouro Branco", 2, "Único", "Doce", 2);