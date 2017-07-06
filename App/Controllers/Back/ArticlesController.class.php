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
        }
        require VIEWS_PATH.BASE_BACK_OFFICE."article/add.view.php";
	}

    public function viewAction($params){
		$posts = new Posts();
		$results = $posts->getAllBy([[]], 20, 0);
        require VIEWS_PATH.BASE_BACK_OFFICE."article/index.view.php";
    }

    public function editAction($params){
        require VIEWS_PATH.BASE_BACK_OFFICE."article/edit.view.php";
    }

    public function deleteAction($params){
        // Get and verify if the article exist
        $post = new Posts();
        $postExist = $post->populate(["id"=>$params[0]]);

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm']) && $_POST['confirm'] == "true") {

            if($postExist !== false) {
                $delete = $post->deleteById();
            }
        }
        require VIEWS_PATH.BASE_BACK_OFFICE."article/delete.view.php";
    }
}