<?php
class ArticlesController{
	public function addAction($params){
	    /* Basic add to database */
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $post = new Posts();
            $post->setTitle($title);
            $post->setContent($content);
            $post->setName("");
            $post->setDescription("");
            $post->Save();
            header('Location: view');
        }
        $view = new View(BASE_BACK_OFFICE."article/add", "smw-admin");
        $view->assign("page_title", "Ajouter un nouvel article");
        $view->assign("page_description", "Page d'ajout de nouveaux articles");
	}

    public function viewAction($params){
		$posts = new Posts();
		$results = $posts->getAllBy([[]], 20, 0);
        $view = new View(BASE_BACK_OFFICE."article/index", "smw-admin");
        $view->assign("results", $results);
        $view->assign("page_title", "Voir les articles");
        $view->assign("page_description", "Page listant les articles");
    }

    public function editAction($params){
        $posts = new Posts();
        $post = $posts->populate(["id"=>$params[0]]);

        $view = new View(BASE_BACK_OFFICE."article/edit", "smw-admin");
        $view->assign("post", $post);
        $view->assign("posts", $posts);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $post = $posts->populate(["id"=>$params[0]]);
            $post->setTitle($title);
            $post->setContent($content);
            $post->setName("");
            $post->setDescription("");
            $post->Save();
            header('Location: view');
        }

        $view->assign("page_title", "Edition d'un article");
        $view->assign("page_description", "Page d'édition d'un article");
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