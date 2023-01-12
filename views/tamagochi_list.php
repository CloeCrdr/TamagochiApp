<?php
    require_once('../DB/dbConn.php');
    require_once('../DB/Database.class.php');
    require_once('../class/Tamagotchi.class.php');
    require_once('../class/User.class.php');

    if (!isset($_GET['userId'])) {
        header('Location: select_account.php');
    } else{
        $userId = $_GET['userId'];
        $userInfo = User::getById($userId);
        $tamagos = Tamagotchi::getAllUserTamagos($userId);
        if ($tamagos != false) {
            foreach ($tamagos as $tamago) {
                $birthdate = new \DateTime(substr($tamago['created_at'], 0, strpos($tamago['created_at'], ' ')));
                $today = new \DateTime(date('Y-m-d'));
                $age = date_diff($birthdate, $today)->format("%a days");
            }
        }
    }

    $critical = 'critical';
    $medium = 'medium';
    $correct = 'correct';
    $perfect = 'perfect';
    include_once('components/doctype.php');
?>
    <body class="list">
        <h1 class="allh1 lists">My tamagotchis</h1>
        <h6>@<?= $userInfo->username; ?></h6>
        <a href="tamagochi_new.php?userId=<?= $userId ?>" class="createnew">New Tamagotchi</a>
        <a href="graveyard.php?userId=<?= $userId ?>" class="cimeterygo">✝ Graveyard</a>
        <div class="listoft">
            <main class="listtamago">
                <?php if ($tamagos == false) { ?>
                    <article>
                        <h1>You don't have any tamagochi! Please start by adding one.</h1>
                    </article>
                <?php } else {
                    foreach ($tamagos as $tamago) {
                ?>
                    <article>
                        <h2><?= $tamago['name'] ?></h2>
                        <span>Level <em><?= $tamago['level'] ?></em></span>
                        <span>Creation date <em><?= $tamago['created_at'] ?></em></span>
                        <span>Age <em> <?= $age ?></em></span>
                        <br />
                        <span>Hunger <strong><?= $tamago['faim'] ?>%</strong></span>
                        <div class="progressbar-wrapper">
                            <?php 
                                if ($tamago['faim'] >= 0 && $tamago['faim'] < 15) { 
                                    $hungerClass = $critical;
                                }
                                elseif ($tamago['faim'] >= 15 && $tamago['faim'] < 45){
                                    $hungerClass = $medium;
                                }
                                elseif ($tamago['faim'] >= 45 && $tamago['faim'] < 70) {
                                    $hungerClass = $correct;
                                }
                                else if ($tamago['faim'] <= 70 ) {
                                    $hungerClass = $perfect;
                                }
                            ?>
                            <div class="<?= $hungerClass ?> progressbar" style="width: <?= $tamago['faim'] ?>%"></div>

                            
                        </div>
                        <span>Thurst <strong><?= $tamago['soif'] ?>%</strong></span>
                        <div class="progressbar-wrapper">
                            <?php if ($tamago['soif'] >= 0 && $tamago['soif'] < 15) { $thurstClass= $critical;}
                                    else if ($tamago['soif'] >= 15 && $tamago['soif'] < 45) {$thurstClass = $medium;}
                                    else if ($tamago['soif'] >= 45 && $tamago['soif'] < 70) {$thurstClass = $correct;}
                                    else if ($tamago['soif'] >= 70 ) {$thurstClass = $perfect;}
                            ?>
                            <div class="<?= $thurstClass ?> progressbar" style="width: <?= $tamago['soif'] ?>%"></div>
                        </div>
                        <span>Fun <strong><?= $tamago['ennui'] ?> %</strong></span>
                        <div class="progressbar-wrapper">
                            <?php if ($tamago['ennui'] >= 0 && $tamago['ennui'] < 15) { $funClass= $critical;}
                                    else if ($tamago['ennui'] >= 15 && $tamago['ennui'] < 45) {$funClass = $medium;}
                                    else if ($tamago['ennui'] >= 45 && $tamago['ennui'] < 70) {$funClass = $correct ;}
                                    else if ($tamago['ennui'] >= 70 ) {$funClass = $perfect;}
                            ?>
                            <div class="<?= $funClass ?> progressbar" style="width: <?= $tamago['ennui'] ?>%"></div>
                        </div>
                        <span>Bedtime <strong><?= $tamago['sommeil'] ?> %</strong></span>
                        <div class="progressbar-wrapper">
                            <?php if ($tamago['sommeil'] >= 0 && $tamago['sommeil'] < 15) { $bedTimeClass = $critical;}
                                    else if ($tamago['sommeil'] >= 15 && $tamago['sommeil'] < 45) {$bedTimeClass = $medium;}
                                    else if ($tamago['sommeil'] >= 45 && $tamago['sommeil'] < 70) {$bedTimeClass = $correct;}
                                    else if ($tamago['sommeil'] >= 70 ) {$bedTimeClass = $perfect;}
                            ?>
                            <div class="<?= $bedTimeClass ?> progressbar" style="width: <?= $tamago['sommeil'] ?>%"></div>
                        </div>
                        <br />
                        <a href="takecareof.php?userId=<?= $_GET['userId'] ?>&tamagochiId=<?= $tamago['id'] ?>" class="takecareof">Take care of me</a>
                    </article>
                    <br />
                <?php }
                } ?>
            </main>
        </div>
    </body>
</html>