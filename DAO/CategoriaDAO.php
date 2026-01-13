<?php

require_once 'UtilDAO.php';
require_once 'Conexao.php';

class CategoriaDAO extends Conexao{
    public function CadastrarCategoria($nomeCatg){
        if (empty($nomeCatg)) {
            return 0;
        } else {
            // return 1;

            // 1º Passo: Concluir a herança com a Classe Conexão e comunicar com o Banco de Dados!
            $conexao = parent::retornarConexao();

            // 2º Passo: Script SQL que será executado via PHP dentro do Banco de Dados!
            $comando_sql = 'INSERT INTO tb_categoria(nome_categoria, id_usuario) VALUES(?, ?);';

            // 3º Passo: Vamos utilizar um Gestor de Banco de Dados Nativo do PHP.
            $sql = new PDOStatement();

            // 4º Passo: Vamos preparar a execução do Script SQL!
            $sql = $conexao->prepare($comando_sql);

            // 5º Passo: Vamos validar os dados que serão cadastrados no Banco de Dados!
            $sql->bindValue(1, $nomeCatg);
            $sql->bindValue(2, UtilDAO::UsuarioLogado());

            // 6º Passo: Vamos tentar executar todo processo, caso de erro, tratar a notificação!

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }

    public function ConsultarCategoria(){
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_categoria,
                        nome_categoria
                        from tb_categoria
                        where id_usuario = ? order by nome_categoria';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria){
        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_categoria, nome_categoria FROM tb_categoria WHERE id_categoria = ? AND id_usuario = ?;';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarCategoria($nomeCatg, $idCategoria){
        if (trim($nomeCatg) == '' || $idCategoria == '') {
            return 0;
        } else {
            $conexao = parent::retornarConexao();

            $comando_sql = 'update tb_categoria
                                set nome_categoria = ?
                            where id_categoria = ?
                                and id_usuario = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $nomeCatg);
            $sql->bindValue(2, $idCategoria);

            $sql->bindValue(3, UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }    

    public function ExcluirCategoria($idCategoria){
        if ($idCategoria == '') {
            return 0;
        }else{
            $conexao = parent::retornarConexao();

            $comando_sql = 'delete from tb_categoria
                            where id_categoria = ?
                            and id_usuario = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $idCategoria);
            $sql->bindValue(2,  UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -4;
            }
        }
    }
}
