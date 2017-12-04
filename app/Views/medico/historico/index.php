<!DOCTYPE html>
<html>
<head>
    <?php include __DIR__ . "/../../layouts/partials/medico/htmlheader.php" ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #474e5d;
            font-family: Helvetica, sans-serif;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline {
            position: relative;
            max-width: 780px;
            margin: 0 auto;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: white;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        /* Container around content */
        .container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        /* The circles on the timeline */
        .container::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: white;
            border: 4px solid #FF9F55;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        /* Place the container to the left */
        .left {
            left: -30%;
        }

        /* Place the container to the right */
        .right {
            left: 30%;
        }

        /* Add arrows to the left container (pointing right) */
        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        /* Add arrows to the right container (pointing left) */
        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        /* Fix the circle for containers on the right side */
        .right::after {
            left: -16px;
        }

        /* The actual content */
        .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media all and (max-width: 600px) {
            /* Place the timelime to the left */
            .timeline::after {
                left: 31px;
            }

            /* Full-width containers */
            .container {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .container::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            /* Make sure all circles are at the same spot */
            .left::after, .right::after {
                left: 15px;
            }

            /* Make all right containers behave like the left ones */
            .right {
                left: 0%;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <?php include __DIR__ . "/../../layouts/partials/medico/sidebar.php"; ?>
    <div class="main-panel">
        <?php include __DIR__ . "/../../layouts/partials/medico/navbar.php"; ?>

        <div class="timeline">
            <?php if (isset($historicos)): ?>
                <?php foreach ($historicos as $historico): ?>
                    <div <?php if ($historico['id'] / 2 != 0): ?>
                        class="container left"
                    <?php else: ?>
                        class="container right"
                    <?php endif; ?>
                    >
                        <div class="content">
                            <h5><?= $historico['nome_paciente'] ?></h5>
                            <p>Data de atenimento: <?= $historico['data'] ?></p>
                            <p>Medico: <?= $historico['nome_medico'] ?></p>
                            <p>Dor: <?= $historico['dor'] ?></p>
                            <p>Hipotese: <?= $historico['hipotese'] ?></p>
                            <p>Problemas cardiacos: <?= $historico['pr_cariacos'] ?></p>
                            <p>Ultiliza Medicamentos: <?= $historico['ultiliza_med'] ?></p>
                            <p>Queixa principal: <?= $historico['queixa_principal'] ?></p>
                            <p>Evolucao: <?= $historico['evolucao'] ?></p>
                            <p>Observação: <?= $historico['obs'] ?></p>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-left">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
            <a href="https://www.facebook.com/jackson.hugo.7">Hugo Soluções</a>, Todos os direitos reservados
        </p>
    </div>
</footer>
<?= include __DIR__ . "/../../layouts/partials/scripts.php"; ?>
</body>
</html>



