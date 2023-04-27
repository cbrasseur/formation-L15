<?php

require_once WEB_ROOT."models/Game.php";

class endgameController extends Controller{

    private $game;

    public function __construct(){
        $this->loadGame();
    }

    public function init(){
        parent::render("endGameView", "endgame");
    }

    private function loadGame(){
        if(isset($_SESSION['game'])){
            $this->game = $_SESSION['game'];
        }
        else{
            header("Location: /SerpentGame");
        }
    }

    public function getWinner(): Player{
        return $this->game->getWinner();
    }

}

?>
