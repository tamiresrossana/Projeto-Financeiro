-- CRUD (Creat, Read, Updte, Delete) - Cadastrar, Pesquisar, Atualizar, Excluir.
-- Update: Atualizar

UPDATE tb_usuario
	SET nome_usuario = 'Bruno Silva'
WHERE id_usuario = 2;

UPDATE tb_usuario
	SET email_usuario = 'bruno_s@hotmail.com',
		senha_usuario = 'bro333',
        data_cadastro = '2025-10-01'
WHERE id_usuario = 2;