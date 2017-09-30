<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="pull-right col-md-2">
                        <a href="/medicos/add">
                            <button id="btnNovo" class="btn btn-fill btn-sm btn-success" data-toggle="modal"
                                    data-target="#myModal">
                                <strong> Adicionar</strong>
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
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($medicos[0])) {
                                foreach ($medicos[0] as $medico) { ?>
                                    <tr>
                                        <td><?= $medico['id'] ?></td>
                                        <td><?= $medico['nome'] ?></td>
                                        <td><?= $medico['email'] ?></td>
                                        <td><?= $medico['telefone'] ?></td>
                                        <td><?= $medico['cidade'] ?></td>

                                        <td>
                                            <a class="btn btn-fill btn-sm btn-default"
                                               href="/medicos/edit/<?php echo $medico['id']; ?>">
                                                <div class="font-icon-detail">
                                                    <!--<i class="pe-7s-pen"></i>-->
                                                    <strong>Editar</strong>
                                                </div>
                                            </a>
                                            <a class="btn btn-fill btn-sm btn-danger"
                                               href="/medicos/delete/<?php echo $medico['id']; ?>"
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
    $('#medicos').addClass('active')
</script>

