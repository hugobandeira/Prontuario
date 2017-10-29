<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="/public_html/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Prontuario Medico</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link href="/public_html/login/css.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>

</head>

<body>

<div class="login-container">
    <?php if (isset($msg)) { ?>
        <div class="alert alert-danger">
            <p><?= $msg ?></p>
        </div>
    <?php } ?>
    <div id="output"></div>
    <div class="avatar"></div>
    <div class="form-box">
        <form action="/" method="post">
            <input required name="user" type="text" placeholder="username">
            <input required name="senha" type="password" placeholder="password">
            <button class="btn btn-info btn-block login" type="submit">Login</button>
        </form>
    </div>
</div>
<script language="JavaScript" src="/public_html/login/js.js"></script>
</body>
</html>