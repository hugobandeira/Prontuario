<?php include __DIR__ . '/../../layouts/cabecalho-medico.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Agenda</h4>
                        <p class="category">Ordem de atendimento</p>
                    </div>
                    <?php include __DIR__ . "/../../layouts/msg.php" ?>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Paciente</th>
                                <th width="15%" class="text-center">Hora marcada</th>
                                <th>Status</th>
                                <th width="19%" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($agendas)):
                                foreach ($agendas as $agenda): ?>
                                    <tr>
                                        <td><?= $agenda['paciente'] ?></td>
                                        <td><?= $agenda['hora'] ?> / <?= $agenda['data'] ?></td>
                                        <td>
                                            <?php if ($agenda['status'] == 'A'): ?>
                                                Aguardando
                                            <?php elseif ($agenda['status'] == 'F'): ?>
                                                Finalizado
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="/medico/historico/<?= $agenda['paciente_id'] ?>"
                                               class="btn btn-fill btn-sm btn-info">
                                                Histórico
                                            </a>
                                            <a href="/medico/agenda/atende/<?= $agenda['id'] ?>"
                                               class="btn btn-fill btn-sm btn-success">
                                                Atender
                                            </a>
                                        </td>
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
    $('#agendamentos').addClass('active');
</script>

<?php include __DIR__ . '/../../layouts/rodape.php'; ?>

