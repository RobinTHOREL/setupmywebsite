<?php
class ArticlesController{
	public function addAction($params){
	    $view = new View(BASE_BACK_OFFICE."article/add", "smw-admin");
	    if ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content']) 
            && $_SESSION['login']) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $pagesId = "0";
            $usersId = "0";
            $showDate = "0";
            $listOfErrors = [];
            
            if(strlen($title)<1) {
                array_push($listOfErrors, "Le titre saisie est trop court.");
            }
            if(strlen($title)>255) {
                array_push($listOfErrors, "Le titre saisie est trop long.");
            }
            
            // Si plus de 10Mo
            if(strlen($content)>(10*1024*1024)) {
                array_push($listOfErrors, "Le contenu est trop lourd.");
            }
            
            // On vérifie l'ID de page reçu
            if(isset($_POST['pages_id'])) {
                $page = new Pages();
                $pageExist = $page->populate( [ "id"=>$_POST['pages_id'] ] );
                if($_POST['pages_id'] != 0 && !$pageExist) {
                    array_push($listOfErrors, "La page parente n'existe pas.");
                } else {
                    $pagesId = $_POST['pages_id'];
                }
            }
            
            // Récupère l'ID utilisateur depuis le login en session
            $user = new Users();
            $userExist = $user->populate( [ "login"=>$_SESSION['login'] ] );
            if(!$userExist) {
                array_push($listOfErrors, "Erreur sur votre session.");
            } else {
                $usersId = $user->getId();
            }
            
            if(isset($_POST['show_date']) && $_POST['show_date'] == "1") {
                $showDate = "1";
            }
            
            if(count($listOfErrors)<=0) {
                $post = new Posts();
                $post->setTitle($title);
                $post->setContent($content);
                $post->setUsersId($usersId);
                $post->setPagesId($pagesId);
                $post->setShowDate($showDate);
                $post->Save();

                $view->assign("success", "Votre article a bien été créé.");
            } else {
                // On envoie la liste d'erreur ainsi que les données qui ont été envoyé
                $_SESSION["backup"]["title"] = $_POST['title'];
                $_SESSION["backup"]["content"] = $_POST['content'];
                $view->assign("listOfErrors", $listOfErrors);
            }
        }
        $view->assign("page_title", "Ajouter un nouvel article");
        $view->assign("page_description", "Page d'ajout de nouveaux articles");
        // On liste les pages parentes possibles
        $page = new Pages();
        $pages = $page->getAllBy([[]], 100, 0);
        $view->assign("pages", $pages);
	}

    public function viewAction($params){
		// Génération de la pagination
		$pageActuel = 1;
		if(isset($params[0])) {
		    $pageActuel = intval($params[0]);
		}
		$pagesShow = 20;
		$post = new Posts();
		$countPost=$post->getCount();
		$nbPages = ceil($countPost/$pagesShow);
		if($pageActuel<1) {
		    $pageActuel = 1;
		}
		if($pageActuel>$nbPages) {
		    $pageActuel = $nbPages;
		}
		
		$posts = new Posts();
		$results = $posts->getAllBy([[]], $pagesShow, $pagesShow*($pageActuel-1));
		
		// Affichage de la vue
        $view = new View(BASE_BACK_OFFICE."article/index", "smw-admin");
        $view->assign("pageActuel", $pageActuel);
        $view->assign("nbPages", $nbPages);
        $view->assign("results", $results);
        $view->assign("page_title", "Voir les articles");
        $view->assign("page_description", "Page listant les articles");
    }

    public function editAction($params){
        $view = new View(BASE_BACK_OFFICE."article/edit", "smw-admin");
        $view->assign("page_title", "Edition d'un article");
        $view->assign("page_description", "Page d'édition d'un article");
        
        
        if(isset($params[0])) {
            $post = new Posts();
            $postExist = $post->populate(["id"=>$params[0]]);
            $view->assign("post", $post);
            $view->assign("postExist", $postExist);
            if ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content'])
                && $_SESSION['login'] && $postExist) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $pagesId = "0";
                $usersId = "0";
                $showDate = "0";
                $listOfErrors = [];
                
                if(strlen($title)<1) {
                    array_push($listOfErrors, "Le titre saisie est trop court.");
                }
                if(strlen($title)>255) {
                    array_push($listOfErrors, "Le titre saisie est trop long.");
                }
                
                // Si plus de 10Mo
                if(strlen($content)>(10*1024*1024)) {
                    array_push($listOfErrors, "Le contenu est trop lourd.");
                }
                
                // On vérifie l'ID de page reçu
                if(isset($_POST['pages_id'])) {
                    $page = new Pages();
                    $pageExist = $page->populate( [ "id"=>$_POST['pages_id'] ] );
                    if($_POST['pages_id'] != 0 && !$pageExist) {
                        array_push($listOfErrors, "La page parente n'existe pas.");
                    } else {
                        $pagesId = $_POST['pages_id'];
                    }
                }
                
                // Récupère l'ID utilisateur depuis le login en session
                $user = new Users();
                $userExist = $user->populate( [ "login"=>$_SESSION['login'] ] );
                if(!$userExist) {
                    array_push($listOfErrors, "Erreur sur votre session.");
                } else {
                    $usersId = $user->getId();
                }
                
                if(isset($_POST['show_date']) && $_POST['show_date'] == "on") {
                    $showDate = "1";
                }
                
                if(count($listOfErrors)<=0) {
                    $post->setTitle($title);
                    $post->setContent($content);
                    $post->setUsersId($usersId);
                    $post->setPagesId($pagesId);
                    $post->setShowDate($showDate);
                    $post->Save();
                    $view->assign("success", "Votre article a bien été créé.");
                } else {
                    $view->assign("listOfErrors", $listOfErrors);
                }
            }
            // On liste les pages parentes possibles
            $page = new Pages();
            $pages = $page->getAllBy([[]], 100, 0);
            $view->assign("pages", $pages);
        } else {
            $view->assign("postExist", false);
        }
    }

    public function deleteAction($params){
        $view = new View(BASE_BACK_OFFICE."article/delete", "smw-admin");

        // Get and verify if the article exist
        $post = new Posts();
        $postExist = $post->populate(["id"=>$params[0]]);

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm']) && $_POST['confirm'] == "true") {

            if($postExist !== false) {
                $view->assign("delete", $post->deleteById());
            }
        }

        $view->assign("postExist", $postExist);
        $view->assign("page_title", "Suppression d'un article");
        $view->assign("page_description", "Page de suppression d'un article");
    }
}