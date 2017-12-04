<?php include __DIR__ . '/../layouts/cabecalho.php'; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                    Sistema de Agendamentos
                </div>
                <div class="card-block">
                    <h4 class="card-title">Home</h4>
                    <p class="card-text">Sistema feito para atender Medicos, recepcionistas e ajuda no serviço.</p>
                    <?php if (isset($_SESSION['nome'])) { ?>
                        <a href="#" class="btn btn-primary"><?= $_SESSION['nome']; ?> </a>
                    <?php } else { ?>
                        <a href="/" class="btn btn-warning">Fale conosco</a>
                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                    Hugo Soluções
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div style="text-align: center" class="header">
                        <h4 class="title">Agendamento</h4>
                        <p class="category">lista de agendamentos</p>
                        <a href="/admin/agendamentos" class="btn btn-primary">Faça um agendamento</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div style="text-align: center" class="header">
                        <h4 class="title">Medicos</h4>
                        <p class="category">Lista de Medicos</p>
                        <a href="/admin/medicos" class="btn btn-primary">Todos os Medicos</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div style="text-align: center" class="card">
                    <div class="header">
                        <h4 class="title">Pacientes</h4>
                        <p class="category">lista de Pacientes</p>
                        <a href="/admin/pacientes" class="btn btn-primary">Todos os pacientes</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div style="text-align: center" class="card">
                    <div class="header">
                        <h4 class="title">Fa</h4>
                        <p class="category">lista de Pacientes</p>
                        <a href="/admin/pacientes" class="btn btn-primary">Todos os pacientes</a>
                    </div>
                    <div class="content table-responsive table-full-width">
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/../layouts/rodape.php'; ?>