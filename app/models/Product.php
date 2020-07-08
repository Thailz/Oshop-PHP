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
        protected $brand_id ;
        protected $type_id;
        protected $category_id;

        
        public static function getProductsAll()
        {       
    
            
            // Etape 1 : On va faire une requete SQL
            $pdo = Database::getPDO();
            $sql = 
            
           "SELECT * FROM `products` WHERE `brand_id` = '1' LIMIT 5 "  ;


            $statement = $pdo->query( $sql );
            $modelListFromDatabase = $statement->fetchAll( PDO::FETCH_ASSOC );

            // Etape 2 : On vérifie qu'on a des résultats
            if( $modelListFromDatabase === false ) :
                exit( static::$table." not found !" );
            endif;
            
            // Etape 3 : On prépare un tableau d'objets
            $modelsArray = [];

            // Etape 4 : On parcours nos résultats pour créer les objets
            // à partir des données récupérées en BDD
            foreach( $modelListFromDatabase as $modelDataFromDatabase ) :
                $model = new static( $modelDataFromDatabase );
                $modelsArray[] = $model;
            endforeach;

            // Etape 5 : On renvoi notre tableau d'objets (ici de type Brand)
            return $modelsArray;
        }

        public static function getProductsAll1()
        {       
    
            
            // Etape 1 : On va faire une requete SQL
            $pdo = Database::getPDO();
            $sql = 
            
           "SELECT * FROM `products` WHERE `brand_id` = '5' " ;


            $statement = $pdo->query( $sql );
            $modelListFromDatabase = $statement->fetchAll( PDO::FETCH_ASSOC );

            // Etape 2 : On vérifie qu'on a des résultats
            if( $modelListFromDatabase === false ) :
                exit( static::$table." not found !" );
            endif;
            
            // Etape 3 : On prépare un tableau d'objets
            $modelsArray = [];

            // Etape 4 : On parcours nos résultats pour créer les objets
            // à partir des données récupérées en BDD
            foreach( $modelListFromDatabase as $modelDataFromDatabase ) :
                $model = new static( $modelDataFromDatabase );
                $modelsArray[] = $model;
            endforeach;

            // Etape 5 : On renvoi notre tableau d'objets (ici de type Brand)
            return $modelsArray;
        }


        // Getters spécifiques
        public function getDescription() { return $this->description; }
        public function getPrice()       { return $this->price; }
        public function getPicture()     { return $this->picture; }

        // Setters
        public function setName( string $_name )  { $this->name  = $_name; }
        public function setPrice( float $_price ) { $this->price = $_price; }

        /**
         * Get the value of brand_id
         */ 
        
    }