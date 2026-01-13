-- CRUD (Creat, Read, Updte, Delete) - Cadastrar, Pesquisar, Atualizar, Excluir.
-- Delete: Excluir

-- Excluir TODO o Banco de Dados e suas Tabelas!

DROP DATABASE db_exemplo;

-- Excluir uma Tabela do Banco de Dados!
DROP TABLE tb_exemplo;

DELETE FROM tb_usuario 
WHERE id_usuario = 2;

DELETE FROM tb_usuario 
WHERE id_usuario = 3;

DELETE FROM tb_categoria 
WHERE id_categoria = 3;

DELETE FROM tb_movimento WHERE id_movimento IN (1, 2, 3, 5, 12, 20);


