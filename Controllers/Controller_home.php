<?php

    class Controller_home extends Controller{

        public function action_default(){
            $this->action_home_page();
        }

        public function action_home_page(){
            $model = Model::getModel();
            $data = ["noms" => $model->get_distinct_names()];
            $this->render("home_page",$data);
        }

    }


?>