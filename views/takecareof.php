<?php
require_once('../DB/dbConn.php');
require_once '../DB/Database.class.php';
require_once('../class/Action.class.php');
require_once('../class/Tamagotchi.class.php');

$actions = new Action;
$allActions = $actions->getAll();
$tamago = new Tamagotchi;

if(isset($_POST['EAT'])){
    $tamago->action('EAT',$_GET['tamagochiId']);
}elseif(isset($_POST['DRINK'])){
    $tamago->action('DRINK',$_GET['tamagochiId']);
}elseif(isset($_POST['BEDTIME'])){
    $tamago->action('BEDTIME',$_GET['tamagochiId']);
}elseif(isset($_POST['ENJOY'])){
    $tamago->action('ENJOY',$_GET['tamagochiId']);
}

include_once('components/doctype.php');
?>

<body class="actions">
    <h1 class="allh1 careh1">Taking care of</h1>
    <h3>Name of my tamagotchi</h3>
    <a href="tamagochi_list.php" class="createnew">My Tamagotchis</a>
    <a href="graveyard.php" class="cimeterygo">✝ Graveyard</a>

    <div class="takecare">
        <article>
            <div>

            </div>
            <div>
                <form action="" method="POST">
                    <?php foreach ($allActions as $action) { ?>
                        <button name="<?= strtoupper($action['action_name']) ?>"><?= $action['action_name'] ?></button>
                    <?php } ?>
                </form>
            </div>
        </article>
    </div>
</body>

</html>