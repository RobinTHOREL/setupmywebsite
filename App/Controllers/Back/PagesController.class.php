<?php
class PagesController{
    public function addAction($params){

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $page = new Pages();
            $page->setName($title);
            $page->setDescription($content);
            $page->setFriendlyUrl("0");
            $page->setPostsId("0");
            $page->Save();

        }

        $view = new View(BASE_BACK_OFFICE."pages/add", "smw-admin");
        $view->assign("page_title", "Ajouter une nouvelle page");
        $view->assign("page_description", "Page d'ajout de nouvelle page");
        
        if ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) 
            && isset($_POST['description']) ) {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $isPublished = "0";
            $listOfErrors = [];

            $pageExist = new Pages();
            $pageExist->populate(["title"=>$title]);
            if($pageExist->getId() != "-1") {
                array_push($listOfErrors, "Une autre pages possède déjà ce titre.");
            }
            
            if(strlen($title)<1) {
                array_push($listOfErrors, "Le titre saisie est trop court.");
            }
            if(strlen($title)>512) {
                array_push($listOfErrors, "Le titre saisie est trop long.");
            }
            
            if(strlen($description)>255) {
                array_push($listOfErrors, "La description saisie est trop longue.");
            }
            
            if(isset($_POST['is_published']) && $_POST['is_published'] == "1") {
                $isPublished = "1";
            }
            
            if(count($listOfErrors)<=0) {
                $page = new Pages();
                $page->setTitle($title);
                $page->setDescription($description);
                $page->setIsPublished($isPublished);
                $page->Save();
                $view->assign("success", "Votre page a bien été créé.");
            } else {
                // On envoie la liste d'erreur ainsi que les données qui ont été envoyé
                $_SESSION["backup"]["title"] = $_POST['title'];
                $_SESSION["backup"]["description"] = $_POST['description'];
                if($isPublished=="1"){
                    $_SESSION["backup"]["is_published"]="checked";
                }
                $view->assign("listOfErrors", $listOfErrors);
            }
        }
    }

    public function viewAction($params){
        // Génération de la pagination
        $pageActuel = 1;
        $pagesShow = 20;
        if(isset($params[0])) {
            $pageActuel = intval($params[0]);
        }
        
        $page = new Pages();
        $countPost=$page->getCount();
        $nbPages = ceil($countPost/$pagesShow);
        if($pageActuel<1) {
            $pageActuel = 1;
        }
        if($pageActuel>$nbPages) {
            $pageActuel = $nbPages;
        }
       
        $pages = new Pages();
        $results = $pages->getAllBy([[]], $pagesShow, $pagesShow*($pageActuel-1));
        
        // Affichage de la vue
        $view = new View(BASE_BACK_OFFICE."pages/index", "smw-admin");
        $view->assign("pageActuel", $pageActuel);
        $view->assign("nbPages", $nbPages);
        $view->assign("results", $results);
        $view->assign("page_title", "Voir les pages");
        $view->assign("page_description", "Page listant les pages");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."pages/edit", "smw-admin");
        $view->assign("page_title", "Editer une page");
        $view->assign("page_description", "Page d'édition d'une page");
        
        if(isset($params[0])) {
            $page = new Pages();
            $pageExist = $page->populate(["id"=>$params[0]]);
            $view->assign("page", $page);
            $view->assign("pageExist", $pageExist);
            if ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title'])
                && isset($_POST['description']) ) {
                $title = trim($_POST['title']);
                $description = trim($_POST['description']);
                $isPublished = "0";
                $listOfErrors = [];
                             
                if(strlen($title)<1) {
                    array_push($listOfErrors, "Le titre saisie est trop court.");
                }
                if(strlen($title)>512) {
                    array_push($listOfErrors, "Le titre saisie est trop long.");
                }
                
                if(strlen($description)>255) {
                    array_push($listOfErrors, "La description saisie est trop longue.");
                }
                
                if(isset($_POST['is_published']) && $_POST['is_published'] == "1") {
                    $isPublished = "1";
                }
                
                if(count($listOfErrors)<=0) {
                    $page->setTitle($title);
                    $page->setDescription($description);
                    $page->setIsPublished($isPublished);
                    $page->Save();
                    $view->assign("success", "Votre page a bien été mise à jour.");
                } else {
                    $view->assign("listOfErrors", $listOfErrors);
                }
            }
        }
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."pages/delete", "smw-admin");
        $page = new Pages();
        $pageExist = $page->populate(["id"=>$params[0]]);

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm']) && $_POST['confirm'] == "true") {

            if($pageExist !== false) {
                $view->assign("delete", $page->deleteById());
            }
        }

        $view->assign("pageExist", $pageExist);
        $view->assign("page_title", "Supprimer une page");
        $view->assign("page_description", "Page de suppression d'une page");
    }
    
    public function previewAction($params){
        $error = null;
        $view = new View(BASE_BACK_OFFICE."pages/preview", "frontend");
        
        if(isset($params[0])) {
            $pageExist = null;
            if(is_numeric($params[0])) {
                $page = new Pages();
                $pageExist = $page->populate(["id"=>$params[0]]);
            }
            // On vérifie que la page existe
            if($pageExist) {
                $view->assign("page_title", "Prévisualisation - ".$page->getTitle());
                $view->assign("page_description", "Prévisualisation de la page ".$page->getTitle());
                $view->assign("pageExist", $pageExist);
                $view->assign("page", $page);
                
                // On vérifie qu'un article est rattaché a cette page
                $post = new Posts();
                $postExist = $post->populate(["pages_id"=>$page->getId()]);
                if($postExist) {
                    $view->assign("postExist", $postExist);
                    $view->assign("post", $post);
                }
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
        if($error) {
            $view->assign("page_title", "Prévisualisation");
            $view->assign("page_description", "Prévisualisation de la page ");
        }
    }
}