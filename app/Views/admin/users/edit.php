<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Editar Usuário: <?= $user['name'] ?></h4>
                        </div>

                        <div class="content">
                            <form method="post" action="/user/edit">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <label>Nome</label>
                                            <input required type="text" name="name" class="form-control"
                                                   placeholder="Nome de usuario" value="<?= $user['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input required type="email" name="email" class="form-control"
                                                   placeholder="Email" value="<?= $user['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Senha</label>
                                            <input required type="password" name="senha" class="form-control"
                                                   placeholder="password">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>senha</label>
                                            <select required class="form-control" name="nivel">
                                                <?php if ($user['nivel'] == 1): ?>
                                                    <option selected value="1">Administrador</option>
                                                <?php elseif ($user['nivel'] == 2): ?>
                                                    <option selected value="2">Médico</option>
                                                <?php elseif ($user['nivel'] == 3): ?>
                                                    <option selected value="3">Secretária</option>
                                                <?php endif; ?>
                                                <option value="1">Administrador</option>
                                                <option value="2">Médico</option>
                                                <option value="3">Secretária</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="/user" class="btn btn-danger btn-fill">Cancelar</a>
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

    <script src="/public_html/js/jquery-3.2.1.min.js"></script>
    <script>
        $('#user').addClass('active');
    </script>

<?php include __DIR__ . '/../../layouts/rodape.php'; ?>