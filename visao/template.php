<html>
<head>
    <title>Amazing Eletros</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= BASE_URL ?>">

    <link href="./publico/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./publico/_css/style.css">
</head>
<body>
    <?php require "./visao/cabecalho.php"; ?>

    <?php alertComponentRender(); ?>

    <main class="container">
        <?php require $viewFilePath; ?>
    </main>

    <?php require "visao/footer.php"; ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./publico/js/bootstrap.min.js"></script>
    <script src="./publico/_js/jquery.mask.js"></script>
    <script src="./publico/_js/ajax.js"></script>
    <script src="./publico/_js/main.js"></script>
</body>
</html>
