<?php

abstract class Controller{

    private $layout = 'default';

    protected function render($view, $style = false){
        ob_start();
        require_once(WEB_ROOT."views/$view.php");
        $content_base = ob_get_clean();
        if(!$this->layout){
            echo $content_base;
        }
        else{
            require_once(WEB_ROOT."views/$this->layout.php");
        }
    } 

}


?>