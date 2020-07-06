<?php

    // Entité Type : Type de chaussure
    class Type extends CoreModel
    {
        // Table BDD
        protected static  $table = "type";

        // Propriété spécifique à Brand
        private $order;

        // Getters
        public function getOrder()       { return $this->order; }

        // Setter
        public function setName( string $_name )  { $this->name  = $_name; }
    }
