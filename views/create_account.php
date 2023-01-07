<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> bb0450f67f1f828a3ac9c9e2a63009b5a67f5b05
require_once('../DB/dbConn.php');
require_once('../DB/Database.class.php');
include_once('components/doctype.php');

if (isset($_POST['user'])) {
    $user = [];
    array_push($user, [$_POST['user']]);
    $insertUser = Database::bulkInsert('users', ['username'], $user);
    if ($insertUser == true) {
        header('Location: select_account.php');
    }
}
<<<<<<< HEAD
?>
=======

?>

>>>>>>> bb0450f67f1f828a3ac9c9e2a63009b5a67f5b05
    <body class="create">

        <div class="form_create">
            <h1 class="createh1">Welcome to the <br />best tamagotchi app</h1>
            <h6>Created by <strong>Chris</strong>, <strong>Randa</strong> and <strong>Cloé</strong></h6>
            <form action="" method="POST">
                <!--input type="text" name="pseudo" placeholder="Type here your own nickname"/-->
<<<<<<< HEAD
                <input type="text" name="nickname" placeholder="Type here your future nickname" />
=======
                <input type="text" name="user" placeholder="Type here User  name" />
>>>>>>> bb0450f67f1f828a3ac9c9e2a63009b5a67f5b05

                <button type="submit">Register now</button>

<<<<<<< HEAD
                <p>Already a member ? <a href="select_account.php">Log to your account</a></p>
                
=======
                <p>Already a member ? <a href="uc">Log to your account</a></p>
>>>>>>> bb0450f67f1f828a3ac9c9e2a63009b5a67f5b05
            </form>
        </div>
    </body>

</html>