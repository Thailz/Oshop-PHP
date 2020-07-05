<?php

// Require Database
// Cette classe utilitaire nous facilitera l'accès à PDO depuis
// tout notre projet
require_once __DIR__ . "/../app/utils/Database.php";

// On utilise l'auto-loader de composer
// Il s'occupe de require TOUT les composants qu'on a installé grace à lui
// et ce uniquement si on les utilise dans notre script
// pas de require inutiles donc !
require_once __DIR__ . "/../vendor/autoload.php";

// Require MainController
require_once __DIR__ . "/../app/controllers/MainController.php";
// Require CatalogController
require_once __DIR__ . "/../app/controllers/CatalogController.php";

// Require Models/Product
require_once __DIR__ . "/../app/models/product.php";
require_once __DIR__ . "/../app/models/category.php";
require_once __DIR__ . "/../app/models/type.php";
require_once __DIR__ . "/../app/models/brand.php";

// On veut se connecter à notre base de données
// Pour garder notre code d'index "léger", on va déplacer cette connexion dans 
// un fichier séparé, sauf que avec l'utilitaire Database, plus besoin !
//  require_once __DIR__ . "/../app/inc/db.php";

// On défini une constante qui vaut $_SERVER['BASE_URI']
// et qui contient le chemin complet vers notre projet
// c'est plus rapide à taper :p
define( "BASE_URI", $_SERVER['BASE_URI'] );

// Ce qu'Altorouter a remplacé :
//  - Nos routes définies dans le tableau $routes, maintenant :
//    => On utiliser $router->map() pour définir nos routes
//  - Le stockage de la partie variable de l'URL dans $currentURL
//    => on va utiliser $router->setBasePath() pour dire à Altorouter quelle
//       est la partie fixe (et donc, il en déduira la partie variable)

// On instance notre super classe AltoRouter
// On se fiche de savoir ce qu'elle contient, tant quelle marche
$router = new AltoRouter();

// On défini le chemin de "base" dans lequel se trouve index.php
// Ca tombe bien, il se trouve qu'on a une constante pour ça : BASE_URI (définie §15)
$router->setBasePath( BASE_URI );

// Mapper une route, c'est donner :
// - Une méthode HTTP (GET ou POST) (1er paramètre)
// - Une URL (partie variable) (2e param)
// - Une valeur a retourner quand cette route correspond (3e param)
// - Un nom pour la route (4e param (optionnel))
// Ici, on fait un tableau qui contient deux données, le controller à utiliser
// pour notre route, et la méthode de ce controller à appeller
$tab_home = [
    "controller" => "MainController",
    "method"     => "home"
];
$router->map( 'GET', '/', $tab_home, "Page d'accueil" );

// Mentions légales
// On peut aussi mettre directement le tableau dans l'appel de map()
// pour ne pas avoir a passer par une variable temporaire
$router->map( 'GET', '/legal-mentions', [
    "controller" => "MainController",
    "method"     => "legal"
], "Mentions légales" );

// On va avoir besoin d'une partie variable sur notre URL
// Ici, ce sera un entier (donc on utilise i:) qui s'appellera category_id
// Comme catergory_id DOIT etre un entier, si on met autre chose à la place
// la route ne "matchera" plus, et match vaudra false (et on affichera une 404)

// Ici, on fait un tableau qui contient deux données, le controller à utiliser
// pour notre route, et la méthode de ce controller à appeller
$tab_category = [
    "controller" => "CatalogController",
    "method"     => "category"
];
$router->map( 'GET', '/catalog/category/[i:category_id]', $tab_category, "Page d'une catégorie" );


// Catalog by Type
$tab_type = [
    "controller" => "CatalogController",
    "method"     => "type"
];
$router->map( 'GET', '/catalog/type/[i:type_id]', $tab_type, "Page d'un type d'article" );

// Sur le même modèle, la page du catalogue par marque
$tab_brand = [
    "controller" => "CatalogController",
    "method"     => "brand"
];
$router->map( 'GET', '/catalog/brand/[i:brand_id]', $tab_brand, "Page d'une marque d'article" );

// Et enfin la page d'un article
$tab_product = [
    "controller" => "CatalogController",
    "method"     => "product"
];
$router->map( 'GET', '/catalog/product/[i:product_id]', $tab_product, "Page d'un article" );

// Une fois nos routes "mappées", on demande à Altorouter de vérifier
// les correspondances, et de renvoyer les infos de la route correspondante
$match = $router->match();

// On regarde ce qu'on récupère comme infos dans $match :
//  - Dans $match['target'], on récupère le 3e param de ->map (ex : "category")
//   => C'est le nom de la méthode du MainController à appeller
//  - Dans $match['params'], on récupère un tableau des paramètres d'URL
//   => Ici il contient par exemple une clé "category_id", dont la valeur vient de l'URL
//  - Dans $match['name'], on récupère le nom de la route (4e param de ->map)
//   => La nom d'une route étant optionnel, on peut avoir "" ici
// dump( $match );

// Pour accéder aux paramètres d'URL, on utilise $match['params']
// dump( $match['params'] );


// Sinon, on peut procéder à l'appel de la méthode appropriée de MainController
// On appelle cette partie le "Dispatch"

// Une fois ici, si $match vaut false, c'est qu'aucune route ne correspond
// à l'URL a laquelle on veut accéder, on renvoi donc une erreur 404
if( $match === false ) :
    exit( "404 Not Found" );
endif;

// Pour récupérer la partie variable de notre URL, ici stockée dans category_id
// car la route a dans son URL [i:category_id]
// dump( $match['params']['category_id'] );

// On va devoir récupérer le nom du controller à instancier
$controllerToUse = $match['target']['controller'];

// On instancie notre MainController
$controller = new $controllerToUse();

// Récupération du nom de la méthode à appeler
// Cette fois ce n'est plus stocké dans $pages, mais dans $match
// C'est altorouter qui nous donne la bonne méthode d'après le ->map
// de la route qui correspond à notre URL actuelle
$methodToCall = $match['target']['method'];

// Appel de cette méthode
$controller->$methodToCall( $match['params'] );

// TODO : C'est bien beau, on a récupéré notre paramètre d'URL category_id
// Maintenant, ça serait bien de pouvoir l'utiliser, pour une requete SQL par exemple...
// Mais avant ça, il nous faut une base de données, et on va d'abord la modéliser :)