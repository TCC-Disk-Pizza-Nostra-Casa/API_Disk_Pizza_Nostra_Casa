DELIMITER $$

USE db_pizzaria $$

CREATE DEFINER = CURRENT_USER TRIGGER Venda_Produto_Assoc_BEFORE_INSERT BEFORE INSERT ON Venda_Produto_Assoc FOR EACH ROW

BEGIN

	DECLARE valor_produto DOUBLE;
    DECLARE valor_total_item DOUBLE;
	SET valor_produto = (SELECT preco FROM Produto WHERE id = NEW.id_produto);
	SET valor_total_item = NEW.quantidade_produto * valor_produto;
	SET NEW.valor_total_item_venda=valor_total_item;
    
    UPDATE Venda SET valor_total = valor_total + valor_total_item WHERE id = NEW.id_venda;
    
END$$

DELIMITER ;