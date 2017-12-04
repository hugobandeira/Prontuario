<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <br>
                        <div class="pull-right col-md-2">
                            <a href="/admin/user/add">
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
                                    <th width="150" class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr id="tr_{{ $cidade->id }}">
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td>
                                                <?php if ($user['nivel'] == 1): ?>
                                                    Administrador
                                                <?php elseif ($user['nivel'] == 2): ?>
                                                    Médico
                                                <?php elseif ($user['nivel'] == 3): ?>
                                                    Secretária
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-fill btn-sm btn-inverse"
                                                   href="/admin/user/edit/<?= $user['id'] ?>">
                                                    <strong>Editar</strong>
                                                </a>
                                                <a class="btn btn-fill btn-sm btn-danger"
                                                   href="/admin/user/remove/<?= $user['id']; ?>"
                                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                                    <strong> Deletar</strong>
                                                </a>
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