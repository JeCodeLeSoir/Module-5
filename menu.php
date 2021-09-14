<div class="menu">
    <div class="user">
        <?php if(isset( $_SESSION["user"])) : ?>
        <h3><?= $_SESSION["user"] ?></h3>

        <a href="./?action=deconnexion">Deconnexion</a>
        
        <?php if(isset($_SESSION["admin"])) : ?>
            <a href="./?action=AddExo">Add Exo</a>
        <?php endif; ?>
    </div>
    <ul>
        <?php
            $files = glob(__DIR__ . "/exo/*.bin");

            for($i=1; $i<(count($files)+1); $i++){
                
               ?>
               
               <li><a href="./?url=Exercice_<?= $i ?>">Exercice <?= $i ?></a></li>

               <?php
            }
        ?>
    </ul>
    <?php endif; ?>
</div>