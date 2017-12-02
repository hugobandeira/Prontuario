<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <br>
                        <div class="pull-right col-md-2">
                            <a href="/user/add">
                                <button class="btn btn-fill btn-sm btn-success">
                                    <strong> Adicionar</strong>
                                </button>
                            </a>
                        </div>
                        <br>
                        <div class="header">
                            <h4 class="title">Usuário</h4>
                            <p class="category">lista de usuário</p>
                            <?php include __DIR__ . "/../../layouts/msg.php" ?>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Nivel</th>
                                    <th style="width: 230px; text-align: center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr id="tr_{{ $cidade->id }}">
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['nivel'] ?></td>
                                            <td>
                                                <a class="btn btn-fill btn-sm btn-inverse"
                                                   href="/user/edit/<?= $user['id'] ?>">
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
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/public_html/js/jquery-3.2.1.min.js"></script>
    <script>
        $('#user').addClass('active');
    </script>

<?php include __DIR__ . '/../../layouts/rodape.php'; ?>