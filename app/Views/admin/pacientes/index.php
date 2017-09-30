<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Pacientes</h4>
                        <p class="category">Lista de pacientes</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Endereço</th>
                                <th>Cidade</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jackson Hugo</td>
                                <td>Rua Coronel manuel B.</td>
                                <td>Imperatriz</td>
                                <td>
                                    <button href="#" class="btn btn-fill btn-sm btn-default">
                                        <div class="font-icon-detail">
                                            <i class="pe-7s-pen"></i>
                                        </div>
                                    </button>
                                    <a href="#" class="btn btn-fill btn-sm btn-danger">
                                        <div class="font-icon-list">
                                            <div class="font-icon-detail">
                                                <i class="pe-7s-trash"></i>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Minerva Hooper</td>
                                <td>$23,789</td>
                                <td>Curaçao</td>
                                <td>Sinaai-Waas</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../../layouts/rodape.php'; ?>
