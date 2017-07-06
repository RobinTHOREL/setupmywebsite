<?php
/**
 * Created by PhpStorm.
 * User: younesdiouri
 * Date: 06/07/2017
 * Time: 10:27
 */

class IndexController{
    public function indexAction($params){
        require VIEWS_PATH."index.view.php";
    }
}