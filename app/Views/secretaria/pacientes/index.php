<?php include __DIR__ . "/../../layouts/cabecalho-secretaria.php"; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="pull-right col-md-2">
                        <a href="/secretaria/pacientes/add">
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
                    <?php include __DIR__ . "/../../layouts/msg.php" ?>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th width="300">Nome</th>
                                <th>Endereço</th>
                                <th>TIPO SANGUÍNEO</th>
                                <th>Cidade</th>
                                <th width="150" class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if (isset($pacientes)):
                                foreach ($pacientes as $paciente) :
                                    ?>
                                    <tr>
                                        <td><?= $paciente['nome'] ?></td>
                                        <td><?= $paciente['endereco'] ?></td>
                                        <td><?= $paciente['tipo_sangue'] ?></td>
                                        <td><?= $paciente['cida'] ?></td>
                                        <td>
                                            <a class="btn btn-fill btn-sm btn-default"
                                               href="/secretaria/pacientes/edit/<?php echo $paciente['id']; ?>">
                                                <div class="font-icon-detail">
                                                    <strong>Editar</strong>
                                                </div>
                                            </a>
                                            <a class="btn btn-fill btn-sm btn-danger"
                                               href="/secretaria/pacientes/delete/<?php echo $paciente['id']; ?>"
                                               onclick="return confirm('Tem certeza de que deseja remover?');">
                                                <strong> Deletar</strong>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;
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
<?php include __DIR__ . "/../../layouts/rodape.php"; ?>
