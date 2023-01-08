<?php
require_once('../DB/dbConn.php');
require_once '../DB/Database.class.php';
require_once('../class/User.class.php');

if(isset($_POST['userName'])){
    $user = new User;
    $user = $user->getByName($_POST['userName']);
    if($user == false){
        print "<script>
            alert('No user found please try again!');        
        </script>";
    }else{
        $userId = $user->id;
        header("Location:tamagochi_list.php?userId=$userId");
    }
}


include_once('components/doctype.php');
?>

<body class="select">
    <div class="form_select">
        <h1 class="selecth1">Welcome to the <br />best tamagotchi app</h1>
        <h6>Created by <strong>Chris</strong>, <strong>Randa</strong> and <strong>Cloé</strong></h6>
        <form action="" method="POST">
            <!--input type="text" name="pseudo" placeholder="Type here your own nickname"/-->
            <input type="text" name="userName" placeholder="Type here your username to see your tamagotchis" />

            <button type="submit" >Log in</button>
            <p>Not a member yet ? <a href="create_account.php">Please, create a new account</a></p>

        </form>
    </div>
</body>

</html>