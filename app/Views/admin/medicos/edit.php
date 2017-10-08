<?php include __DIR__."/../../layouts/cabecalho.php";?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Médico</h4>
                        <p class="category">Detalhes do médico</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <form method="post" action="/medicos/edit">
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
                                <tr>

                                    <td><input name="id" class="form-control" value="<?= $medico['id']; ?>"></td>
                                    <td><input name="nome" type="text" class="form-control"
                                               value="<?= $medico['nome'] ?>"></td>
                                    <td><input name="email" type="text" class="form-control"
                                               value="<?= $medico['email'] ?>"></td>
                                    <td><input name="telefone" type="text"
                                               class="form-control" value="<?= $medico['telefone'] ?>"></td>
                                    <td><input name="cidade" type="text" class="form-control"
                                               value="<?= $medico['cidade'] ?>">
                                    </td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-primary pull-right" type="submit">Alterar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="/public_html/js/jquery-3.2.1.min.js"></script>
<script>
    $('#medicos').addClass('active')
</script>
<?php include __DIR__."/../../layouts/rodape.php";?>
