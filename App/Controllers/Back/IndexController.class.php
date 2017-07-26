<?php
class IndexController{
    public function indexAction($params){
        // TODO : Faire/améliorer BaseSQL pour utiliser count ou join
        // On calcule le nombre de post par utilisateurs pour chartJS
        $statsUserPost = array();
        $post = new Posts();
        $resultPosts = $post->getAllBy([[]], 10000);
        for($i = 0; $i < count($resultPosts); $i++) {
            $add = false;
            for($j = 0; $j < count($statsUserPost); $j++) {
                if(($statsUserPost[$j][0] == $resultPosts[$i]['users_id'])) {
                    $statsUserPost[$j][1] += 1;
                    $add = true;
                    break;
                }
            }
            if(!$add) {
                $row = array();
                array_push($row, $resultPosts[$i]['users_id']);
                array_push($row, 1);
                array_push($statsUserPost, $row);
            }
        }
        
        // On remplace les id par les noms d'utilisateur
        for($i = 0; $i < count($statsUserPost); $i++ ) {
            $userId = $statsUserPost[$i][0];
            $user = new Users();
            if($user->populate(["id"=>$userId])) {
                $statsUserPost[$i][0] = $user->getFirstName();
            }
        }
        
        $view = new View(BASE_BACK_OFFICE."index", "smw-admin");
        $view->assign("page_title", "Page d'accueil de Setup My Website");
        $view->assign("page_description", "Ceci est la page d'accueil du back office");
        $view->assign("statsUserPost", $statsUserPost);
    }
}