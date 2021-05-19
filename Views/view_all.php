
<?php include "view_start.php" ?>
    <h3 class="card-title">Liste des personnages</h3>
    <ul class="list-group" style="margin-top: 2em; margin-bottom: 1em;">
        <li class="list-group-item active">Nom & prenom, age</li>
        <?php foreach($personnages as $p):      ?>
            <li class="list-group-item">
                <?= e($p["nom"]) ?> <?= e($p["prenom"]) ?> 
                <?php if($p["age"]===null){?>
                    , âge non défini
                <?php }else{ ?>
                    , <?= e($p["age"]) ?> ans
                <?php } ?>
            </li>
        <?php endforeach ?>
    </ul>
<?php include "view_end.php" ?>

      