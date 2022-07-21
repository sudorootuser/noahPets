<?php
class modelViews
{

    /*--------------- Get Model View ------------------*/
    protected static function get_model_view($views)
    {

        $whiteList = ["home", "Yo", "My-Pet", "condiction", "esterilized", "raze", "date", "weight", "food-style", "food-type", "physical-build", "physical-activity", "alimentary-intolerance", "medical-condition", "associated-symptoms", "veterinary-qualification", "additional-condition", "loading", "another-pet", "food", "diet", "checkout","to-pay"];

        if (in_array($views, $whiteList)) {
            if (is_file('./view/content/' . $views . "-view.php")) {

                $content = "./view/content/" . $views . "-view.php";
            } else {
                $content = "404";
            }
        } elseif ($views == "home" || $views == "index") {
            $content = "home";
        } else {
            $content = "404";
        }
        return $content;
    }
}
