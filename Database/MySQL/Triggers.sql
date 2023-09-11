DELIMITER $$

USE db_pizzaria $$

CREATE DEFINER = CURRENT_USER TRIGGER db_pizzaria.updateEstoque AFTER INSERT ON db_pizzaria.Venda_Produto_Assoc FOR EACH ROW
BEGIN
        update Produto set estoque = estoque - new.quantidade_produto where id = new.id_produto;
END $$

DELIMITER ;