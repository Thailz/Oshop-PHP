<?php

    class CatalogController extends CoreController
    {
        // Cette méthode va remplacer les 4 en dessous
        // Elle prends le même paramètre $params ( => $match['params'] )
        // Mais aussi un deuxième param qui correspond à la fois au nom
        // du template, et du model à instancier ($modelName)
        // => Comme c'est la seule méthode qui reste mais qu'elle est
        // (presque) identique a celle du MainController, on factorise dans CoreController
        // public function vue( $params, $modelName )
        // {
        //     // Etape 1 : Instancier le model a récupérer
        //     $model = $modelName::find( $params[ $modelName.'_id' ] );
        //     // Etape 2 : Afficher la vue et lui passer les données
        //     $this->_show( $modelName, [ $modelName => $model ] );
        // }

        // public function brand( $params )
        // {
        //     // On récupère notre marque grace au model Brand
        //     $brand = Brand::find( $params['brand_id'] );
        //     $this->_show( "brand", [ "brand" => $brand ] );
        // }

        // public function category( $params )
        // {
        //     $category = Category::find( $params['category_id'] );
        //     $this->_show( "category", [ "category" => $category ] );
        // }

        // public function type( $params )
        // {
        //     $type = Type::find( $params['type_id'] );
        //     $this->_show( "type", [ "type" => $type ] );
        // }

        // // Dans $params, on va récupérer $match['params']
        // public function product( $params )
        // {
        //     $product = Product::find( $params['product_id'] );
        //     $this->_show( "product", [ "product" => $product ] );
        // }
    }