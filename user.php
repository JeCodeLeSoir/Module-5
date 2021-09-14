<?php
function GetUser($user){
    if (file_exists(__DIR__ . "/user/" . $user . ".bin")) {
        $path = __DIR__ . "/user/" . $user . ".bin";
    
        $lines = file($path);

        $status = 0;

        $pass = "";
        $data = "";

        for ($i = 0; $i < count($lines); $i++) {
            $line = str_replace("\r\n", "", $lines[$i]);
            switch ($line) {
            case "== Pass ==":
                $status = 1;
            break;
            case "== data ==":
                $status = 2;
            break;
            default:
                switch ($status) {
                    case 1:
                        $pass .= $line;
                    break;
                    case 2:
                        $data .= $line;
                    break;
                }
            break;
        }
        }

        $pass = str_replace("\r\n", "", $pass);
    
        $data = explode(',', $data);

        $data_parse = [];
        for ($i = 0; $i < count($data)-1; $i++) {
            $key_value = explode('=', $data[$i]);
            $data_parse[$key_value[0]]= $key_value[1];
        }

        return ["Pass" => $pass, "Data" => $data_parse];
    }

    return null;
}

function CreateUser($user, $pass){
    if (!file_exists(__DIR__ . "/user/" . $user . ".bin")) {
        $data ="== Pass ==". PHP_EOL;
        $data .= $pass. PHP_EOL;
        $data .= "== data ==". PHP_EOL;
        file_put_contents(__DIR__ . "/user/" . $user . ".bin", $data);
    }
    else{

    }
}

session_start();

if(!isset($_SESSION["user"])){
        if(!isset($_GET['CreateAccount'])){
            if(
                isset($_POST['user']) &&
                isset($_POST['pass'])
            ){
                $user =  GetUser($_POST['user']);
                
                if ($user) {
                    
                    if ($user["Pass"] == $_POST['pass']) {
                        if (isset($user['Data']["admin"])) {
                            $_SESSION["admin"] = $user['Data']["admin"] == "true" ? true : false;
                        }

                        $_SESSION["user"] = $_POST['user'];
                        header('Location: ./index.php');
                    }
                }
            }
        }
        else{
            if(
                isset($_POST['user']) &&
                isset($_POST['pass']) &&
                isset($_POST['repass'])
            ){
                if ($_POST['pass'] == $_POST['repass']) {
                    CreateUser($_POST['user'], $_POST['pass']);
                }
            }
        }
    ?>

    <div class="auth">
        <form method="POST">
           
            <?php if(isset($_GET['CreateAccount'])) : ?>
                <h3>Sing Up</h3>
             <?php else: ?>
                <h3>Login</h3>
            <?php endif; ?>

            <input type="text" name="user" placeholder="votre username">
            <input type="password" name="pass" placeholder="votre password">

            <?php if(isset($_GET['CreateAccount'])) : ?>
                <input type="password" name="repass" placeholder="reuh votre password">
            <?php endif; ?>
            
            <input type="submit" value="<?= isset($_GET['CreateAccount']) ? 'Créer' :'Login' ?>"> 

            <?php if(isset($_GET['CreateAccount'])) : ?>
                <a href="./">Retour</a>
             <?php else: ?>
                <a href="?CreateAccount">Créer un compt</a>
            <?php endif; ?>

        </form>
    <div>

    <?php

    die();
}
else{
    if(isset($_GET['action'])){
        if($_GET['action'] == "deconnexion"){
            $_SESSION["user"] = null;
            $_SESSION["admin"] = null;

            header('Location: ./index.php');
        }
    }
}
?>