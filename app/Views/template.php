<!doctype html>
<html lang="pt-br">

<?php include __DIR__ . "/layouts/partials/htmlheader.php" ?>
<body>
<div class="wrapper">
    <?php include __DIR__ . "/layouts/partials/sidebar.php"; ?>
    <div class="main-panel">

        <?php include __DIR__ . "/layouts/partials/navbar.php"; ?>
        <?php if (isset($viewName)) {
            $path = viewsPath() . $viewName . '.php';
            if (file_exists($path)) {
                require_once $path;
            }
        }
        ?>
        <?php include __DIR__ . "/layouts/partials/footer.php"; ?>
    </div>
    <?= include __DIR__ . "/layouts/partials/scripts.php"; ?>
</div>
</body>
</html>

