<?php

    // Ici, la classe product sera le "Model" qui réprésente en PHP
    // nos entités définies dans le MCD et en base de donnée
    // Une instance de cette classe représente une entrée (un ligne)
    // dans cette table
    class Product
    {
        // Clé primaire
        private $id;

        // Champs
        private $name;
        private $description;
        private $price;
        private $picture;
        private $stock;
        private $created_at;
        private $updated_at;

        // Foreign keys
        private $brand_id;
        private $type_id;
        private $category_id;

        // Constructeur
        // Ce constructeur attends un seul paramètre, un tableau de valeur "nom_colonne" => "valeur_en_base"
        // On dit au passage que cette variable DOIT etre un tableau, grace au mot clé array
        public function __construct( array $_productFromDatabase )
        {
            // Le rôle du constructeur est UNIQUEMENT d'initialiser ses attributs :
            //  $this->name = ... etc

            // On va utiliser un foreach pour parcourir le tableau passé en paramètre
            // Attention, on peut le faire parce que nos attributs ont le même nom
            // que nos colonnes (de la table products) en BDD
            foreach( $_productFromDatabase as $attr_name => $attr_value ) :
                $this->$attr_name = $attr_value;
            endforeach;
            
            // On pourrait aussi faire la correspondance manuellement
            // On est obligé de faire ça si nos colonnes n'ont pas le même
            // nom que nos attributs/propriétés
            //  $this->name        = $_productFromDatabase['name'];
            //  $this->description = $_productFromDatabase['description'];
            //  $this->price       = $_productFromDatabase['price'];
        }

        // Cette méthode renvoi une instance de Product correspondant
        // au produit dont l'id en BDD est $_product_id
        public static function find( int $_product_id )
        {
            // On va faire une requete SQL pour récupérer les infos du produit ! 
            // Etape 0 : Récupérer la connexion active à la BDD
            $pdo = Database::getPDO();
            // Etape 1 : On écrit notre requête
            $sql = "SELECT * FROM `products` WHERE id = " . $_product_id;
            // Etape 2 : Faire la requete
            $statement = $pdo->query( $sql );
            // Etape 3 : Récupérer les résultats
            $productFromDatabase = $statement->fetch( PDO::FETCH_ASSOC );

            // Ici, on a donc un tableau associatif "colonne" => "valeur" de notre BDD
            //   dump( $productFromDatabase );

            // Dans le cas ou le produit n'est pas trouvé, $productFromDatabase vaut false
            // On peut donc vérifier ce cas et afficher une erreur
            if( $productFromDatabase === false ) :
                exit( "Produit non trouvé !" );
            endif;

            // Maintenant, on veut un objet, on doit donc, instancier cet objet depuis
            // la classe (ici, le Model, donc Product)
            return new Product( $productFromDatabase );
        }

        // Cette méthode renvoi TOUT les produits de la BDD
        // sous forme d'un tableau d'objets
        public static function findAll()
        {
            // On va faire une requete SQL pour récupérer les infos des produits ! 
            // Etape 0 : Récupérer la connexion active à la BDD
            $pdo = Database::getPDO();
            // Etape 1 : On écrit notre requête
            $sql = "SELECT * FROM `products`";
            // Etape 2 : Faire la requete
            $statement = $pdo->query( $sql );
            // Etape 3 : Récupérer les résultats
            $productsListFromDatabase = $statement->fetchAll( PDO::FETCH_ASSOC );

            // Dans le cas ou aucun produit n'est trouvé, $productsListFromDatabase vaut false
            // On peut donc vérifier ce cas et afficher une erreur
            if( $productsListFromDatabase === false ) :
                exit( "Aucun produit trouvé !" );
            endif;

            // Arrivé ici, on a donc un tableau associatif multi-dimensionnel, qui contient 
            // une clé par élément, et un tableau de chacune des colonnes
            // pour chaque élement (ici, un élement est un produit, donc une entrée de la table products)
            //   dump( $productsListFromDatabase );

            // On prépare un tableau vide, dans lequel on va mettre
            // chacun de nos objets de type produits afin de le return
            $productModelsArray = [];

            // On parcours le tableau $productsListFromDatabase qui contient
            // autant d'entrée que de produits en base (dans la table products)
            foreach( $productsListFromDatabase as $productDataFromDatabase ) :
                // Pour chacun de ces produits, la valeur du tableau est elle-même
                // un tableau de chaque colonne => valeur pour ce produit
                // Pour construire cet objet, on donne cette liste des colonne => valeur
                // au constructeur (qu'on appelle via le mot clé new)
                $product = new Product( $productDataFromDatabase );
                // Maintenant qu'on a notre objet de type produit, on peut le stocker
                // dans le tableau créé précédemment
                $productModelsArray[] = $product;
            endforeach;

            // On renvoi notre tableau rempli
            return $productModelsArray;
        }

        // Getters
        public function getId()          { return $this->id; }
        public function getName()        { return $this->name; }
        public function getDescription() { return $this->description; }
        public function getPrice()       { return $this->price; }
        public function getPicture()     { return $this->picture; }
        // Et ainsi de suite ...

        // Setter
        public function setName( string $_name )  { $this->name  = $_name; }
        public function setPrice( float $_price ) { $this->price = $_price; }
        // Et ainsi de suite ...
    }