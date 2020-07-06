<?php

    // Entité Type : Marque
    class Type extends CoreModel
    {
        // On "écrase" la valeur du parent pour spécifier 
        // la table utilisée en BDD par ce model
        private $table = "type";

        private $order;

        // Getters
        public function getOrder()       { return $this->order; }

        // Setter
        public function setName( string $_name )  { $this->name  = $_name; }
    }
