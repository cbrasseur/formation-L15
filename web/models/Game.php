<?php

require_once WEB_ROOT."models/Player.php";

class Game{

    private $p1;
    private $p2;

    private $p1Round;

    public function __construct(string $p1, string $p2){
        $this->p1 = new Player($p1);
        $this->p2 =new Player($p2);
        $this->p1Round = true;
    }

    public function getP1(): Player{
        return $this->p1;
    }

    public function getP2(): Player{
        return $this->p2;
    }

    public function getCurrentPlayer(): Player{
        return $this->p1Round ? $this->p1 : $this->p2;
    }

    public function play(): void{
        $scoreToAdd = random_int(1, 6);
        $this->getCurrentPlayer()->addScore($scoreToAdd);
        $this->p1Round = !$this->p1Round;
    }

    public function getWinner(){
        if($this->p1->isWinner()){ return $this->p1; }
        if($this->p2->isWinner()){ return $this->p2; }
        return false;
    }

    public function getLooser(){
        $winner = $this->getWinner();
        if($winner === false){ return false; }
        return $winner->getName() == $this->p1->getName() ? $this->p2 : $this->p1;
    }

    // public function save(): void{
    //     $winner = $this->getWinner();
    //     if($this->getWinner() === false){ return; }
    //     $looser = $this->getLooser();
    //     $data = ['winner' => $winner->getName(), 'looser' => $looser->getName()];
    //     Database::getInstance()->insertData("INSERT INTO game_history (winner, looser) VALUES (:winner, :looser)", $data);
    // }

    public function gridToHtml(): string{
        $html = "<table>";
        $count = 1;
        $p1Score = $this->p1->getScore();
        $p2Score = $this->p2->getScore();
        for($i = 0; $i < 5; $i++){
            $html .= "<tr>";
            for($j = 0; $j < 10; $j++){
                if($p1Score == $count && $p2Score == $count){
                    $html .= "<td class='both'>".$count."</td>";
                }
                else if($p1Score == $count){
                    $html .= "<td class='p1'>".$count."</td>";
                }
                else if($p2Score == $count){
                    $html .= "<td class='p2'>".$count."</td>";
                }
                else if($count == 50){
                    $html .= "<td class='finish'>".$count."</td>";
                }
                else{
                    $html .= "<td>".$count."</td>";
                }

                $count += 1;
            }
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }



}

?>
