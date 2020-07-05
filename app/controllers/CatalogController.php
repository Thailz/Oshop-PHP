<?php

    class CatalogController 
    {
        public function category( $params )
        {
            $category = new Category( $params['category_id'] );

            ///dump( $product );
            $this->_show( "category" );
        }

        public function brand( $params )
        {
            $brand = new Brand( $params['brand_id'] );

            //dump( $product );
            $this->_show( "brand" );
        }

        public function type( $params )
        {

            $type = new Type( $params['type_id'] );

            //dump( $product );
            $this->_show( "type" );
        }

        // Dans $params, on va récupérer $match['params']
        public function product( $params )
        {
            // J'arrive ici quand je demande une page de produit
            // C'est donc ici que je vais instancier mon Model
            // et ainsi créer mon objet "Product" avec ses informations 
            // récupérées depuis la base de données
            $product = new Product( $params['product_id'] );

            dump( $product );

            // J'affiche la vue
            $this->_show( "product" );
        }

        // méthode show
        private function _show($viewName, $viewData = [])
        {   
            // on définit cette variable pour que nos vues puissent mettre le lien de la page courante en avant
            // Toutes nos données dynamiques à utiliser dans les vues se trouveront dans $viewData (par souci de simplification)
            $viewData['currentPage'] = $viewName;

            // __DIR__ vaut /var/www/html/S05/..../Controllers
            require __DIR__ . '/../views/header.tpl.php';
            // on inclut une vue selon la valeur du paramètre $viewName
            require __DIR__ . '/../views/' . $viewName . '.tpl.php';
            require __DIR__ . '/../views/footer.tpl.php';
        }
    }