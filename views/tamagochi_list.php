<?php
require_once('../DB/dbConn.php');
require_once('../DB/Database.class.php');
require_once('../class/Tamagotchi.class.php');
require_once('../class/User.class.php');

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
    $user = new User;
    $userInfo = $user->getById($userId);
    $tamago = new Tamagotchi('test', $userId);
    $tamagos = $tamago->getAllUserTamagos($userId);
    if ($tamagos != false) {
        foreach ($tamagos as $tamago) {
            $birthdate = new \DateTime(substr($tamago['created_at'], 0, strpos($tamago['created_at'], ' ')));
            $today = new \DateTime(date('Y-m-d'));
            $age = date_diff($birthdate, $today)->format("%a days");
        }
    }
}
include_once('components/doctype.php');
?>


<body class="list">
    <h1 class="allh1 lists">My tamagotchis</h1>
    <h6>@<?= $userInfo->username; ?></h6>
    <a href="tamagochi_new.php?userId=<?= $userId ?>" class="createnew">New Tamagotchi</a>
    <a href="graveyard.php" class="cimeterygo">✝ Graveyard</a>
    <div class="listoft">

        <main class="listtamago">
        <?php if ($tamagos == false) { ?>
                <article>
                    <button> Add Tamagochi </button>
                </article>
            
            <?php } else {
            foreach ($tamagos as $tamago) {
            ?>
                    <article>
                        <h2><?= $tamago['name'] ?></h2>
                        <span>Level <em><?= $tamago['level'] ?></em></span>
                        <span>Creation date<em><?= $tamago['created_at'] ?></em></span>
                        <span>Age <em> <?= $age ?></em></span>
                        <br />
                        <span>Hunger <strong><?= $tamago['faim'] ?>%</strong></span>
                        <div class="progressbar-wrapper">
                            <div class="progressbar" style="width: <?= $tamago['faim'] ?>%"></div>
                        </div>
                        <span>Thurst <strong><?= $tamago['soif'] ?>%</strong></span>
                        <div class="progressbar-wrapper">
                            <div class="progressbar" style="width: <?= $tamago['soif'] ?>%"></div>
                        </div>
                        <span>Fun <strong><?= $tamago['ennui'] ?> %</strong></span>
                        <div class="progressbar-wrapper">
                            <div class="progressbar" style="width: <?= $tamago['ennui'] ?>%"></div>
                        </div>
                        <br />
                        <a href="takecareof.php" class="takecareof">Take care of me</a>
                    </article>
               
            <?php }
        } ?>
         </main>
        <br />
    </div>

</body>

</html>

<!--
Il doit être possible d'a cher le cimetière des tamagotchis par cet a chage.
Il doit être possible de créer un nouveau tamagotchi par cet a chage. Il n'y a pas de
limite de tamagotchis par compte.
-->