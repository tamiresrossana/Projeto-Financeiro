<?php
require_once '../DAO/EmpresaDAO.php';

$objDAO = new EmpresaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $idEmpresa = $_GET['cod'];

    $dados = $objDAO->DetalharEmpresa($idEmpresa);

    if (count($dados) == 0) {
        header('location: consulta_empresa.php');
        exit();
    }
} else if (isset($_POST['btnSalvar'])) {
    $nomeEmp = trim($_POST['nomeEmp']);
    $telefone = trim($_POST['tele']);
    $endereco = trim($_POST['local']);
    $idEmpresa = $_POST['cod'];

    $ret = $objDAO->AlterarEmpresa($nomeEmp, $telefone, $endereco, $idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit();
} else if (isset($_POST['btnExcluir'])) {
    $idEmpresa = $_POST['cod'];

    $ret = $objDAO->ExcluirEmpresa($idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit();
} else {
    header('location: consultar_empresa.php');
    exit();
}



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
                        <h2>Alterar/Excluir uma Empresa</h2>
                        <h5>Aqui você poderá ALTERAR ou EXCLUIR sua empresa. </h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr />
                <form action="alterar_empresa.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label>Digite o Nome da Empresa</label>
                        <input class="form-control" placeholder="Digite o nome da empresa..." name="nomeEmp" id="nomeEmp" value="<?= $dados[0]['nome_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Digite o Telefone (WhatsApp)</label>
                        <input class="form-control" placeholder="Digite o Telefone da aqui... " name="tele" id="tele" value="<?= $dados[0]['telefone_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Digite o Endereço da Empresa</label>
                        <input class="form-control" placeholder="Digite o Endereço aqui... " name="local" id="local" value="<?= $dados[0]['endereco_empresa'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarEmpresa();">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de Exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja Excluir a Empresa: <b><?= $dados[0]['nome_empresa'] ?></b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>