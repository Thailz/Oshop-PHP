<?php

    // Entité Brand : Marque
    class Brand extends CoreModel
    {
        // On "écrase" la valeur du parent pour spécifier 
        // la table utilisée en BDD par ce model
        // On oublie pas que la vsibilité (protected) et les spécificité (static)
        // doivent correspondre a celles de l'attribut du parent
        protected static $table = "brand";

        // Propriété spécifique à Brand
        protected $order;

        // Getters, on ne met que ceux des attributs spécifiques
        public function getOrder() { return $this->order; }

        // Setter, on ne met que ceux qui sont susceptibles d'être modifiés
        // on met généralement les setters uniquement dans les classes enfant
        public function setName( string $_name ) { $this->name  = $_name; }
    }
