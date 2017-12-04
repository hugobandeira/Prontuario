<?php include __DIR__ . '/../../../layouts/cabecalho-medico.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    <div class="pull-left col-md-2">
                        <a href="/medico/agenda">
                            <button id="btnNovo" class="btn btn-fill btn-sm btn-fill" data-toggle="modal"
                                    data-target="#myModal">
                                <strong> Voltar</strong>
                            </button>
                        </a>
                    </div>
                    <br>
                    <br>
                    <div class="header">
                        <h4 class="title">Atender paciente</h4>
                        <p class="category">Paciente</p>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-2">
                                <button id="sinais" class="btn btn-info btn-fill">
                                    Sinais vitais
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button id="hipotese" class="btn btn-info btn-fill">
                                    Hipótese diagnostico
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button id="prescricao" class="btn btn-info btn-fill">
                                    Prescrição médica
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button id="evolucao" class="btn btn-info btn-fill">
                                    Evolução do paciente
                                </button>
                            </div>
                            <div class="col-md-1">
                                <button id="atestado" class="btn btn-info btn-fill">
                                    Atestado
                                </button>
                            </div>
                        </div>
                        <br>

                        <form method="post" action="/medico/agenda/atende/add">
                            <div class="row">
                                <input type="hidden" name="agendamento_id" value="<?= $agendamento_id ?>">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Problemas Cardiacos</label>
                                        <input type="text" name="pr_cariacos" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Problemas respiratório</label>
                                        <input type="text" name="pr_respiratorios" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Problemas Gastricos</label>
                                        <input type="text" name="pr_gastricos" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alergias</label>
                                        <input type="text" name="alergias" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hepatite</label>
                                        <input type="checkbox" name="hepatite" value="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Gravides</label>
                                        <input type="checkbox" name="gravides" value="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Diabetes</label>
                                        <input type="checkbox" name="diabetes" value="1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PROBLEMAS DE CICATRIZAÇÃO</label>
                                        <input type="checkbox" name="pr_cicatrizacao" value="1">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>UTILIZA MEDICAMENTOS</label>
                                        <input type="text" name="ultiliza_med" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="/medico/agenda" class="btn btn-danger btn-fill">Cancelar</a>
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
    $('#agendamentos').addClass('active');

    $('#sinais').click(function popUp() {
        window.open('/medico/sinais?feedback',
            'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO,' +
            'DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=600');
    });
    $('#hipotese').click(function popUp() {
        window.open('/medico/hipotese?feedback',
            'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO,' +
            'DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=600');
    });
    $('#prescricao').click(function popUp() {
        window.open('/medico/prescricao?feedback',
            'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO,' +
            'DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=600');
    });
    $('#evolucao').click(function popUp() {
        window.open('/medico/evolucao?feedback',
            'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO,' +
            'DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=600');
    });
    $('#atestado').click(function popUp() {
        window.open('/medico/atestado?feedback',
            'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO,' +
            'DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=800, HEIGHT=600');
    });

</script>

<?php include __DIR__ . '/../../../layouts/rodape.php'; ?>

