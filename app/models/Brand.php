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
        
        // Récupération des 5 marques a afficher dans le footer
        public static function getFooterBrands()
        {
            // Etape 1 : On va faire une requete SQL
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `". static::$table ."` 
                    WHERE `order` > 0
                    ORDER BY `order` ASC 
                    LIMIT 5";
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
        public static function getBrandsAll()
        {
            // Etape 1 : On va faire une requete SQL
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `". static::$table ."` 
                    WHERE `order` > 0
                    ORDER BY `order` ASC ";
                    
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

        // Getters, on ne met que ceux des attributs spécifiques
        public function getOrder() { return $this->order; }

        // Setter, on ne met que ceux qui sont susceptibles d'être modifiés
        // on met généralement les setters uniquement dans les classes enfant
        public function setName( string $_name ) { $this->name  = $_name; }
    }
