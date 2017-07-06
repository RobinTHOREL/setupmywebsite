²   <?php
class ThemesController{
    public function addAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."themes/add.view.php";
    }

    public function viewAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."themes/index.view.php";
    }

    public function selectAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."themes/index.view.php";
        //For more fluidity select action could be done with JS .
    }

    public function deleteAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."themes/delete.view.php";
    }

    public function downloadAction($params)
    {
        require VIEWS_PATH.BASE_BACK_OFFICE."themes/index.view.php";
        // Download redirect towards index. DL instructions Here.
    }
}