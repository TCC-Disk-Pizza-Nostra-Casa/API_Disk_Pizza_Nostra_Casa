CREATE DEFINER = CURRENT_USER TRIGGER `db_pizzaria`.`venda_produto_assoc_AFTER_INSERT` AFTER INSERT ON `venda_produto_assoc` FOR EACH ROW
BEGIN
	update produto set estoque = estoque - new.quantidade_produto where id = new.id_produto;
END