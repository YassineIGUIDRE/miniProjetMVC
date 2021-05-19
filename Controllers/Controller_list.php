<?php

    class Controller_list extends Controller{
        
        public function action_all(){
            $model=Model::getModel();
            $data=["personnages" => $model->getAll()];
            $this->render("all",$data);
        }

        public function action_family(){
            if(isset($_GET["f"])){
                $nom = $_GET["f"];
                $model = Model::getModel();
                $data = ["famille" => $_GET["f"],
                    "membres" => $model->getFamily($nom)
                ];
                $this->render("family",$data);
            }else{
                $this->action_error("Pas de nom de famille");
            }
        }

        public function action_default(){
            $this->action_family();
        }
    }


?>