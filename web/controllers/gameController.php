<?php

require_once WEB_ROOT."models/Game.php";

class gameController extends Controller{

    private $game;

    public function __construct(){
        $this->loadGame();
    }

    public function init(){
        parent::render("gameView", "game");
    }

    private function loadGame(){
        if(isset($_SESSION['game'])){
            $this->game = $_SESSION['game'];
        }
        else if(isset($_POST['p1']) && isset($_POST['p2'])){
            $this->game = new Game($_POST['p1'], $_POST['p2']);
        }
        else{
            header('Location: /SerpentGame');
            die();
        }
        $_SESSION['game'] = $this->game;
    }

    public function endGame(){
        // $this->game->save();
        header("Location: endgame");
    }

    public function getGame(): Game{
        return $this->game;
    }

    public function play(){
        if($this->game->getWinner() !== false){
            $this->endGame();
            return;
        }

        $this->game->play();

        if($this->game->getWinner() === false){
            $this->init();
            return;
        }

        $this->endGame();
    }



}

?>
