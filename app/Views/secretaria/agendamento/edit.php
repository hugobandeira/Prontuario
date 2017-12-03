<?php include __DIR__ . '/../../layouts/cabecalho-secretaria.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Cadastrar agendamento</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/secretaria/agendamentos/edit">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Paciente</label>
                                        <select disabled required name="paciente_id" class="form-control">
                                            <?php if (isset($pacientes)):
                                                foreach ($pacientes as $paciente): ?>
                                                    <option
                                                        <?php if ($agendamento['paciente_id'] == $paciente['id']): ?>
                                                            selected
                                                        <?php endif; ?>
                                                            value="<?= $paciente['id'] ?>"><?= $paciente['nome'] ?></option>
                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                        <input type="hidden" name="id" value="<?= $agendamento['id'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="email">Médico</label>
                                        <select required name="medico_id" class="form-control">
                                            <?php
                                            if (isset($medicos)):
                                                foreach ($medicos as $medico): ?>
                                                    <option
                                                        <?php if ($agendamento['medico_id'] == $medico['id']): ?>
                                                            selected
                                                        <?php endif; ?>
                                                            value="<?= $medico['id'] ?>"><?= $medico['nome'] ?></option>
                                                <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="time" name="hora" required class="form-control"
                                               value="<?= $agendamento['hora'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input type="date" name="data" required class="form-control"
                                               value="<?= $agendamento['data'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="/secretaria/agendamentos" class="btn btn-danger btn-fill">Cancelar
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/public_html/js/jquery-3.2.1.min.js"></script>
<script>
    $('#medicos').addClass('active')
</script>

<?php include __DIR__ . '/../../layouts/rodape.php'; ?>




