<?php include __DIR__ . '/../layouts/cabecalho.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Agendamentos</h4>
                        <p class="category">lista de atendimentos</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Paciente</th>
                                <th>Medico</th>
                                <th>Descrição</th>
                                <th style="width: 230px; text-align: center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="tr_{{ $cidade->id }}">
                                <td>1</td>
                                <td>Jackson Hugo</td>
                                <td>DR. Antonio Carlos</td>
                                <td>dores pulmonares</td>
                                <td>
                                    <a class="btn btn-fill btn-sm btn-inverse"
                                       href="{{ route($rota.'edit', ['id'=>$cidade->id]) }}">
                                        <i class="fa fa-pencil" style="color: #fff;"></i>
                                        Editar
                                    </a>
                                    <button class="btn btn-fill btn-sm btn-danger"
                                            onclick="excluir('{{ $cidade->id }}', 'Cidades')">
                                        <i class="fa fa-remove"></i>
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layouts/rodape.php'; ?>
