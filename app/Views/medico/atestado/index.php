<?php include __DIR__ . '/../../layouts/app.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><strong>Atestado</strong></h4>
                    </div>
                    <div class="content">
                        <form method="post" action="/medico/hipotese/add">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Atestado(texto livre)</label>
                                        <textarea id="atestado" name="hipotese" class="form-control"
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
            var atestado = $("#atestado").val();
            $.post("/medico/atestado/add", {atestado: atestado})
                .done(function (data) {
                    console.log(data);
                }).success(function () {
                swal({
                    position: 'top-right',
                    type: 'success',
                    title: 'Cadastro feito com suceso',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.close();
            });
        }
    );
</script>
<?php include __DIR__ . '/../../layouts/rodape-sinais.php'; ?>

