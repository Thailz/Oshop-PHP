<?php

    // Ici, la classe product sera le "Model" qui réprésente en PHP
    // nos entités définies dans le MCD et en base de donnée
    // Une instance de cette classe représente une entrée (un ligne)
    // dans cette table
    class Type
    {
        // Clé primaire
        private $id;

        // Champs
        private $name;
        private $description;
        private $order;
        private $created_at;
        private $updated_at;

        // Foreign keys
        
        private $type_id;

        // Constructeur
        // Ce constructeur attends un seul paramètre, l'id du produit
        // On dit au passage que cette variable DOIT etre un entier
        public function __construct( int $type_id )
        {
            // On a bien ici notre paramètre product_id et donc 
            // on peut le stocker dans la propriétés
            $this->id = $type_id;
           
            // Mais, comment faire avec tout les autres champs ?
            // On va faire une requete SQL pour récupérer le reste ! 
            // Etape 0 : Récupérer la connexion active à la BDD
            $pdo = Database::getPDO();
            // Etape 1 : On écrit notre requête
            $sql = "SELECT * FROM type WHERE id = " . $this->id;
            // Etape 2 : Faire la requete
            $statement = $pdo->query( $sql );
            // Etape 3 : Récupérer les résultats
            $type = $statement->fetch( PDO::FETCH_ASSOC );
            // Dans $product, j'ai bien les informations contenues
            // dans ma table en BDD
            dump( $type );

            // Maintenant, il nous reste à remplir les attributs de notre objet
            // avec ces valeurs, on va utiliser un foreach pour celà
            // Attention, on peut le faire parceque nos attributs onjt le même nom
            // que nos colonnes de la table en BDD
            foreach( $type as $attr_name => $attr_value ) :
                $this->$attr_name = $attr_value;
            endforeach;
            
            // On pourrait aussi faire la correspondance manuellement
            // On est obligé de faire ça si nos colonnes n'ont pas le même
            // nom que nos attributs/propriétés
            //  $this->name = $product['name'];
            //  $this->description = $product['description'];
            //  $this->price = $product['price'];
        }
    }