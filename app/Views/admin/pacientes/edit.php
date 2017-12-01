<?php include __DIR__ . "/../../layouts/cabecalho.php"; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Paciente: <?= $paciente['nome'] ?></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/pacientes/edit">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $paciente['id'] ?>">
                                        <label>NOME COMPLETO</label>
                                        <input type="text" name="nome" required class="form-control"
                                               value="<?= $paciente['nome'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco" class="form-control"
                                               value="<?= $paciente['endereco'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento" class="form-control"
                                               value="<?= $paciente['complemento'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro" class="form-control"
                                               value="<?= $paciente['bairro'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <select name="cidade_id" class="form-control">
                                            <?php foreach ($cidades as $cidade) { ?>
                                                <option <?php if ($cidade['id'] == $paciente['cidade_id']) { ?>
                                                    selected
                                                <?php } ?> value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?>
                                                    - <?= $cidade['uf'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input type="text" name="estado" class="form-control"
                                               value="<?= $paciente['estado'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cep</label>
                                        <input type="text" name="cep" class="form-control"
                                               value="<?= $paciente['cep'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input required type="email" name="email" class="form-control"
                                               value="<?= $paciente['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" required name="cpf" class="form-control"
                                               value="<?= $paciente['cpf'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input type="text" required name="rg" class="form-control"
                                               value="<?= $paciente['rg'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DATA NASCIMENTO</label>
                                        <input type="date" required name="data_nascimento" class="form-control"
                                               value="<?= $paciente['data_nascimento'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" name="naturalidade" class="form-control"
                                               value="<?= $paciente['naturalidade'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nacionalidade:</label>
                                        <input type="text" name="nacionalidade" class="form-control"
                                               value="<?= $paciente['nacionalidade'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>TELEFONE CELULAR</label>
                                        <input type="number" name="telefone" class="form-control"
                                               value="<?= $paciente['telefone'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>NOME DO PAI</label>
                                    <input type="text" name="nome_pai" class="form-control"
                                           value="<?= $paciente['nome_pai'] ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>NOME DA MÃE</label>
                                    <input type="text" name="nome_mae" class="form-control"
                                           value="<?= $paciente['nome_mae'] ?>">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="telefone_trabalho">TELEFONE TRABALHO</label>
                                        <input type="number" name="telefone_trabalho" class="form-control"
                                               value="<?= $paciente['telefone_trabalho'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label>TIPO SANGUÍNEO</label>
                                    <input type="text" name="tipo_sangue" class="form-control"
                                           value="<?= $paciente['tipo_sangue'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                </div>
                                <div class="col-md-2">
                                    <button href="/pacientes" class="btn btn-danger btn-fill">Cancelar</button>
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
    $('#pacientes').addClass('active')
</script>


<?php include __DIR__ . "/../../layouts/rodape.php"; ?>
