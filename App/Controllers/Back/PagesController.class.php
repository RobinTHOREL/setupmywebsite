<?php
class PagesController{
    public function addAction($params){

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $page = new Pages();
            $page->setName($title);
            $page->setDescription($content);
            $page->Save();
            header('Location: view');
        }

        require VIEWS_PATH.BASE_BACK_OFFICE."pages/add.view.php";
    }

    public function viewAction($params){
        $pages = new Pages();
        $results = $pages->getAllBy([[]], 20, 0);
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/edit.view.php";
    }

    public function deleteAction($params){
        $page = new Pages();
        $pageExist = $page->populate(["id"=>$params[0]]);

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm']) && $_POST['confirm'] == "true") {

            if($pageExist !== false) {
                $delete = $page->deleteById();
            }
        }
        require VIEWS_PATH.BASE_BACK_OFFICE."pages/delete.view.php";
    }
}