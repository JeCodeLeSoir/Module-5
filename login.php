<head>
    <style>
        *{
            font-size: 25px;
            font-family: "Times New Roman", Times, sans-serif;
        }
    </style>
</head> 

<body>

<?php

session_start();

if (!isset($_SESSION['login'])) {

    if(!isset($_session['number'])){
        $_session['number'] = rand(0,5);
    }

    if(isset($_POST['nombre'])){

        $nombre = $_POST['nombre'];

        if($nombre > 5){
            echo "Error : trop haut <br>";
        }
        else if($nombre < 0){
            echo "Error : trop bas <br>";
        }

        if ($_session['number'] == $nombre) {
            echo "Bravo ! Tu et connecté ! <br>";
            $_SESSION['login'] = 1;
            header('Location: index.php');
        }
        else {
            echo "error invalide ! <br>";
            $_SESSION['login'] = null;
        }
    }

    ?>

    <form action="login.php" method="post">
            <input type="number" name="nombre" placeholder="nombre entre 1 et 5" required>
            <input type="submit" value ="Login">
    </form>

    <?php
    die();
}


?>
