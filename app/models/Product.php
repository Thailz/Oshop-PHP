<?php

    // Entité Product : Produit
    class Product extends CoreModel
    {
        // Table BDD
        protected static $table = "products";

        // Propriétés spécifiques au produit
        protected $description;
        protected $price;
        protected $picture;
        protected $stock;

        // Foreign keys
        protected $brand_id;
        protected $type_id;
        protected $category_id;

        // Getters spécifiques
        public function getDescription() { return $this->description; }
        public function getPrice()       { return $this->price; }
        public function getPicture()     { return $this->picture; }

        // Setters
        public function setName( string $_name )  { $this->name  = $_name; }
        public function setPrice( float $_price ) { $this->price = $_price; }
    }