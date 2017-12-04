<?php include __DIR__ . "/../../layouts/cabecalho-secretaria.php" ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <br>
                        <div class="pull-right col-md-2">
                            <a href="/secretaria/agendamentos/add">
                                <button id="btnNovo" class="btn btn-fill btn-sm btn-success" data-toggle="modal"
                                        data-target="#myModal">
                                    <strong> Adicionar</strong>
                                </button>
                            </a>
                        </div>
                        <br>
                        <div class="header">
                            <h4 class="title"><strong>Agendamento</strong></h4>
                            <p class="category">Lista de agendametos</p>
                        </div>
                        <?php include __DIR__ . "/../../layouts/msg.php" ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Paciente</th>
                                    <th>Data e Hora</th>
                                    <th>Medico</th>
                                    <th>Status</th>
                                    <th width="150" class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($agendamentos)) {
                                    foreach ($agendamentos as $agendamento) { ?>
                                        <tr>
                                            <td><?= $agendamento['paciente_id'] ?></td>
                                            <td><?= $agendamento['hora'] ?> / <?= $agendamento['data'] ?></td>
                                            <td><?= $agendamento['medico_id'] ?></td>
                                            <td>
                                                <?php if ($agendamento['status'] == 'A'): ?>
                                                    Aguardando
                                                <?php elseif ($agendamento['status'] == 'F'): ?>
                                                    Finalizado
                                                <?php endif; ?></td>
                                            <td>
                                                <a class="btn btn-fill btn-sm btn-default"
                                                   href="/secretaria/agendamentos/edit/<?php echo $agendamento['id']; ?>">
                                                    <div class="font-icon-detail">
                                                        <!--<i class="pe-7s-pen"></i>-->
                                                        <strong>Editar</strong>
                                                    </div>
                                                </a>
                                                <a class="btn btn-fill btn-sm btn-danger"
                                                   href="/secretaria/agendamentos/delete/<?php echo $agendamento['id']; ?>"
                                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                                    <strong> Deletar</strong>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/public_html/js/jquery-3.2.1.min.js"></script>
    <script>
        $('#agendamentos').addClass('active')
    </script>

<?php include __DIR__ . "/../../layouts/rodape.php"; ?>