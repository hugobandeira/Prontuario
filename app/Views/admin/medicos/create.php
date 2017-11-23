<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Cadastro de Medicos</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/medicos/add">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>CRM</label>
                                        <input name="crm" type="text" class="form-control"
                                               placeholder="Conselho Regional de Medicina do Maranhão">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NOME COMPLETO</label>
                                        <input type="text" name="nome" required class="form-control"
                                               placeholder="João da silva Ex:...">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Endereço</label>
                                        <input type="text" name="endereco" class="form-control"
                                               placeholder="Rua Exemplo 90">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <select name="cidade" class="form-control">
                                            <option selected disabled>Selecione uma cidade</option>
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
                                        <select name="especialidade" class="form-control">
                                            <option selected disabled>Sua </option>
                                            <?php foreach ($cidades as $cidade) { ?>
                                                <option value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?>
                                                    - <?= $cidade['uf'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cep</label>
                                        <input type="text" name="cep" class="form-control" placeholder="65900-000">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input type="text" name="complemento" class="form-control"
                                               placeholder="Casa e lote" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input type="text" name="rg" class="form-control" placeholder="000.000.0000-0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DATA NASCIMENTO</label>
                                        <input type="date" name="data_nascimento" class="form-control"
                                               placeholder="00/00/00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" name="naturalidade" class="form-control"
                                               placeholder="Ex: Brasileiro">
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
                                        <input type="number" name="telefone" class="form-control"
                                               placeholder="(99) 9 9999-9999">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="number" name="nacionalidade" class="form-control"
                                               placeholder="(99) 9 9999-9999">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Trabalho</label>
                                        <input type="text" name="trabalho" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
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




