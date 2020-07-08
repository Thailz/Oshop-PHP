<?php

    // Entité Type : Type de chaussure
    class Type extends CoreModel
    {
        // Table BDD
        protected static $table = "type";

        // Propriété spécifique à Brand
        protected $order;

        // Récupération des 5 marques a afficher dans le footer
        public static function getFooterTypes()
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
        public static function getTypesAll()
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

        // Getters
        public function getOrder()       { return $this->order; }

        // Setter
        public function setName( string $_name )  { $this->name  = $_name; }
    }
