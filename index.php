<?php
    require_once "Models/Model.php";
    require_once "Controllers/Controller.php";
    require_once "Utils/fonctions.php";

    $controllers=["home","list"]; //Liste des controleurs;
    $controller_default = "home"; // Nom du controleur par défaut

    //On teste si le paramètre controller existe et correspond à un contrôleur
    //de la liste $controllers

    if(isset($_GET["controller"]) and in_array($_GET["controller"],$controllers)){
        $nom_controller = $_GET['controller'];
    }else{
        $nom_controller = $controller_default;
    }

    $nom_classe = "Controller_".$nom_controller;
    $nom_fichier = "Controllers/".$nom_classe.'.php';

    if(file_exists($nom_fichier)){
        require_once $nom_fichier;
        new $nom_classe();
    }else{
        die("Erreur 404 : Not found!");
    }
?>