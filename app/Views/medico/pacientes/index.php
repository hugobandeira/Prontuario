<?php include __DIR__ . '/../../layouts/cabecalho-medico.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Pacientes</h4>
                        <p class="category">Lista de pacientes que estão agendados com vc</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th width="300">Paciente</th>
                                <th width="400" class="text-center">Medico</th>
                                <th width="10" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($pacientes)):
                                foreach ($pacientes as $paciente): ?>
                                    <tr>
                                        <td><?= $paciente['paciente'] ?></td>
                                        <td>Dr. <?= $paciente['medico'] ?></td>
                                        <td>
                                            <a href="/medico/paciente/historio"
                                               class="btn btn-fill btn-sm btn-info">
                                                Histórico
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
    $('#pacientes').addClass('active');
</script>

<?php include __DIR__ . '/../../layouts/rodape.php'; ?>

