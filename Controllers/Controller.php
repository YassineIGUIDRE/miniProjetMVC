<?php

    abstract class Controller{
        abstract public function action_default();

        public function __construct()
        {
            if(isset($_GET["action"]) and method_exists($this,"action_".$_GET["action"])){
                $action = "action_".$_GET["action"];
                $this->$action();
            }else{
                $this->action_default();
            }
        }

        protected function render($vue,$data=[]){
            //On extrait les données à afficher

            /*La méthode utilise la fonction extract($tab) qui crée pour chaque case du tableau une variable
            dont le nom est la clé de la case et la valeur est la valeur associée à cette clé dans le tableau. Ainsi,
            extract(['yes' => 'oui', 'nb' => 12]) crée les variables suivantes
            $yes = 'oui';
            $nb = 12;*/


            extract($data);
            //On teste si la vue existe
            $file_name = "Views/view_" . $vue . '.php';
            if (file_exists($file_name)) {
                //Si oui, on l'affiche
                include $file_name;
            } else {
                //Sinon, on affiche la page d'erreur
                $this->action_error("La vue n'existe pas !");
            }
            // On termine le script
            die();
        }

        protected function action_error($message){
            $data = ["erreur" => $message];
            $this->render("error",$data);
        }
    }
  
?>