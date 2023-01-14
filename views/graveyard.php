<?php
    $title_page = "Graveyard" ;
    require_once('../DB/dbConn.php');
    require_once('../DB/Database.class.php');
    require_once('../class/Tamagotchi.class.php');

    if (!isset($_GET['userId'])) {
        header('Location: select_account.php');
    }
    else {
        $userId = $_GET['userId'];
        $tamagos = Tamagotchi::getAllDeadTamagos($userId);
    }

    include_once('components/doctype.php');
?>
    <body class="graveyard">
        <a href="tamagochi_list.php?userId=<?= $userId ?>" class="createnew">My Tamagotchis</a>
        <h1 class="graveh1">Graveyard</h1>
        <h6>REST IN PEACE</h6>
        <div class="listdeadtamago">
            <?php if ($tamagos == false) { ?>
                <article>
                    <h2>You don't have any dead tamagochi. <br/>Nice job, keep doing !</h2>
                </article>
            <?php } 
            else {
                foreach ($tamagos as $tamago) {
            ?>
                <article>
                    <h2><?= $tamago['name'] ?></h2>
                    <span>Level <em><?= $tamago['level'] ?></em></span>
                    <span>Creation date <em><?= $tamago['created_at'] ?></em></span>
                    <span>Death date <em><?= $tamago['last_update'] ?></em></span>
                </article>
            <?php }} ?>
        </div>
    </body>
</html>