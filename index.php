<?php

ini_set('display_errors', 'on');

use Application\Http;
use Storage\ShapeContainerJson;
use Drawing\Shapes\Rectangle;
use Drawing\Shapes\Ellipse;
use Drawing\Containers\ShapeContainer;

// La fonction callback prend un paramètre (dont le nom est arbitraire) 
// et représente le nom de la classe que l'on a essayé de charger
// La fonction callback est appelée à chaque fois que l'on essaie d'instancier une classe
spl_autoload_register(function ($className) {
    $classFile = str_replace('\\', '/', $className) . '.php';
    require $classFile;
});

// Instancie la classe Http qui va gérer la requête
$http = new Http();

// Instancie la classe qui va charger et enregistrer les informations dans le fichier json
$storage = new ShapeContainerJson('drawing.json');
// Au chargement on récupère les données du fichier json
$container = $storage->load() ?: new ShapeContainer(800, 600, 'svg');

// Au chargement on récupère les données du fichier json
$container = $storage->load();

if ($http->isPost()) {
    // Enregistrer la nouvelle forme
    $shape = new Rectangle();
    $shape->setX($_POST['x']);
    $shape->setY($_POST['y']);
    $shape->setColor($_POST['color']);
    $shape->setOpacity($_POST['opacity']);
    $shape->setWidth($_POST['width']);
    $shape->setHeight($_POST['height']);
    
    $container->addShape($shape);
    $storage->save($container);
    
    // Rediriger vers la page qui affiche toutes les formes
    $http->redirect('index.php');
} else {
    // Affichage des formes du container
    require 'index.phtml';
}



// if (! empty($_POST)) {
//     $rectangle = new Rectangle($_POST['x'], $_POST['y'], $_POST['color'], $_POST['opacity'], $_POST['width'], $_POST['height']);
// }


/*
if ($http->isPost()) {
    // Enregistrer la nouvelle forme
    $ellipse = new Ellipse(350, 350, 'firebrick', 0.7, 40, 80);
$container = new ShapeContainer(800, 600, 'css');
        
    $shape = new Rectangle();
    $shape->setX(mt_rand(0, 400));
    $shape->setY(mt_rand(0, 400));
    $shape->setColor(mt_rand(1, 10) & 1 ? 'firebrick' : 'forestgreen');
    $shape->setOpacity(mt_rand(5, 10) / 10);
    $shape->setWidth(mt_rand(50, 200));
    $shape->setHeight(mt_rand(50, 200));
    
    $container->addShape($r);
    $storage->save($container);
    
    // Affichage en json
    header('Content-Type: application/json');
    echo $json;
    exit();
    
    // Rediriger vers la page qui affiche toutes les formes
     $http->redirect('index.php');
} else {
    require 'index.phtml';
}

*/

// if (! empty($_POST)) {
//     $rectangle = new Rectangle($_POST['x'], $_POST['y'], $_POST['color'], $_POST['opacity'], $_POST['width'], $_POST['height']);
// }

