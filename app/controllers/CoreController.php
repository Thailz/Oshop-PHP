<?php

    class CoreController
    {

     
        public function vue( $params, $modelName )
        {
            // Cette méthode est appellée pour TOUTES page du site
            // On peut donc en profiter pour faire les traitements
            // identiques a toutes les pages
            // Par exemple, la récupération des marques du footer
            $footerBrands = Brand::getFooterBrands();
            // Cette function recupere toutes les marques de al BDD
            $allBrands = Brand::getBrandsAll();
            // On a aussi besoin de récupérer les types de produits
            // à afficher dans le footer

            $footerTypes = Type::getFooterTypes();
            $allTypes = Type::getTypesAll();




            $allProducts = Product::getProductsAll();
            $allProducts1 = Product::getProductsAll1();

        
            // Cette function recupere toutes les category de la BDD order 1 à 2 et 3 à 5
            $homeCategory  = Category::getHomeCategory();
            $homeCategory2 = Category::getHomeCategory2();
            $allCategory   = Category::getAllCategory();
            


            // dump( $footerBrands );

            // On va créer un tableau qui va contenir les données à envoyer aux vues
            // On l'initialise avec les données communes a toutes les vues, ici
            // les marques a afficher dans le footer
            $viewData = [
                "footerBrands"  => $footerBrands,
                "footerTypes"   => $footerTypes,
                "homeCategory"  => $homeCategory,
                "homeCategory2" => $homeCategory2,
                "allBrands"     => $allBrands,
                "allTypes"      => $allTypes,
                "allProducts"   => $allProducts,
                "allCategory"   => $allCategory,
                "allProducts1"  => $allProducts1
                
            ];

            // ATTENTION : Sur Linux, le nom des classes est sensible à la casse
            // on avait pas ce problème sur le livecode car je suis sur Windows ;x
            // La solution est de mettre en majuscule le premier caractère de notre chaine
            // Heureusement, PHP a précisément une fonction qui fait ça : ucfirst
            // Ici, on a donc le nom de notre classe avec la bonne casse (Category, Type, etc...)
            $modelNameCorrectCase = ucfirst( $modelName );

            // Si on arrive ici avec un nom de modèle valide
            // C'est à dire, que la classe de ce nom existe (penser a require !)
            // Alors on procède comme on faisait dans CatalogController
            // /!\ On doit vérifier le nom avec la bonne casse sinon on ne tombera jamais dans le if !a
            if( class_exists( $modelNameCorrectCase ) )
            {
                // Etape 1 : Instancier le model a récupérer (là aussi avec la bonne casse)
                $model = $modelNameCorrectCase::find( $params[ $modelName.'_id' ] );
                
                // Etape 2 : Plutot que d'appeller _show une deuxième fois, on va juste
                // ajouter la donnée intéressante au tableau ($viewData) déjà rempli
                // Ici en revanche, ce n'est pas grave si c'est en minuscule
                $viewData[$modelName] = $model;
            }

            // Du coup, plus besoin de else, puisque dans tout les cas
            // on va appeller _show, mais avec des paramètres différents (stockés
            // dans $viewData )
            $this->_show( $modelName, $viewData );
        }

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

    }