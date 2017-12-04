<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Cadastro de Medicos</h4>
                    </div>
                    <?php include __DIR__ . "/../../layouts/msg.php" ?>
                    <div class="content">
                        <form method="post" action="/admin/medicos/add">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>CRM</label>
                                        <input name="crm" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input required type="email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NOME COMPLETO</label>
                                        <input type="text" name="nome" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <select required name="cidade_id" class="form-control">
                                        <option disabled>Selecione uma cidade</option>
                                        <?php foreach ($cidades as $cidade) { ?>
                                            <option value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?>
                                                - <?= $cidade['uf'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Especialidade</label>
                                    <select name="especialidade_id" class="form-control">
                                        <option selected value="1">Cirugião</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cep</label>
                                        <input type="text" name="cep" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input required type="text" name="cpf" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input required type="text" name="rg" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DATA NASCIMENTO</label>
                                        <input required type="date" name="data_nascimento" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" name="naturalidade" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nacionalidade:</label>
                                        <input type="text" name="nacionalidade" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input required type="number" name="telefone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="number" name="nacionalidade" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Trabalho</label>
                                        <input type="text" name="trabalho" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                </div>
                                <div class="col-md-2">
                                    <button href="/medicos" class="btn btn-danger btn-fill">Cancelar</button>
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




