<div id="game-page">

    <div id="grid-wrapper">
        <?php echo $this->getGame()->gridToHtml(); ?>
    </div>

    <div id="scores-wrapper">
        <h2>Scores des joueurs</h2>
        <div id="players">
            <div id="p1-score" class="cell-score p1">
                <span class="p-name"><?php echo $this->getGame()->getP1()->getName() ?></span>
                <span class="p-score"><?php echo $this->getGame()->getP1()->getScore() ?> </span>
            </div>
            <div id="p2-score" class="cell-score p2">
                <span class="p-name"><?php echo $this->getGame()->getP2()->getName() ?></span>
                <span class="p-score"><?php echo $this->getGame()->getP2()->getScore() ?> </span>
            </div>
        </div>

    </div>

    <div id="play-control">
        <form id="play-form" action="" method="post">
            <h2><?php echo $this->getGame()->getCurrentPlayer()->getName()?> à toi de jouer !</h2>
            <input id="play" type="hidden" name="action" value="play">
            <input type="submit" value="Lancer le dé">
        </form>
        <form id="quit-form" action="/">
            <input type="submit" value="Quitter">
        </form>
    </div>


</div>
