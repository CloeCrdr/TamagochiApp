<?php
require_once('../DB/dbConn.php');
require_once '../DB/Database.class.php';
require_once('../class/Action.class.php');
require_once('../class/Tamagotchi.class.php');

$actions = new Action;
$allActions = $actions->getAll();
$tamago = new Tamagotchi;

if (isset($_POST['EAT'])) {
    $tamago->action('EAT', $_GET['tamagochiId']);
} elseif (isset($_POST['DRINK'])) {
    $tamago->action('DRINK', $_GET['tamagochiId']);
} elseif (isset($_POST['BEDTIME'])) {
    $tamago->action('BEDTIME', $_GET['tamagochiId']);
} elseif (isset($_POST['ENJOY'])) {
    $tamago->action('ENJOY', $_GET['tamagochiId']);
}

if (isset($_GET['tamagochiId']) && isset($_GET['userId'])) {
    $tamagoId = $_GET['tamagochiId'];
    $userId = $_GET['userId'];
    $tamago = Tamagotchi::getTamagoInfo($tamagoId, $userId);

    $birthdate = new \DateTime(substr($tamago->created_at, 0, strpos($tamago->created_at, ' ')));
    $today = new \DateTime(date('Y-m-d'));
    $age = date_diff($birthdate, $today)->format("%a days");
}

include_once('components/doctype.php');
?>

<body class="actions">
    <h1 class="allh1 careh1">Taking care of</h1>
    <h3><?= $tamago->name ?></h3>
    <a href="tamagochi_list.php?userId=<?= $userId ?>" class="createnew">My Tamagotchis</a>
    <a href="graveyard.php?userId= <?= $userId ?>" class="cimeterygo">✝ Graveyard</a>

    <div class="takecare">
        <article>
            <div>
                <span>Level <em><?= $tamago->level ?></em></span>
                <span>Creation date<em><?= $tamago->created_at ?></em></span>
                <span>Age <em> <?= $age ?></em></span>
                <br />
                <span>Hunger <strong><?= $tamago->faim ?>%</strong></span>
                <div class="progressbar-wrapper">
                    <div class="progressbar" style="width: <?= $tamago->faim ?>%"></div>
                </div>
                <span>Thurst <strong><?= $tamago->soif ?>%</strong></span>
                <div class="progressbar-wrapper">
                    <div class="progressbar" style="width: <?= $tamago->soif ?>%"></div>
                </div>
                <span>Fun <strong><?= $tamago->ennui ?> %</strong></span>
                <div class="progressbar-wrapper">
                    <div class="progressbar" style="width: <?= $tamago->ennui ?>%"></div>
                </div>
                <span>Bed Time <strong><?= $tamago->sommeil ?> %</strong></span>
                <div class="progressbar-wrapper">
                    <div class="progressbar" style="width: <?= $tamago->sommeil ?>%"></div>
                </div>
                <br />
                <a href="takecareof.php" class="takecareof">Take care of me</a>

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