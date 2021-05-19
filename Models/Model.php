<?php

    class Model{
        private $bd;
        //Attribut qui contiendra l'unique instance du modèle
        private static $instance = null;

        //Constructeur créant l'objet PDO et l'affectant à $bd
        private function __construct(){
            try{
                //
                $this->bd = new PDO("mysql:host=localhost;dbname=tp1_php","root","");
                $this->bd->query("SET NAMES 'utf8'");
                $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getAll(){
            /* statement = requete
               1- Préparer la requete via méthode prepare(requete sql);
               2- la methode prepare return un objet de la classe PDOStatement = correspondant à la requête optimisée;
               3- la requete est exécutée grace à execute();
               4- récupérer la réponse en utilisant 2 méthode : fetch() ou fetchAll();
            */
            $requete = $this->bd->prepare("SELECT * FROM Personnages");
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
            /*
            
               Le type retourné (la réponse) dépend de la valeur passée en paramètre de la méthode fetch ou fetchAll:
                  1-fetchAll(PDO::FETCH_NUM) = Tableaux des tableaux indices
                  2-fetchAll(PDO::FETCH_ASSOC) = Tableaux des tableaux associatif
                  3-fetchAll(PDO::FETCH_OBJ) = Tableaux des objets

                fetch :
                    Lors du deuxième appel, fetch retourne les informations correspondant à la deuxième ligne 
                    de la table car à chaque appel, fetch passe automatiquement à la ligne suivante. 
            */
        }

        public function add($nom,$prenom,$age){
            try{
                $requete = $this->bd->prepare("INSERT INTO personnages (nom,prenom,age) VALUES (:nom,:prenom,:age)");
                //Cette méthode prend en paramètre un nom de marqueur et sa valeur .
                $requete->bindValue(":nom",$nom);
                $requete->bindValue(":prenom",$prenom);
                $requete->bindValue(":age",$age);
                return $requete->execute();

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        //Méthode permettant de récupérer l'instance de la classe Model
       // Méthode qui assure qu’un seul objet de la classe peut être instancié.

        public static function getModel(){
            //Si la classe n'a pas encore été instanciée
            if(is_null(self::$instance)){
                self::$instance = new Model(); // on l'instanciée
            }
            return self::$instance;
        }
       
        public function getFamily($nom){

            $requete = $this->bd->prepare("select * from personnages where nom = :nom");
            $requete->bindValue(":nom",$nom);
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function get_distinct_names(){
            $requete = $this->bd->prepare("select distinct nom from personnages");
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        }

        // pour exercice 4
        public function getBd(){
            return $this->bd;
        }

    }


?>