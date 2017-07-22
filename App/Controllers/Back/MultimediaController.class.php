<?php
class MultimediaController{
	public function addAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/add", "smw-admin");
        $view->assign("page_title", "Ajouter un contenu multimedia");
        $view->assign("page_description", "Page d'ajout de contenu multimedia");
	}
	
	public function uploadAction($params){
	    $response = array();
	    $response["status"] = "";
	    $response["message"] = array();
	    $typeAccept = array(
	        'png' => 'image/png',
	        'jpg' => 'image/jpeg');
	    
	    // On vérifie qu'un fichier est reçu
	    if(isset($_POST['file']) && isset($_POST['fileName'])  
	        && isset($_POST['fileTitle']) && isset($_POST['fileDesc'])) {
	        
	        $title = trim($_POST['fileTitle']);
	        $desc = trim($_POST['fileDesc']);
	        
	        // On génère un nouveau nom en partie aléatoire pour éviter les conflits
	        $fileName = bin2hex(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM))."_".$_POST['fileName'];
	        $file = UPLOAD_PATH.$fileName;
	        
	        if(strlen($file)>255) {
	            array_push ( $response["message"] , "Le nom du fichier est trop long." );
	        }
	        
	        if(strlen($title)<1 || strlen($title)>60) {
	            array_push ( $response["message"] , "Le nom du titre est trop long." );
	        }
	        
	        if(strlen($desc)>120) {
	            array_push ( $response["message"] , "La description est trop longue." );
	        }
	        
	        
	        // Décodage nécessaire suite à l'encodage par Javascript
	        $encodedData = str_replace(' ', '+', $_POST['file']);
	        $current = base64_decode($encodedData);
	        
	        // Écrit le résultat dans le fichier
	        if( file_put_contents($file, $current) == false ) {
	            array_push ( $response["message"] , "Un erreur est survenu sur le serveur." );
	        }
	        
	        // TODO: Vérifier l'autheur
	        
	        // Récupère le type Mime un fois copié
	        $finfo = finfo_open(FILEINFO_MIME_TYPE);
	        $typeMime = finfo_file($finfo, $file);
	        finfo_close($finfo);

	        if( !in_array($typeMime, $typeAccept) ) {
	            array_push ( $response["message"] , "Le type du fichier envoyé n'est pas accepté." );
	        }
	        
	        if(count($response["message"]) <= 0) {
    	        // On ajoute le fichier en base
    	        $media = new Medias();
    	        $media->setName($title);
    	        $media->setDescription($desc);
    	        $media->setAuthor("0");
    	        $media->setFormat($typeMime);
    	        $media->setLink($file);
    	        $media->Save();
    	        $response["status"] = "success";
	        } else {
	            $response["status"] = "error";
	        }
	    } else {
	        $response["status"] = "error";
	    }
	    header('Content-type: application/json');
	    echo json_encode($response);
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