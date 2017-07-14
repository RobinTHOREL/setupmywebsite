<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $page_title ?></title>
		<meta name="description" content="<?php echo $page_description ?>">
        <link rel="stylesheet" href="/setupmywebsite/Public/css/style_front.css">
	</head>
	<body>
        <header></header>
			<?php include $this->view; ?>
        <footer>
            
        </footer>
        <script src="/setupmywebsite/Public/js/index_front.js"></script>
	</body>
</html>