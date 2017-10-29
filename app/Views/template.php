<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
<?php if (isset($viewName)) {
    $path = viewsPath() . $viewName . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
} ?>
</body>
</html>