<?php

namespace App\Controllers;

class ErrorController
{

    public function error404()
    {
        $this->show("error404");
    }

    /**
     * Fonction très générique qui va afficher la page.
     *
     * @param string $viewName Le nom de la vue associée à la page demandée
     * @param array $viewData Une liste facultative de données supplémentaires qui seront potentiellement utiles dans certaines de nos vues.
     *                        Peut prendre de 0 à une infinité de paramètres. C'est un peu un cheat mode pour passer plusieurs variables à nos vues.
     */
    private function show($viewName, $viewData = [])
    {
        // On appelle header.tpl.php et footer.tpl.php des partials => Bouts de code répétés sur plusieurs pages
        require_once __DIR__ . "/../views/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/footer.tpl.php";
    }
}