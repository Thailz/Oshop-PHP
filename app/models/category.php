<?php

    // Entité Category : Catégorie
    class Category
    {
        // Clé primaire
        private $id;

        // Champs
        private $name;
        private $subtitle;
        private $picture;
        private $order;
        private $created_at;
        private $updated_at;

        // Constructeur
        public function __construct( array $_categoryFromDatabase )
        {
            // Le rôle du constructeur est UNIQUEMENT d'initialiser ses attributs
            foreach( $_categoryFromDatabase as $attr_name => $attr_value ) :
                $this->$attr_name = $attr_value;
            endforeach;
        }

        // Cette méthode renvoi une instance de Category
        public static function find( int $_category_id )
        {
            // On va faire une requete SQL
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `category` WHERE id = " . $_category_id;
            $statement = $pdo->query( $sql );
            $categoryFromDatabase = $statement->fetch( PDO::FETCH_ASSOC );

            if( $categoryFromDatabase === false ) :
                exit( "Catégorie non trouvée !" );
            endif;

            // On retourne un objet de type Category
            return new Category( $categoryFromDatabase );
        }

        // Cette méthode renvoi TOUTES les catégories de la BDD
        // sous forme d'un tableau d'objets
        public static function findAll()
        {
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `category`";
            $statement = $pdo->query( $sql );
            $categoriesListFromDatabase = $statement->fetchAll( PDO::FETCH_ASSOC );

            if( $categoriesListFromDatabase === false ) :
                exit( "Aucune catégorie trouvée !" );
            endif;
            
            $categoryModelsArray = [];

            foreach( $categoriesListFromDatabase as $categoryDataFromDatabase ) :
                $category = new Category( $categoryDataFromDatabase );
                $categoryModelsArray[] = $category;
            endforeach;

            return $categoryModelsArray;
        }

        // Getters
        public function getSubtitle()    { return $this->subtitle; }
        public function getPicture()     { return $this->picture; }
        // Et ainsi de suite ...

        // Setter
        public function setName( string $_name )  { $this->name  = $_name; }
        // Et ainsi de suite ...
    }
