
<?php
require_once '../DB/Database.class.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body class="select">
        <div class="form_select">
            <h1 class="selecth1">Welcome to the <br/>best tamagotchi app</h1>
            <h6>Created by <strong>Chris</strong>, <strong>Randa</strong> and <strong>Cloé</strong></h6>
            <form action="" method="POST">
                <!--input type="text" name="pseudo" placeholder="Type here your own nickname"/-->
                <input type="text" name="tamago" placeholder="Type here your future tamagotchi name" />

                <button type="button">Log in</button>

                <p>Not a member yet ? <a href="uc">Please, create a new account</a></p>
                
            </form>
        </div>
    </body>
</html>