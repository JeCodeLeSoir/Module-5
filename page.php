<div class="page">
    <?php

    function ExoScript($ExoScript){

        $lines = explode("\r\n", $ExoScript);

        $params = "";
        $result = "";
        $status = 0;

        for ($i=0; $i<count($lines); $i++) {
            $line = $lines[$i];
            
            switch ($line) {
                case " >== Param":
                    $status = 1;
                    
                break;
                case " >== Result":
                    $status = 2;
                break;
                default:
                    switch ($status) {
                        case 1:
                            $params .= $line;
                        
                        break;
                        case 2:
                            $result .= $line;
                        break;
                    }
                break;
            }
        }

        return [
            "Start" =>
            '<?php 
            function Run($value = '.$params.')
            {',

            "Input" => "//Your code//return your value",

            "End" =>
            '}
            return Run() == '.$result.';?>'];
    }

    function Enonce($exoName = null, $enonce = null, $edit = false)
    {
        ?>
        <div class="enonce">
            <?php if (!$edit) : ?>
                <h1><?= $exoName ?></h1>
                <pre><p><?= htmlspecialchars($enonce) ?></p></pre>
                    <?php else : ?>
                        <input name="title" type="text" value="<?= $exoName ?>" placeholder="Titre d'Exo">
                        <textarea name="enonce" placeholder="--> Enonce"><?= htmlspecialchars($enonce) ?></textarea>
                    <?php endif; ?>
        </div>
    <?php
    }

    function Code($code = null, $edit = false)
    {
        ?>
        <div class="code">
            <h1>Code</h1>
            <?php if (!$edit) : ?>
                <pre>
                    <code class="hljs language-php">
                        <?= htmlspecialchars($code) ?>
                    </code>
                </pre>
            <?php else : ?>
                <textarea name="code" placeholder="Code">   <?= $code ? htmlspecialchars($code) : htmlspecialchars("<?php\r\n\r\n?>")?></textarea>
            <?php endif; ?>
        </div>
    <?php
    }


    function ExoCodeScript($Start , $End, $Input)
    {
        ?>
        <div class="codeExo">
            <h1>Code</h1>

            <pre>
                <code class="hljs language-php">
                    <?= htmlspecialchars($Start) ?>
                </code>
            </pre>
                <textarea name="CodeExo">
                 <?= htmlspecialchars($Input) ?>
                </textarea>
           <pre>
                <code class="hljs language-php">
                    <?= htmlspecialchars( $End) ?>
                </code>
            </pre>

        </div>
    <?php
    }

    function ExoResultScript($Start , $End){
        ?>
        <div class="result">
            <?php if(isset($_POST["CodeExo"])) : ?>


                <?php echo eval("?>" .$Start.$_POST["CodeExo"].$End); ?>
            <?php endif; ?>
        </div>
       <?php
    }

    function Result($code = null, $edit = false)
    {
        ?>
        <div class="result">

            <h1>Result</h1>

            <?php if (!$edit) : ?>
                <?php echo eval("?>" . $code); ?>
            <?php else : ?>

                <h1>Poster L'exo pour avoir le resulta !</h1>

            <?php endif; ?>
        </div>
        <?php
        }


        function ReadExo($path, $id)
        {
            if (file_exists($path)) {

                $exoName = "\r\n";
                $enonce  = "\r\n";
                
                $code = "\r\n";
                $ExoScript = "\r\n";

                $lines = file($path);

                $status = 0;

                for ($i = 0; $i < count($lines); $i++) {

                    $line = str_replace("\r\n", "", $lines[$i]);

                    switch ($line) {
                        case "=== Titre ===":
                            $status = 1;
                            break;
                        case "=== Enonce ===":
                            $status = 2;
                            break;
                        case "=== Code ===":
                            $status = 3;
                            break;
                        case "=== Exo ===":
                            $status = 4;
                            break;

                        default:

                            switch ($status) {
                                case 1:
                                    $exoName .= $line . "\r\n";
                                    break;
                                case 2:
                                    $enonce .= $line . "\r\n";
                                    break;
                                case 3:
                                    $code .= $line . "\r\n";
                                    break;
                                case 4:
                                    $ExoScript .= $line . "\r\n";
                                    break;
                            }

                            break;
                    }
                }
                return ["ExoName" => $exoName, "Enonce" => $enonce, "Code" => $code , "ExoScript" => $ExoScript];
            }
            return null;
        }

        function Render()
        {
            if (isset($_SESSION["admin"])) {
                if (isset($_GET['action'])) {
                    $files = glob(__DIR__ . "/exo/*.bin");
                    $id = 0;
                    $dataread = null;

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $path = __DIR__ . "/exo/exo_" . $id . ".bin";
                        $dataread = ReadExo($path, $id);
                    } else {
                        $id = (count($files) + 1);
                    }

                    if (
                        isset($_POST["title"])
                        && isset($_POST["enonce"])
                        && isset($_POST["code"])
                    ) {
                        $data = PHP_EOL;
                        $data .= "=== Titre ===" . PHP_EOL;
                        $data .= $_POST["title"] . PHP_EOL;
                        $data .= "=== Enonce ===" . PHP_EOL;
                        $data .= $_POST["enonce"] . PHP_EOL;
                        $data .= "=== Code ===" . PHP_EOL;
                        $data .= $_POST["code"] . PHP_EOL;

                        file_put_contents(__DIR__ . "/exo/exo_" . $id . ".bin", $data);
                        header('Location: ./?url=Exercice_' . $id);
                    }

                    echo '<form method="POST">';
                    Enonce($dataread["ExoName"], $dataread["Enonce"], true);
                    Code($dataread["Code"], true);
                    Result($dataread["Code"], true);

                    echo '<input type="submit" value="Ajouter !">';
                    echo '</form>';

                    return;
                }
            }

            $id = "1";

            if (isset($_GET['url'])) {
                $id = str_replace("Exercice_", "",  $_GET['url']);
            }

            $path = __DIR__ . "/exo/exo_" . $id . ".bin";
            $data = ReadExo($path, $id);

            if ($data != null) {
                Enonce($data["ExoName"], $data["Enonce"]);

                if (isset($_SESSION["admin"])) {
                    Code($data["Code"]);
                    Result($data["Code"]);
                    echo '<br><a href="./?action=AddExo&id=' . $id . '">Edit Exo</a>';
                }
                else{
                    
                    $exoscip = ExoScript($data["ExoScript"]);

                    echo '<form method="POST">';
                    
                    ExoCodeScript($exoscip["Start"], $exoscip["End"], $exoscip["Input"]);
                    ExoResultScript($exoscip["Start"], $exoscip["End"]);

                    echo '<input type="submit" value="Validé">';
                    echo '</form>';
                }
                
                return;
            }

            die("<h3>404 not found</h3>");
        }

        Render();

        ?>
</div>