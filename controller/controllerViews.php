<?php

require_once './model/modelViews.php';

class controllerViews extends modelViews
{

    /*--------------- Get controller template ------------------*/
    public function get_controller_template()
    {
        return require_once "./view/template.php";
    }

    /*--------------- Get controller views ------------------*/
    public function get_controller_views()
    {
        if (isset($_GET['views'])) {

            $route = explode("/", $_GET['views']);

            $answer = modelViews::get_model_view($route[0]);
        } else {
            $answer = "home";
        }
        return $answer;
    }
}
