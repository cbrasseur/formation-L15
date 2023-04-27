<?php

class contactController extends Controller{

    private $style = "contact";

    function init(){
        session_destroy();
        $this->style = "home";
        parent::render("contactView", "home");
    }

}

?>
