<?php

    // Entité Brand : Marque
    class Brand extends CoreModel
    {
        // On "écrase" la valeur du parent pour spécifier 
        // la table utilisée en BDD par ce model
        protected static $table = "brand";

        protected $order;

        // Getters
        public function getOrder() { return $this->order; }

        // Setter
        public function setName( string $_name ) { $this->name  = $_name; }
    }
