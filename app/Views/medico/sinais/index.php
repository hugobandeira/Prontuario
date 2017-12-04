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
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Data</label>
                                        <input name="data" type="datetime-local" class="form-control" value="<?php echo date('d-m-Y h:m') ?>">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="email">Altura em centímetros</label>
                                        <input type="number" name="altura" step="0.01" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Peso</label>
                                        <input type="number" name="peso" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>IMC (índice massa corporal)</label>
                                        <input type="number" name="imc" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Temperatura em graus Celsius</label>
                                        <input type="number" name="temperatura" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dor</label>
                                        <input type="text" name="dor" class="form-control">
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


<script>
    $('#pacientes').addClass('active');
</script>

<?php include __DIR__ . '/../../layouts/rodape-sinais.php'; ?>

