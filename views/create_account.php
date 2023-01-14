<?php
$title_page = "Create an account" ;
require_once('../DB/dbConn.php');
require_once('../DB/Database.class.php');
require_once('../class/User.class.php');
include_once('components/doctype.php');

if (isset($_POST['user'])) {
    $username = $_POST['user'];
    $user = new User;
    $insertUser = $user->insert($username);
    if ($insertUser == true) {
        header('Location: select_account.php');
    }
}

?>
    <body class="create">

        <div class="form_create">
            <h1 class="createh1">Welcome to the <br />best tamagotchi app</h1>
            <h6>Created by <strong>Chris</strong>, <strong>Randa</strong> and <strong>Cloé</strong></h6>
            <form action="" method="POST">
                <!--input type="text" name="pseudo" placeholder="Type here your own nickname"/-->
                <input type="text" name="user" placeholder="Create your Username here." />

                <button type="submit">Register now</button>

                <p>Already a member ? <a href="select_account.php">Log to your account</a></p>

            </form>
        </div>
    </body>
</html>