<?php
class MultimediaController{
	public function addAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/add", "smw-admin");
        $view->assign("page_title", "Ajouter un contenu multimedia");
        $view->assign("page_description", "Page d'ajout de contenu multimedia");
	}
	
	public function uploadAction($params){
	    // On vérifie qu'un fichier est reçu
	    if(isset($_POST['file'])) {
	        // On génère un nouveau nom en partie aléatoire pour éviter les conflits
	        if(isset($_POST['fileName'])) {
	            $name = bin2hex(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM))."_".$_POST['fileName'];
	        } else {
	            $name = bin2hex(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM)).".txt";
	        }
	        $file = UPLOAD_PATH.$name;
	        
	        // Décodage nécessaire suite à l'encodage par Javascript
	        $encodedData = str_replace(' ', '+', $_POST['file']);
	        $current = base64_decode($encodedData);
	        
	        // Écrit le résultat dans le fichier
	        file_put_contents($file, $current);
	        
	        // Récupère le type Mime un fois copié
	        $finfo = finfo_open(FILEINFO_MIME_TYPE);
	        $typeMime = finfo_file($finfo, $file);
	        finfo_close($finfo);
	        
	        // On ajoute le fichier en base
	        $media = new Medias();
	        $media->setName($name);
	        $media->setDescription("DESC");
	        $media->setAuthor("0");
	        $media->setFormat($typeMime);
	        $media->setLink($file);
	        $media->Save();
	        echo "OK";
	    } else {
	        echo "ERROR";
	    }
	}

    public function viewAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/index", "smw-admin");
        $view->assign("page_title", "Voir les contenus multimedia");
        $view->assign("page_description", "Page listant les contenus multimedia");

        // Mettre le bon PATH si dessous pour récupérer les fichiers contenu dans le dossier App/Public/upload
        $dir    = BASE_DOCUMENTS.UPLOAD_PATH;
        $files1 = scandir($dir);

        $i = 0;
        $j = 0;
        foreach ($files1 as $value) {
            if($files1[$i] != "." && $files1[$i] != ".."){
                $filesClean[$j] = $files1[$i];
                $j++;
            }
            $i++;
        }

        $view->assign("files", $filesClean);
    }

    public function pluginTinyAction($params)
    {
        // Mettre le bon PATH si dessous pour récupérer les fichiers contenu dans le dossier App/Public/upload
        $dir = BASE_DOCUMENTS.UPLOAD_PATH;
        $files1 = scandir($dir);
        
        $i = 0;
        $j = 0;
        foreach ($files1 as $value) {
            if ($files1[$i] != "." && $files1[$i] != "..") {
                $filesClean[$j] = $files1[$i];
                $j ++;
            }
            $i ++;
        }
      
        $view = new View(BASE_BACK_OFFICE."medias/TinyMCE", "ajax");
        $view->assign("files", $filesClean);
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/edit", "smw-admin");
        $view->assign("page_title", "Editer un contenu multimedia");
        $view->assign("page_description", "Page d'édition d'un contenu multimedia");
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/delete", "smw-admin");
        $view->assign("page_title", "Supprimer un contenu multimedia");
        $view->assign("page_description", "Page de suppression d'un contenu multimedia");
    }
}