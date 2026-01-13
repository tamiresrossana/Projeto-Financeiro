<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/MovimentoDAO.php';

$objDAO = new MovimentoDAO();

$total_entrada = $objDAO->TotalDeEntrada();
$total_saida = $objDAO->TotalDeSaida();
$movs = $objDAO->UltimoDezMovimentos();


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

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>

                        <h2>Página Inicial</h2>
                        <h5>Aqui você acompanha todos os números de uma forma geral! </h5>
                    </div>
                </div>
                <hr />
                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= $total_entrada[0]['total'] != null ? number_format($total_entrada[0]['total'], 2, ',', '.') : '0' ?> </h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            TOTAL DE ENTRADAS

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= $total_saida[0]['total'] != null ? number_format($total_saida[0]['total'], 2, ',', '.') : '0' ?></h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            TOTAL DE SAÍDAS

                        </div>
                    </div>
                </div>

                <hr>
                <?php if (count($movs) > 0) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span>Últimos 10 lançamentos de Movimento</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Tipo</th>
                                                <th>Categoria</th>
                                                <th>Valor</th>
                                                <th>Empresa</th>
                                                <th>Conta</th>
                                                <th>Observação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $total = 0;

                                            for ($i = 0; $i < count($movs); $i++) {
                                                if ($movs[$i]['tipo_movimento'] == 1) {
                                                    $total = $total + $movs[$i]['valor_movimento'];
                                                } else {
                                                    $total = $total - $movs[$i]['valor_movimento'];
                                                }
                                            ?>
                                                <tr>

                                                    <td><?= $movs[$i]['data_movimento'] ?></td>
                                                    <td><?= $movs[$i]['tipo_movimento'] == 1 ? '<strong style="color: #006400;">Entrada</strong>' : '<strong style="color: #ff0000;">Saída</strong>' ?></td>
                                                    <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                    <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                    <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                    <td><?= $movs[$i]['banco_conta'] ?> | Agência <?= $movs[$i]['agencia_conta'] ?> | Núm Conta: <?= $movs[$i]['numero_conta'] ?> | Saldo Conta: R$ <?= number_format($movs[$i]['saldo_conta'], 2, ',', '.') ?></td>
                                                    <td><?= $movs[$i]['obs_movimento'] ?></td>


                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div style="text-align: center;">
                                        <strong>Total: </strong>
                                        <span style="color: <?= $total < 0 ? '#ff0000' : '#006400' ?>">
                                            <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>
                    <center>
                    <div class="alert alert-info col-md-12">
                        Não existe nenhum movimento para se exibido!
                    </div>
                    </center>

                    <?php } ?>
            </div>
        </div>



    </div>
    <!-- JS para manipular Senha! -->
    <script>
        $("#olho").mousedown(function() {
            $("#senha").attr("type", "text");
        });
        $("#olho").mouseup(function() {
            $("#senha").attr("type", "password");
        });
    </script>
</body>

</html>