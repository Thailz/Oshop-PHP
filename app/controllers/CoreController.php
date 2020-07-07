<?php

    class CoreController
    {
        protected function _show( $viewName, $viewData = [] )
        {
            // on définit cette variable pour que nos vues puissent mettre le lien de la page courante en avant
            // Toutes nos données dynamiques à utiliser dans les vues se trouveront dans $viewData (par souci de simplification)
            $viewData['currentPage'] = $viewName;

            dump( $viewData );

            // __DIR__ vaut /var/www/html/S05/..../Controllers
            require __DIR__ . '/../views/header.tpl.php';
            // on inclut une vue selon la valeur du paramètre $viewName
            require __DIR__ . '/../views/' . $viewName . '.tpl.php';
            require __DIR__ . '/../views/footer.tpl.php';
        }

        public function vue( $params, $modelName )
        {
            // Cette méthode est appellée pour TOUTE page du site
            // On peut donc en profiter pour faire les traitements
            // identiques a toutes les pages
            // Par exemple, la récupération des marques du footer
            $footerBrands = Brand::getFooterBrands();

            // On a aussi besoin de récupérer les types de produits
            // à afficher dans le footer
            $footerTypes = Type::getFooterTypes();

            // dump( $footerBrands );

            // On va créer un tableau qui va contenir les données à envoyer aux vues
            // On l'initialise avec les données communes a toutes les vues, ici
            // les marques a afficher dans le footer
            $viewData = [
                "footerBrands" => $footerBrands,
                "footerTypes"  => $footerTypes
            ];

            // Si on arrive ici avec un nom de modèle valide
            // C'est à dire, que la classe de ce nom existe (penser a require !)
            // Alors on procède comme on faisait dans CatalogController
            if( class_exists( $modelName ) )
            {
                // Etape 1 : Instancier le model a récupérer
                $model = $modelName::find( $params[ $modelName.'_id' ] );
                // Etape 2 : Plutot que d'appeller _show une deuxième fois, on va juste
                // ajouter la donnée intéressante au tableau ($viewData) déjà rempli
                $viewData[$modelName] = $model;
            }

            // Du coup, plus besoin de else, puisque dans tout les cas
            // on va appeller _show, mais avec des paramètres différents (stockés
            // dans $viewData )
            $this->_show( $modelName, $viewData );
        }
    }