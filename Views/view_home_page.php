
    <?php include "view_start.php" ?>
        <h3 class="card-title">Liste des noms de familles</h3>
        <ul style="margin-top: 1.5em;">
        <?php foreach($noms as $n) : ?>
            <li>
                <a href="?controller=list&action=family&f=<?= e($n["nom"]) ?>"><?= e($n["nom"]) ?></a>
            </li>
        <?php endforeach ?>
        </ul>
        <h3 class="card-title" style="margin-top: 1em;">Liste tous les personnages</h3>
        <ul style="margin-top: 1.5em">
            <li><a href="?controller=list&action=all">ICI</a></li>
        </ul>
    <?php include "view_end.php" ?>

                        