<?php include __DIR__ . '/../../layouts/cabecalho.php'; ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Usuário</h4>
                            <p class="category">lista de usuário</p>
                        </div>

                        <div class="content">
                            <form method="post" href="/admin/user/add">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input required type="text" name="name" class="form-control"
                                                   placeholder="Nome de usuario">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input required type="email" name="email" class="form-control"
                                                   placeholder="Email">
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
                                                <option selected disabled>Selecine um nivel</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Médico</option>
                                                <option value="3">Secretária</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
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