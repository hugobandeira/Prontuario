<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="pull-right">
                        <a href="/medicos/add">
                            <button id="btnNovo" class="btn btn-fill btn-sm btn-default" data-toggle="modal"
                                    data-target="#myModal">
                                <i class="fa fa-plus"></i>
                                Adicionar
                            </button>
                        </a>
                    </div>
                    <br>
                    <div class="header">
                        <h4 class="title">Médicos</h4>
                        <p class="category">Lista de médicos</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Medico</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Cidade</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($medicos[0] as $medico) { ?>
                                <tr>
                                    <td><?= $medico['id'] ?></td>
                                    <td><?= $medico['nome'] ?></td>
                                    <td><?= $medico['email'] ?></td>
                                    <td><?= $medico['telefone'] ?></td>
                                    <td><?= $medico['cidade'] ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("medicos").addClass('active');
    console.log("teste");
</script>
<?php include __DIR__ . '/../../layouts/rodape.php'; ?>
