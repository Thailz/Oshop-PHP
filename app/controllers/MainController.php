<?php

class MainController {

    // action home
    public function home( $params )
    {
        $this->_show('home');
    }

    // action home
    public function legal( $params )
    {
        $this->_show('legal');
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