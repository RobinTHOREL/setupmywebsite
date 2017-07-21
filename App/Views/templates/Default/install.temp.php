<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title ?></title>
    <meta name="description" content="<?php echo $page_description ?>">
    <!--   Need to change the document root ($server) to a public folder -->
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/css/style_install.css">
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/css/grid.css">
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/fonts/css/buttonLoader">
    <link rel="stylesheet" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/img/favicon.ico" />
</head>
<body>
    <header>

    </header>

    <?php include $this->view; ?>
    <footer>
        <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/js/index_front.js"></script>
        <script src="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/js/jquery.buttonLoader.js"></script>
        <script src="<?php echo BASE_ABSOLUTE_PATTERN;?>Public/js/jquery.buttonLoader.min.js"></script>
    </footer>
</body>
</html>
