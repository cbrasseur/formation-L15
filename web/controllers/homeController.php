<?php

class homeController extends Controller{

    private $style = "home";

    function init(){
        session_destroy();
        $this->style = "home";
        parent::render("homeView", "home");
    }

}

?>