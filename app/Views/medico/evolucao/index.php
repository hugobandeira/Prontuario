<?php include __DIR__ . '/../../layouts/app.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><strong>Evolução do paciente</strong></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/medico/hipotese/add">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Evolução (texto livre)</label>
                                        <textarea id="evolucao" name="hipotese" class="form-control"
                                                  rows="7"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <a id="enviar" class="btn btn-info btn-fill pull-right">Salvar</a>
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
            var evolucao = $("#evolucao").val();
            $.post("/medico/evolucao/add", {evolucao: evolucao})
                .done(function (data) {
                    console.log(data);
                }).success(function () {
                window.close();
            });
        }
    );
</script>
<?php include __DIR__ . '/../../layouts/rodape-sinais.php'; ?>

