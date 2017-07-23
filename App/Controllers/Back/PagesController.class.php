<?php
class PagesController{
    public function addAction($params){
        if ( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) ) {
            $title = $_POST['title'];

            $page = new Pages();
            $page->setTitle($title);
            $page->setDescription("1");
            $page->setIsPublished("0");
            $page->Save();
            
            //header('Location: view');
        }

        $view = new View(BASE_BACK_OFFICE."pages/add", "smw-admin");
        $view->assign("page_title", "Ajouter une nouvelle page");
        $view->assign("page_description", "Page d'ajout de nouvelle page");
    }

    public function viewAction($params){
        $pages = new Pages();
        $results = $pages->getAllBy([[]], 20, 0);

        $view = new View(BASE_BACK_OFFICE."pages/index", "smw-admin");
        $view->assign("results", $results);
        $view->assign("page_title", "Voir les pages");
        $view->assign("page_description", "Page listant les pages");
    }

    public function editAction($params){
        $page = new Pages();
        $pageExist = $page->populate(["id"=>$params[0]]);
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content'])) {
            if($pageExist) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $page->setName($title);
                $page->setDescription($content);
                $page->setFriendlyUrl("0");
                $page->setPostsId("0");
                $page->Save();
            }
        }
        
        $view = new View(BASE_BACK_OFFICE."pages/edit", "smw-admin");
        $view->assign("page", $page);
        $view->assign("pageExist", $pageExist);
        $view->assign("page_title", "Editer une page");
        $view->assign("page_description", "Page d'édition d'une page");
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
}