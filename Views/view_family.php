
        <?php include "view_start.php"?>
            <h3 class="card-title">Membres de la famille <?= $famille ?></h3>
            <ul class="list-group" style="margin-top: 1.5em; margin-bottom: 1em;">
                <?php foreach($membres as $m):      ?>
                    <li class="list-group-item">
                        <?= e($m["prenom"]) ?>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php include "view_end.php"?>
