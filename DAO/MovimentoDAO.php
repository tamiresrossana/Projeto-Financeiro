<?php


require_once 'UtilDAO.php';
require_once 'Conexao.php';

class MovimentoDAO extends Conexao
{
    public function RealizarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta)
    {
        if (empty($tipo) || empty($data) || empty($valor) || empty($categoria) || empty($empresa) || empty($conta)) {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'INSERT INTO tb_movimento
                                    (tipo_movimento, data_movimento, valor_movimento, obs_movimento,
                                    id_empresa, id_conta, id_categoria, id_usuario)
                                    VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
        
        $sql = new PDOStatement;       
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $tipo);
        $sql->bindValue(2, $data);
        $sql->bindValue(3, $valor);
        $sql->bindValue(4, $obs);
        $sql->bindValue(5, $empresa);
        $sql->bindValue(6, $conta);
        $sql->bindValue(7, $categoria);
        $sql->bindValue(8, UtilDAO::UsuarioLogado());

        $conexao->beginTransaction();

        try{
            $sql->execute();
            if($tipo == 1){
                $comando_sql = 'UPDATE tb_conta
                                SET saldo_conta = saldo_conta + ?
                                WHERE id_conta = ?';
            }else if($tipo == 2){
                $comando_sql = 'UPDATE tb_conta
                                SET saldo_conta = saldo_conta - ?
                                WHERE id_conta = ?';            
            }

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $conta);

            $sql->execute();

            $conexao->commit();

            return 1;

        }catch(Exception $ex){
            echo $ex->getMessage();
            $conexao->rollBack();
            return -1;
        }
        
        
    }

    public function ConsultarMovimento($tipoMov, $dtInicio, $dtFinal)
    {
        if ($tipoMov == '' || $dtInicio == '' || $dtFinal == '') {
            return 0;
        } else {
            // return 1;

            $conexao = parent::retornarConexao();

            // Esse comando SQL realiza a consulta de forma GENERICA (Consulta GERAL)!
            $comando_sql = 'SELECT      id_movimento,
                                        tb_movimento.id_conta,                                        
                                        DATE_FORMAT(data_movimento, "%d/%m/%Y") AS data_movimento,
                                        tipo_movimento,
                                        nome_categoria,                                         
                                        valor_movimento,                                          
                                        nome_empresa, 
                                        banco_conta, 
                                        numero_conta, 
                                        agencia_conta, 
                                        saldo_conta,
                                        obs_movimento FROM tb_movimento
                                    INNER JOIN tb_categoria
                                        ON tb_categoria.id_categoria = tb_movimento.id_categoria
                                    INNER JOIN tb_empresa
                                        ON tb_empresa.id_empresa = tb_movimento.id_empresa
                                    INNER JOIN tb_conta
                                        ON tb_conta.id_conta = tb_movimento.id_conta
                                    WHERE tb_movimento.id_usuario = ? AND tb_movimento.data_movimento BETWEEN ? AND ?';

            if ($tipoMov != 0) {
                $comando_sql = $comando_sql . ' AND tipo_movimento = ?';
            }

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, UtilDAO::UsuarioLogado());
            $sql->bindValue(2, $dtInicio);
            $sql->bindValue(3, $dtFinal);

            if ($tipoMov != 0) {
                $sql->bindValue(4, $tipoMov);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }
    }

    public function ExcluirMovimento($idMov, $idConta, $tipo, $valor)
    {
        if ($idMov == '' || $idConta == '' || $tipo || $valor == '') {
            return 0;
        } else {
            $conexao = parent::retornarConexao();

            $comando_sql = 'DELETE FROM tb_movimento WHERE id_movimento = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $idMov);

            $conexao->beginTransaction();

            try {
                $sql->execute();

                if ($tipo == 1) {
                    $comando_sql = 'UPDATE tb_conta SET saldo_conta = saldo_conta - ? WHERE id_conta = ?';
                } else {
                    $comando_sql = 'UPDATE tb_conta SET saldo_conta = saldo_conta + ? WHERE id_conta = ?';
                }

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $valor);
                $sql->bindValue(2, $idConta);

                $sql->execute();

                $conexao->commit();

                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();

                $conexao->rollBack();

                return -1;
            }
        }
    }

    public function TotalDeEntrada() {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT sum(valor_movimento) AS total FROM tb_movimento WHERE tipo_movimento = 1 AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function TotalDeSaida() {
          $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT sum(valor_movimento) AS total FROM tb_movimento WHERE tipo_movimento = 2 AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function UltimoDezMovimentos() {
            
        $conexao = parent::retornarConexao();

            // Esse comando SQL realiza a consulta de forma GENERICA (Consulta GERAL)!
         $comando_sql = 'SELECT      id_movimento,
                                        tb_movimento.id_conta,                                        
                                        DATE_FORMAT(data_movimento, "%d/%m/%Y") AS data_movimento,
                                        tipo_movimento,
                                        nome_categoria,                                         
                                        valor_movimento,                                          
                                        nome_empresa, 
                                        banco_conta, 
                                        numero_conta, 
                                        agencia_conta, 
                                        saldo_conta,
                                        obs_movimento FROM tb_movimento
                                    INNER JOIN tb_categoria
                                        ON tb_categoria.id_categoria = tb_movimento.id_categoria
                                    INNER JOIN tb_empresa
                                        ON tb_empresa.id_empresa = tb_movimento.id_empresa
                                    INNER JOIN tb_conta
                                        ON tb_conta.id_conta = tb_movimento.id_conta
                                    WHERE tb_movimento.id_usuario = ?
                                    ORDER BY tb_movimento.id_movimento DESC LIMIT 10';

        
        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());
                      
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();        
    }
}
