-- CRUD(Creat, Read, Updte, Delete) - Cadastrar, Pesquisar, Atualizar, Excluir.
-- Create - Cadastro

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Ana Maria', 'ana.maria@gmail.com', 'ana321', '2025-10-02');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Carlos', 'carlos.j@gmail.com', 'val896', '2010-11-22');

INSERT INTO tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
VALUES
('Laura', 'alaura_v@gmail.com', '302565', '2016-01-20');

INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Faculdade', 1);

INSERT INTO tb_categoria
(nome_categoria, id_usuario)
VALUES
('Viagens', 4);

INSERT INTO tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
VALUES
('UNIFIL', 4333002244, 'Avenida Teste', 1);

INSERT INTO tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
VALUES
('Estetica', 4332103259, 'Avenida Vala', 4);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta,id_usuario)
VALUES
('Nubank', 001, 65402, 8720, 1);

INSERT INTO tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta,id_usuario)
VALUES
('Caixa', 0765, 34856, 10000, 4);

INSERT INTO tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
VALUES
(2, '2025-10-02', 45, null, 3, 3, 2, 4);

INSERT INTO tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
VALUES
(1, '2020-08-20', 60, null, 1, 1, 1, 1);



