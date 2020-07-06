<?php

    // Ici, le CoreModel va contenir tout ce qui est commun a nos autres models
    // Contrairement aux autres, CoreModel ne représente pas d'entité en BDD
    // Elle sert simplement a mutualiser ce qui peut l'être afin 
    // d'éviter au maximum la répétition du code
    class CoreModel
    {
        // Le nom de la table en base
        // Comme CoreModel n'a pas de représentation en BDD
        // On laisse cette propriété vide ; elle sera en revanche 
        // spécifiée dans les classes enfants
        protected static $table;

        // La clé primaire
        // Cette dernière s'appelle id dans toutes nos tables
        protected $id;

        // Les champs présents dans toutes les tables
        protected $name;
        protected $created_at;
        protected $updated_at;

        // Le constructeur de nos models est identique à chaque fois
        // On le met donc dans le CoreModel pour factoriser !
        public function __construct( array $_columnsFromDatabase )
        {
            // Le rôle du constructeur est UNIQUEMENT d'initialiser ses attributs :
            //  $this->name = ... etc

            // On va utiliser un foreach pour parcourir le tableau passé en paramètre
            // Attention, on peut le faire parce que nos attributs ont le même nom
            // que nos colonnes (de la table products) en BDD
            foreach( $_columnsFromDatabase as $attr_name => $attr_value ) :
                static::$table = $attr_value;
            endforeach;
            
            // On pourrait aussi faire la correspondance manuellement
            // On est obligé de faire ça si nos colonnes n'ont pas le même
            // nom que nos attributs/propriétés
            //  $this->name        = $_columnsFromDatabase['name'];
            //  $this->description = $_columnsFromDatabase['description'];
            //  $this->price       = $_columnsFromDatabase['price'];
        }

        // Cette méthode renvoi une instance de Model
        public static function find( int $_id )
        {
            // On va faire une requete SQL pour récupérer les infos de l'élément ! 
            // Etape 0 : Récupérer la connexion active à la BDD
            $pdo = Database::getPDO();

            // Etape 1 : On écrit notre requête
            //  Ici static::$table sera remplacé par la valeur de la propriété
            //  $table de la classe qui appelle find (ex : Brand::$table si Brand::find() )
            $sql = "SELECT * FROM `". static::$table ."` WHERE id = " . $_id;

            // Etape 2 : Faire la requete
            $statement = $pdo->query( $sql );

            // Etape 3 : Récupérer les résultats
            $modelFromDatabase = $statement->fetch( PDO::FETCH_ASSOC );

            // Ici, on a donc un tableau associatif "colonne" => "valeur" de notre BDD
            //   dump( $productFromDatabase );

            // Dans le cas ou l'élément n'est pas trouvé, $modelFromDatabase vaut false
            // On peut donc vérifier ce cas et afficher une erreur
            if( $modelFromDatabase === false ) :
                exit( static::$table." not found !" );
            endif;

            // On retourne un objet de type correspondant là encore
            // au type de la classe précédent l'appel à find (a gauche des :: donc)
            return new static( $modelFromDatabase );
        }

        // Récupérer les 5 derniers élements
        public static function findLastFive()
        {
            // On va faire une requete SQL
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `". static::$table ."` ORDER BY id DESC LIMIT 5";
            $statement = $pdo->query( $sql );
            $modelListFromDatabase = $statement->fetchAll( PDO::FETCH_ASSOC );

            if( $modelListFromDatabase === false ) :
                exit( static::$table." not found !" );
            endif;
            
            $modelsArray = [];

            foreach( $modelListFromDatabase as $modelDataFromDatabase ) :
                $model = new static( $modelDataFromDatabase );
                $modelsArray[] = $model;
            endforeach;

            return $modelsArray;
        }

        // Cette méthode renvoi TOUTES les élements d'un type donné
        // dans la BDD sous forme d'un tableau d'objets de ce type
        public static function findAll()
        {
            // On fait notre requête comme d'habitude
            $pdo = Database::getPDO();
            $sql = "SELECT * FROM `". static::$table ."`";
            $statement = $pdo->query( $sql );
            $modelListFromDatabase = $statement->fetchAll( PDO::FETCH_ASSOC );

            // Dans le cas ou aucun élément n'est trouvé, $modelListFromDatabase vaut false
            // On peut donc vérifier ce cas et afficher une erreur
            if( $modelListFromDatabase === false ) :
                exit( static::$table." not found !" );
            endif;
            
            // On prépare un tableau vide, dans lequel on va mettre
            // chacun de nos objets de type produits afin de le return
            $modelsArray = [];

            // On parcours le tableau $modelListFromDatabase qui contient
            // autant d'entrées que d'éléments en base (dans la table correspondante)
            foreach( $modelListFromDatabase as $modelDataFromDatabase ) :
                // Pour chacun de ces éléments, la valeur du tableau est elle-même
                // un tableau de chaque colonne => valeur pour cet élément
                // Pour construire cet objet, on donne cette liste des colonne => valeur
                // au constructeur (qu'on appelle via le mot clé new)
                // Là encore, le mot clé static désigne la classe enfant (Brand, Type, Category ou Product)
                $model = new static( $modelDataFromDatabase );
                // Maintenant qu'on a notre objet de type produit, on peut le stocker
                // dans le tableau créé précédemment
                $modelsArray[] = $model;
            endforeach;

            // On renvoi notre tableau rempli
            return $modelsArray;
        }

        // Getters
        public function getId()        { return $this->id; }
        public function getName()      { return $this->name; }
        public function getCreatedAt() { return $this->created_at; }
        public function getUpdatedAt() { return $this->updated_at; }

        // Setters 
        //  On pourrait mettre aussi les setters communs, mais 
        //  en général on met plutot les setters dans les classes enfants
    }