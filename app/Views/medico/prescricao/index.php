<?php include __DIR__ . '/../../layouts/app.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><strong>Sinais Vitais</strong></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/medico/sinais/add">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Queixa principal</label>
                                        <input name="queixa_principal" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="email">PROBLEMAS RENAIS</label>
                                        <input type="text" name="pr_renais" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Problemas Articulares</label>
                                        <input type="text" name="pr_articulares" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-info btn-fill pull-left">Salvar</button>
                                </div>
                                <div class="col-md-2">
                                    <button href="/medicos" class="btn btn-danger btn-fill pull-right">Cancelar</button>
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

<?php include __DIR__ . '/../../layouts/rodape-sinais.php'; ?>

