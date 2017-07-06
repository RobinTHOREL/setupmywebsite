<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<title>Bienvenue sur l'installation de Setup-My Website</title>
	<meta name="description" content="Page d'installation de Setup-My Website">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
	    Bienvenue sur Setup-My Website<br>
        <?php "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN."install/databaseConfiguration" ?>
	    <a href=<?php echo "http://".$_SERVER["HTTP_HOST"].BASE_ABSOLUTE_PATTERN."smw-admin/install/databaseConfiguration" ?>>Commencer l'installation<a/>
    </header>
</body>
</html>   