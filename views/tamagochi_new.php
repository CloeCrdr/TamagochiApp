<?php
require_once('../DB/dbConn.php');
require_once '../DB/Database.class.php';
require_once('../class/Tamagotchi.class.php');

if(isset($_POST['tamago'])){
    $tamago = new Tamagotchi;
    $tama_name = $_POST['tamago'];
    $userId = $_GET['userId'];
    $insert = $tamago->insert($tama_name,$userId);
    if($insert = true){
        header('Location: tamagochi_list.php?userId='.$userId.'');
    }
}


include_once('components/doctype.php') ; 
?>
    <body class="list">
        <a href="tamagochi_list.php" class="createnew">My Tamagotchis</a>
        <a href="graveyard.php" class="cimeterygo">✝ Graveyard</a>

        <h1 class="allh1 lists">Create a new <br/>tamagotchi</h1>

        <div class="form_select">
            <form action="" method="POST">
                <!--input type="text" name="pseudo" placeholder="Type here your own nickname"/-->
                <input type="text" name="tamago" placeholder="Type here your future tamagotchi's name" />

                <button type="submit">Create my tamagotchi</button>

            </form>
        </div>
    </body>
</html>