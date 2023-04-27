<?php

use PHPUnit\Framework\TestCase;

final class PlayerTests extends TestCase
{
    public function testAddScoreUpdatePlayerScoreCorrectly()
    {
        $player = new Player("TestPlayer");
        $player->addScore(5);
        $this->assertEquals(
            $player->getScore(),
            5
        );

        $player->addScore(2);
        $this->assertEquals(
            $player->getScore(),
            7
        );

        $player->addScore(6);
        $this->assertEquals(
            $player->getScore(),
            13
        );
    }

    public function testIfScoreIsMoreThan50ShouldGoBackTo25()
    {
        $player = new Player("TestPlayer");
        $player->addScore(51);
        $this->assertEquals(
            $player->getScore(),
            25
        );
    }

    public function testPlayerPositionnedAt50IsConsideredAsAWinner()
    {
        $player = new Player("TestPlayer");
        $player->addScore(50);
        $this->assertTrue(
            $player->isWinner()
        );
    }

// Peut-on ajouter un joueur à la partie ?

// Peut-on ajouter deux joueurs à la partie ?

// Le programme renvoie bien une erreur en cas de tentative d'ajout d'un troisième joueur ?

// Lorsque le joueur lance le dé, sa position est bien modifiée du nombre donné par le dé ?

// Lorsque le joueur dépasse 50, est-il automatiquement replacé à la case 25 ?

// Le joueur 1 est-il le premier à jouer ?

// Le joueur 2 joue-t-il en deuxième ?

// Rebouclons-nous sur le joueur 1 après deux tours ?

// Test bonus + malus si implémenté

// Tests d'intégration (plus globaux sur le fonctionnement du jeu, par exemple le déroulement d'une partie complète jusqu'à ce qu'un joueur ait gagné)
}
