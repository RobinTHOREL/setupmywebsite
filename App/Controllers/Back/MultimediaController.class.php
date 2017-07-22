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
	        $media = new Medias();
	        $title = trim($_POST['fileTitle']);
	        $desc = trim($_POST['fileDesc']);
	        
	        // On génère un nouveau nom en partie aléatoire pour éviter les conflits
	        $fileName = bin2hex(mcrypt_create_iv(8, MCRYPT_DEV_URANDOM))."_".$_POST['fileName'];
	        $file = UPLOAD_PATH.$fileName;
	        
	        if(strlen($file)>255) {
	            array_push ( $response["message"] , "Le nom du fichier est trop long." );
	        }
	        
	        $checkExist = $media->getAllBy(["OR" => ["name"=>$title]]);
	        if($checkExist) {
	            array_push( $response["message"], "Le titre existe déjà.");
	        }
	        
	        if(strlen($title)<1 || strlen($title)>60) {
	            array_push ( $response["message"], "Le nom du titre est trop long." );
	        }
	        
	        if(strlen($desc)>120) {
	            array_push ( $response["message"], "La description est trop longue." );
	        }
	        
	        
	        // Décodage nécessaire suite à l'encodage par Javascript
	        $encodedData = str_replace(' ', '+', $_POST['file']);
	        $current = base64_decode($encodedData);
	        
	        // Écrit le résultat dans le fichier
	        if( file_put_contents($file, $current) == false ) {
	            array_push ( $response["message"], "Un erreur est survenu sur le serveur." );
	        }
	        
	        // TODO: Vérifier l'autheur
	        
	        // Récupère le type Mime un fois copié
	        $finfo = finfo_open(FILEINFO_MIME_TYPE);
	        $typeMime = finfo_file($finfo, $file);
	        finfo_close($finfo);

	        if( !in_array($typeMime, $typeAccept) ) {
	            array_push ( $response["message"], "Le type du fichier envoyé n'est pas accepté." );
	        }
	        
	        if(count($response["message"]) <= 0) {
    	        // On ajoute le fichier en base
    	        $media->setName($title);
    	        $media->setDescription($desc);
    	        $media->setAuthor("0");
    	        $media->setFormat($typeMime);
    	        $media->setLink($file);
    	        $media->Save();
    	        $response["status"] = "success";
	        } else {
	            if(file_exists($file)) {
	                unlink($file);
	            }
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
        // On récupère un ensemble d'image
        $media = new Medias();
        $result = $media->getAllBy([[]], 20, 0);
        $view->assign("files", $result);
    }

    public function pluginTinyAction($params)
    {
        $view = new View(BASE_BACK_OFFICE."medias/TinyMCE", "ajax");
        // On récupère un ensemble d'image
        $media = new Medias();
        $result = $media->getAllBy([[]], 20, 0);
        $view->assign("files", $result);
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/edit", "smw-admin");
        $view->assign("page_title", "Editer un contenu multimedia");
        $view->assign("page_description", "Page d'édition d'un contenu multimedia");
        
        if(isset($params[0])) {
            $media = new Medias();
            $mediaExist = $media->populate(["id"=>$params[0]]);
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['description'])) {
                if($mediaExist) {
                    $title = trim($_POST['title']);
                    $description = trim($_POST['description']);
                    $errors = [];
                    
                    $checkExist = $media->getAllBy(["OR" => ["name"=>$title]]);
                    if($checkExist) {
                        array_push($errors, "Le titre existe déjà.");
                    }
                    
                    if(strlen($title)<1 || strlen($title)>60) {
                        array_push($errors, "Le titre saisie est trop grand!");
                    }
                    
                    if(strlen($description)>120) {
                        array_push($errors, "La description saisie est trop grande!");
                    }
                    
                    if(count($errors)<=0) {
                        $media->setName($title);
                        $media->setDescription($description);
                        $media->Save();
                        $view->assign("success", "Le média a été mise à jour.");
                    } else {
                        $view->assign("errors", $errors);
                    }
                }
            }
            $view->assign("media", $media);
            $view->assign("mediaExist", $mediaExist);
        }        
        //$view->assign("post", $post);
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."medias/delete", "smw-admin");
        
        // Get and verify if the media exist
        $media = new Medias();
        $mediaExist = $media->populate(["id"=>$params[0]]);
        
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm']) && $_POST['confirm'] == "true") {
            
            if($mediaExist !== false) {
                $view->assign("delete", $media->deleteById());
            }
            if(file_exists(BASE_DOCUMENTS.$media->getLink())) {
                unlink(BASE_DOCUMENTS.$media->getLink());
            }
        }
        
        $view->assign("mediaExist", $mediaExist);
        $view->assign("page_title", "Suppression d'un article");
        $view->assign("page_description", "Page de suppression d'un article");
    }
}