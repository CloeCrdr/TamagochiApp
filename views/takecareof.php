<?php
$title_page = "Taking care of your tamagotchi" ;
require_once('../DB/dbConn.php');
require_once '../DB/Database.class.php';
require_once('../class/Action.class.php');
require_once('../class/Tamagotchi.class.php');

if (!isset($_GET['userId']) || !isset($_GET['tamagochiId'])) {
    header('Location: select_account.php');
} 

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

$critical = 'critical';
$medium = 'medium';
$correct = 'correct';
$perfect = 'perfect';
include_once('components/doctype.php');
?>

<body class="actions">
    <h1 class="allh1 careh1">Taking care of</h1>
    <h3><?= $tamago->name ?></h3>
    <a href="tamagochi_list.php?userId=<?= $userId ?>" class="createnew">My Tamagotchis</a>
    <a href="graveyard.php?userId=<?= $userId ?>" class="cimeterygo">✝ Graveyard</a>

    <div class="takecare">
        <article>
            <div>
                <span>Level <em><?= $tamago->level ?></em></span>
                <span>Creation date<em><?= $tamago->created_at ?></em></span>
                <span>Age <em> <?= $age ?></em></span>
                <br />
                <span>Hunger <strong><?= $tamago->faim ?>%</strong></span>
                <div class="progressbar-wrapper">
                <?php 
                                if ($tamago->faim>= 0 && $tamago->faim< 15) { 
                                    $hungerClass = $critical;
                                }
                                elseif ($tamago->faim>= 15 && $tamago->faim< 45){
                                    $hungerClass = $medium;
                                }
                                elseif ($tamago->faim>= 45 && $tamago->faim< 70) {
                                    $hungerClass = $correct;
                                }
                                else if ($tamago->faim >= 70 ) {
                                    $hungerClass = $perfect;
                                }
                            ?>
                    <div class="<?= $hungerClass ?> progressbar" style="width: <?= $tamago->faim ?>%"></div>
                </div>
                <span>Thurst <strong><?= $tamago->soif ?>%</strong></span>
                <div class="progressbar-wrapper">
                    <?php 
                        if ($tamago->soif >= 0 && $tamago->soif < 15) { 
                            $thurstClass = $critical;
                        }
                        elseif ($tamago->soif >= 15 && $tamago->soif < 45){
                            $thurstClass = $medium;
                        }
                        elseif ($tamago->soif >= 45 && $tamago->soif < 70) {
                            $thurstClass = $correct;
                        }
                        else if ($tamago->soif >= 70 ) {
                            $thurstClass = $perfect;
                        }
                    ?>
                    <div class="<?= $thurstClass ?> progressbar" style="width: <?= $tamago->soif ?>%"></div>
                </div>
                <span>Fun <strong><?= $tamago->ennui ?> %</strong></span>
                <div class="progressbar-wrapper">
                <?php 
                        if ($tamago->ennui >= 0 && $tamago->ennui < 15) { 
                            $funClass = $critical;
                        }
                        elseif ($tamago->ennui >= 15 && $tamago->ennui < 45){
                            $funClass = $medium;
                        }
                        elseif ($tamago->ennui >= 45 && $tamago->ennui < 70) {
                            $funClass = $correct;
                        }
                        else if ($tamago->ennui >= 70 ) {
                            $funClass = $perfect;
                        }
                    ?>
                    <div class="<?= $funClass ?> progressbar" style="width: <?= $tamago->ennui ?>%"></div>
                </div>
                <span>Bed Time <strong><?= $tamago->sommeil ?> %</strong></span>
                <div class="progressbar-wrapper">
                    <?php 
                        if ($tamago->sommeil >= 0 && $tamago->sommeil < 15) { 
                            $bedtimeClass = $critical;
                        }
                        elseif ($tamago->sommeil >= 15 && $tamago->sommeil < 45){
                            $bedtimeClass = $medium;
                        }
                        elseif ($tamago->sommeil >= 45 && $tamago->sommeil < 70) {
                            $bedtimeClass = $correct;
                        }
                        else if ($tamago->sommeil >= 70 ) {
                            $bedtimeClass = $perfect;
                        }
                    ?>
                    <div class="<?= $bedtimeClass ?> progressbar" style="width: <?= $tamago->sommeil ?>%"></div>
                </div>

            </div>
            <div>
                <form action="" method="POST">
                    <?php foreach ($allActions as $action) { ?>
                        <button name="<?= strtoupper($action['action_name']) ?>" class="buttonActions type_<?= $action['action_name'] ?>"><?= $action['action_name'] ?></button>
                    <?php } ?>
                </form>
            </div>
        </article>
    </div>
</body>

</html>