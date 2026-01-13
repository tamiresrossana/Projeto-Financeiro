<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/CategoriaDAO.php';

$dao = new CategoriaDAO();

$categorias = $dao->ConsultarCategoria();


?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Consultar Categoria Financeiras Cadastrada</h2>
                        <h5>Aqui você pode CONSULTAR suas Categorias Financeiras.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span> Veja o Relatório de todas as Categorias Financeiras Cadastradas.</span>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">                               
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Qtd.</th>
                                                    <th>Nome da Categoria Financeira</th>
                                                    <th>Ação</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i=0; $i<count($categorias); $i++){ ?>
                                                <tr>
                                                    <td><?= $i+1 ?></td>
                                                    <td><?= $categorias[$i]['nome_categoria'] ?></td>
                                                    <td><a href="alterar_categoria.php?cod=<?= $categorias[$i]['id_categoria'] ?>" class="btn btn-warning">Alterar</a></td>                                                    
                                                </tr>   
                                                <?php } ?>                                         
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End  Kitchen Sink -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>