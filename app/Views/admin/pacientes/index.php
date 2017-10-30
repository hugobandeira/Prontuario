<?php include __DIR__ . "/../../layouts/cabecalho.php"; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="pull-right col-md-2">
                        <a href="/pacientes/add">
                            <button id="btnNovo" class="btn btn-fill btn-sm btn-success" data-toggle="modal"
                                    data-target="#myModal">
                                <strong> Adicionar</strong>
                            </button>
                        </a>
                    </div>
                    <div class="header">
                        <h4 class="title">Pacientes</h4>
                        <p class="category">Lista de pacientes</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th width="300">Nome</th>
                                <th>Endereço</th>
                                <th>Cidade</th>
                                <th width="150">Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if (isset($pacientes)) {
                                foreach ($pacientes as $paciente) {
                                    ?>
                                    <tr>
                                        <td><?= $paciente['id'] ?></td>
                                        <td><?= $paciente['nome'] ?></td>
                                        <td><?= $paciente['endereco'] ?></td>
                                        <td><?= $paciente['cidades'] ?></td>
                                        <td>
                                            <a class="btn btn-fill btn-sm btn-default"
                                               href="/pacientes/edit/<?php echo $paciente['id']; ?>">
                                                <div class="font-icon-detail">
                                                    <!--<i class="pe-7s-pen"></i>-->
                                                    <strong>Editar</strong>
                                                </div>
                                            </a>
                                            <a class="btn btn-fill btn-sm btn-danger"
                                               href="/pacientes/delete/<?php echo $paciente['id']; ?>"
                                               onclick="return confirm('Tem certeza de que deseja remover?');">
                                                <strong> Deletar</strong>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            }; ?>

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
    $('#pacientes').addClass('active');
</script>
<?php include __DIR__ . "/../../layouts/rodape.php"; ?>
