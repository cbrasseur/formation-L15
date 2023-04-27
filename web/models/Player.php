<?php

class Player{

    private $name;
    private $score;
    // private $nbWin;
    // private $nbloose;

    public function __construct(string $name){
        $this->name = $name;
        $this->score = 0;
    }

    // private function loadWinLoose(){
    //     $req = "SELECT COUNT(CASE WHEN `winner` LIKE :player THEN 1 END) as nbWin, COUNT(CASE WHEN `looser` LIKE :player THEN 1 END) as nbLoose FROM game_history";
    //     $val = Database::getInstance()->readData($req, ['player' => $this->getName()])[0];
    //     $this->nbloose = $val['nbLoose'];
    //     $this->nbWin = $val['nbWin'];
    // }

    public function getName(): string{
        return $this->name;
    }

    public function getScore(): int{
        return $this->score;
    }

    public function addScore(int $s){
        $this->score = $this->score + $s > 50 ? 25 : $this->score + $s;
    }

    public function isWinner(): bool{
        return $this->score == 50;
    }

    // public function getNbWin(): int{
    //     if(!isset($this->nbWin)){ $this->loadWinLoose(); }
    //     return $this->nbWin;
    // }

    // public function getNbLoose(): int{
    //     if(!isset($this->nbloose)){ $this->loadWinLoose(); }
    //     return $this->nbloose;
    // }

}

?>
