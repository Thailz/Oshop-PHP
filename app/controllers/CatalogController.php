<?php

    class CatalogController 
    {
        public function brand( $params )
        {
            // On récupère notre marque grace au model Brand
            $brand = Brand::find( $params['brand_id'] );

            // On a ici un objet de type Brand
            //   dump( $brand );
            
            // On a récupéré notre produit dans $brand, il faut 
            // maintenant le passer à la vue !
            $this->_show( "brand", [ "brand" => $brand ] );
        }

        public function category( $params )
        {
            // TODO : Faire pareil pour une catégorie
            $this->_show( "category", [] );
        }

        public function type( $params )
        {
            // TODO : Faire pareil pour le type
            $this->_show( "type", [] );
        }

        // Dans $params, on va récupérer $match['params']
        public function product( $params )
        {
            // TODO : Faire pareil pour un produit
            $this->_show( "product", [] );
        }

        // méthode show
        private function _show( $viewName, $viewData = [] )
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