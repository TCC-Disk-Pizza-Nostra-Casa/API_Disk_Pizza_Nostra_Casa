CREATE DEFINER = CURRENT_USER TRIGGER `db_pizzaria`.`venda_produto_assoc_BEFORE_INSERT` BEFORE INSERT ON `venda_produto_assoc` FOR EACH ROW
BEGIN
	DECLARE valor_produto double;
    DECLARE valor_total_item double;
	set valor_produto = (select preco from produto where id=new.id_produto);
	set valor_total_item = new.quantidade_produto * valor_produto;
	set new.valor_total_item_venda=valor_total_item;
    
    update venda set valor_total = valor_total + valor_total_item where id = new.id_venda;
END