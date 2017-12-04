<?php include __DIR__ . "/../../layouts/cabecalho-secretaria.php" ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!--                        <br>-->
                        <!--                        <div class="pull-right col-md-2">-->
                        <!--                            <a href="/admin/medicos/add">-->
                        <!--                                <button id="btnNovo" class="btn btn-fill btn-sm btn-success" data-toggle="modal"-->
                        <!--                                        data-target="#myModal">-->
                        <!--                                    <strong> Adicionar</strong>-->
                        <!--                                </button>-->
                        <!--                            </a>-->
                        <!--                        </div>-->
                        <!--                        <br>-->
                        <div class="header">
                            <h4 class="title"><strong>Médicos</strong></h4>
                            <p class="category">Lista de médicos</p>
                        </div>
                        <?php include __DIR__ . "/../../layouts/msg.php" ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Medico</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Cidade</th>
                                    <!--                                    <th width="150" class="text-center">Ações</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($medicos)) :
                                    foreach ($medicos as $medico): ?>
                                        <tr>
                                            <td><?= $medico['nome'] ?></td>
                                            <td><?= $medico['email'] ?></td>
                                            <td><?= $medico['telefone'] ?></td>
                                            <td><?= $medico['cida'] ?></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#medicos').addClass('active')
    </script>

<?php include __DIR__ . "/../../layouts/rodape.php"; ?>