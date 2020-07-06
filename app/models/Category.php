<?php

    // Entité Category : Catégorie
    class Category
    {
        // Table BDD
        protected static $table = "category";

        // Propriétés spécifiques aux catégories
        private $subtitle;
        private $picture;
        private $order;

        // Getters
        public function getSubtitle()  { return $this->subtitle; }
        public function getPicture()   { return $this->picture; }
        public function getOrder()     { return $this->order; }

        // Setter
        public function setName( string $_name )  { $this->name  = $_name; }
    }
