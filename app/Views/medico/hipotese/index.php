<?php include __DIR__ . '/../../layouts/app.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><strong>Hipótese diagnostico</strong></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/medico/hipotese/add">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Hipótese do médico</label>
                                        <textarea id="hipotese" name="hipotese" class="form-control"
                                                  rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea id="obs" name="obs" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <a id="enviar" class="btn btn-info btn-fill pull-left">Salvar</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="/medicos" class="btn btn-danger btn-fill pull-right">Cancelar</a>
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
<script>
    $("#enviar").click(function (e) {
            e.preventDefault();
            var hipotese = $("#hipotese").val();
            var obs = $("#obs").val();
            $.post("/medico/hipotese/add", {hipotese: hipotese, obs: obs})
                .done(function (data) {
                    console.log(data);
                }).success(function () {
                window.close();
            });
        }
    );
</script>
<?php include __DIR__ . '/../../layouts/rodape-sinais.php'; ?>

